<?php defined ('BASEPATH') OR exit ('No direct script access allowed');

/**
 * Class Usuario
 */
class Usuarios extends CI_Controller {

	/**
	 * Variables.
	 */
	private $data;
	private $url_view;
	private $url_modulo;
	private $url_menu;
	private $url_crud;
	private $titulo;
	private $datos_menu;
	private $datos_crud;


	/**
	 * Metodo construct para cargar variables, helpers y librerias.
	 */
	public function __construct() {

		parent::__construct();

			$this->data       = array();
			$this->url_modulo = $this->uri->segment(1);
			$this->url_menu   = $this->uri->segment(2);
			$this->url_crud   = $this->uri->segment(3);
			$this->titulo     = ucwords($this->url_menu);
			$this->url_view   = $this->url_modulo.'/'.$this->url_menu;
			$this->view_menu  = $this->url_modulo.'/menu';

			$this->load->helper(array('layout','form', 'security', 'validaciones'));   				   // Carga los helper para validar los formularios('validaciones'), cargar las vistas(layouts), seguridad md5 y demas(segurity), carga creacion de formularios html y seguridad en el envio de formularios('form').

			//--------------------------Permisos Menu----------------------

				if ($this->session->userdata($this->url_modulo) != null):

				$array = array_unique($this->session->userdata($this->url_modulo));

				foreach ($array as $value):
					
					$result[] = $value;

				endforeach;

				if (!in_array($this->url_menu, $result)): 

				   redirect('menuprincipal');

				endif;
				
				$this->datos_menu['json'] = json_encode($result);

				endif;

			//--------------------------------------------------------------

			//--------------------------Permisos Cruds----------------------

				$arraya = $this->session->userdata($this->url_menu);

				if($arraya != null):

					foreach ($arraya as $value):
						
						$resulta[] = $value;

					endforeach;

					if ($this->url_crud != null):

						if (!in_array($this->url_crud, $resulta)): 

						   redirect($this->url_modulo.'/'.$this->url_menu);

						endif;
						
					endif;	

						$this->datos_crud['crud'] = json_encode($resulta);

				endif;

			//--------------------------------------------------------------	


	}

	/**
	 * Metodo index Carga toda la vista principal Inicio
	 * url_base()/sic/sistema/configuracion/inicio
	 */
	public function index() {

		//--------------------------Cargar variables del Metodo------------------------------ 	

			$perfile = new Perfile;

			$perfile->where('nom_prf <>', 'ROOT');
			$perfile->where('est_prf', 'TRUE');
			$perfile->order_by('id', 'ASC')->get();

			$this->datos_view = array('perfil' => $perfile);

		//-----------------------------------------------------------------------------------
		
		//---------------------------------Cargar Vistas-------------------------------------
		
			layout_all($this->titulo, $this->url_view, $this->datos_view , $this->view_menu, $this->datos_menu, $this->datos_crud);	 // Carga layouts.

		//-----------------------------------------------------------------------------------
		
	}	

	/**
	 * Metodo index Carga toda la vista principal Inicio
	 * url_base()/sic/sistema/configuracion/usuario/registrar
	 */
	public function registrar() {

		//--------------------------Cargar variables del Metodo------------------------------ 
			$usuario  = new Usuario;
			$usuarioo = new Usuario;
			$perfile  = new Perfile;

			$this->datos_view = null;

		//---------------------------------Recivir Variables Post----------------------------

			$usuario->login        = validarEntrada($this->input->post('login', TRUE));
			$usuario->clave        = validarEntrada($this->input->post('clave', TRUE));
			$this->rep_clave       = validarEntrada($this->input->post('rep_clave', TRUE));
			$usuario->persona_id   = validarEntrada($this->input->post('persona_id', TRUE));
			$usuario->perfile_id   = validarEntrada($this->input->post('perfile_id', TRUE));
			$usuario->perfilmta_id = validarEntrada($this->input->post('perfilmta_id', TRUE));
			$usuario->estatus      = validarEntrada($this->input->post('estatus', TRUE));

		//-----------------------------------------------------------------------------------

			$perfile->where('nom_prf <>', 'ROOT');
			$perfile->where('est_prf', 'TRUE');
			$perfile->order_by('id', 'ASC')->get();

			$this->datos_view = array('perfil' => $perfile);

		//------------------------//Inicio de Validaciones//---------------------------------

			if (!validarRequerido($usuario->persona_id, $error, '')): $this->datos_view['mensajes'] = 'Datos personales se encuentran vacios.</br> Debe seleccionar una persona.';

			elseif (!validarID($usuario->persona_id, $error, '******')): $this->datos_view['mensajes'] = $error;

			elseif (!validarUsuario($usuario->login, 4, 20, $error, 'Usuario')): $this->datos_view['mensajes'] = $error;

			else:

				$usuarioo->get_by_login($usuario->login);

				if ($usuarioo->login != Null): $this->datos_view['mensajes'] = 'EL <b>Nombre de Usuario</b> ya se ecuentra en uso.';

				else:

					if (!validarUsuario($usuario->clave , 4, 20, $error, 'Contraseña')): $this->datos_view['mensajes'] = $error;

					else:

						$usuario->clave  = do_hash($usuario->clave, 'md5');
						$this->rep_clave = do_hash($this->rep_clave, 'md5');

				    	if ($usuario->clave != $this->rep_clave): $this->datos_view['mensajes'] = 'Las Contraseñas no son iguales.';

				   	    else:

							if($usuario->save()):

								$this->url_view = $this->url_modulo.'/'.$this->url_menu.'/success';
								$result = 'TRUE';

							else:

								$this->datos_view['mensajes'] = mensajeFormularioError('Registrar');
								$result = 'FALSE';

							endif;

						endif;	
					//-----------------------------------Auditoria---------------------------------------

						$this->data = array('Usuario Registrado:' => $usuario->login);
						$this->audit->register($result, $this->data); 

					//-----------------------------------------------------------------------------------	
					endif;	

				endif;			

			endif;	
		//------------------------------------------------------------------------------------------------------
		
		//---------------------------------Cargar Vistas-------------------------------------
		
			layout_all($this->titulo, $this->url_view, $this->datos_view , $this->view_menu, $this->datos_menu, $this->datos_crud);	 // Carga layouts.

		//-----------------------------------------------------------------------------------
		
	}	

	/**
	 * Metodo index Carga toda la vista principal Inicio
	 * url_base()/sic/sistema/configuracion/usuario/buscar
	 */
	public function buscar() {

			$usuario = new Usuario;

			$usuario->include_related('persona', '*');
			$usuario->where('est_prs', 'TRUE');
			$usuario->where('id >', '0');
			$usuario->order_by('cedula', 'ASC');
			$usuario->include_related('perfile', '*');
			$usuario->where('login <>', 'ROOT');
			$usuario->get();

			$this->url_view   = $this->url_modulo.'/'.$this->url_menu.'/'.$this->url_crud;

			$this->datos_view = array('usuarios' => $usuario);

		//-----------------------------------Auditoria---------------------------------------

			$this->data = array('Busqueda:' => 'Todo');

			$this->audit->register('TRUE', $this->data); 

		//-----------------------------------------------------------------------------------		
		
		//---------------------------------Cargar Vistas-------------------------------------
		
			layout_all($this->titulo, $this->url_view, $this->datos_view, $this->view_menu, $this->datos_menu, $this->datos_crud);	 // Carga layouts.

		//-----------------------------------------------------------------------------------
		
	}

	/**
	 * Metodo index Carga toda la vista principal Inicio
	 * url_base()/sic/sistema/configuracion/usuario/modificar
	 */
	public function modificar($id = '') {

		if (!validarNullInt($id, $error, '')):

			redirect('seguridad/usuarios/buscar');

		else:
			
			$usuario = new Usuario;
			$perfile = new Perfile;

			if($id != null):

				//-----------------------------Buscar Get--------------------------

				$usuario->include_related('persona', '*');
				$usuario->where('est_prs', 'TRUE');
				$usuario->include_related('perfile', '*');
				$usuario->include_related('perfilmta', '*');
				$usuario->where('login <>', 'ROOT');
				$usuario->get_by_id($id);

				$perfile->where('nom_prf <>', 'ROOT');
				$perfile->where('est_prf', 'TRUE');
				$perfile->order_by('id', 'ASC')->get();


				$this->url_view    = $this->url_modulo.'/'.$this->url_menu.'/'.$this->url_crud;

				$this->datos_view  = array(
											'usuarios' => $usuario,
											'perfil'   => $perfile
										  );

				//-----------------------------------------------------------------

			else:	

				$id = validarEntrada($this->input->post('id', TRUE));

				if($id == null):

					redirect('seguridad/persona/buscar');

				endif;

				$usuario->include_related('persona', '*');
				$usuario->where('est_prs', 'TRUE');
				$usuario->include_related('perfile', '*');
				$usuario->include_related('perfilmta', '*');
				$usuario->where('login <>', 'ROOT');
				$usuario->get_by_id($id);

			//-----------------------------------------------------------------------------------

				$perfile->where('nom_prf <>', 'ROOT');
				$perfile->where('est_prf', 'TRUE');
				$perfile->order_by('id', 'ASC')->get();

				$this->url_view   = $this->url_modulo.'/'.$this->url_menu.'/'.$this->url_crud;

				$this->datos_view  = array(
											'usuarios' => $usuario,
											'perfil'   => $perfile
										  );

			//---------------------------------Recivir Variables Post----------------------------

				$usuario->login        = validarEntrada($this->input->post('login', TRUE));
				$this->clave        = validarEntrada($this->input->post('clave', TRUE));
				$this->rep_clave       = validarEntrada($this->input->post('rep_clave', TRUE));
				$usuario->persona_id   = validarEntrada($this->input->post('persona_id', TRUE));
				$usuario->perfile_id   = validarEntrada($this->input->post('perfile_id', TRUE));
				$usuario->perfilmta_id = validarEntrada($this->input->post('perfilmta_id', TRUE));
				$usuario->estatus      = validarEntrada($this->input->post('estatus', TRUE));

			//-----------------------------------------------------------------------------------

			//------------------------//Inicio de Validaciones//---------------------------------

				if (!validarRequerido($usuario->persona_id, $error, '')): $this->datos_view['mensajes'] = 'Datos personales se encuentran vacios.</br> Debe seleccionar una persona.';

				elseif (!validarID($usuario->persona_id, $error, '******')): $this->datos_view['mensajes'] = $error;

				elseif (!validarUsuario($usuario->login, 4, 20, $error, 'Usuario')): $this->datos_view['mensajes'] = $error;

				else:

					if ($this->clave != Null): 

						$usuario->clave = $this->clave;

						if (!validarUsuario($usuario->clave , 4, 20, $error, 'Contraseña')): $this->datos_view['mensajes'] = $error;

						else:

							$usuario->clave  = do_hash($usuario->clave, 'md5');
							$this->rep_clave = do_hash($this->rep_clave, 'md5');

				    		if ($usuario->clave != $this->rep_clave): $this->datos_view['mensajes'] = 'Las Contraseñas no son iguales.';

				    		else:

								if($usuario->save()):

									$this->url_view = $this->url_modulo.'/'.$this->url_menu.'/successact';
									$result = 'TRUE';

								else:

									$this->datos_view['mensajes'] = mensajeFormularioError('Modificar');
									$result = 'FALSE';

								endif;

							endif;	

						endif;	

					else:

						if($usuario->save()):

							$this->url_view = $this->url_modulo.'/'.$this->url_menu.'/successact';
							$result = 'TRUE';

						else:

							$this->datos_view['mensajes'] = mensajeFormularioError('Modificar');
							$result = 'FALSE';

						endif;

						//-----------------------------------Auditoria---------------------------------------

							$this->data = array('Usuario Modificado:' => $usuario->login);
							$this->audit->register($result, $this->data); 

						//-----------------------------------------------------------------------------------			
					endif;
							
				endif;

			endif;		
		
		//---------------------------------Cargar Vistas-------------------------------------
		
			layout_all($this->titulo, $this->url_view, $this->datos_view, $this->view_menu, $this->datos_menu, $this->datos_crud);	 // Carga layouts.

		//-----------------------------------------------------------------------------------

		endif;	
		
	}

	/**
	 * Metodo index Carga toda la vista principal Inicio
	 * url_base()/sic/sistema/configuracion/usuario/eliminar
	 */
	public function eliminar($id = '') {

			$usuario = new Usuario;

			$this->url_view   = $this->url_modulo.'/'.$this->url_crud;

			$this->datos_view = null;

			$usuario->include_related('persona', '*');
			$usuario->get_by_id($id);

			$cedulae  = $usuario->persona_cedula;
			$usuarioe = $usuario->login;

			if ($usuario->delete()):

				$this->url_view = $this->url_modulo.'/'.$this->url_menu.'/successeli';
				$result = 'TRUE';

			else:

				$this->datos_view['mensajes'] = mensajeFormularioError('Eliminar');
				$result = 'FALSE';

			endif;	

		//-----------------------------------Auditoria---------------------------------------

				$this->data = array(
									'Usuario Eliminado:' => $usuarioe,
									'De la Persona:' => $cedulae
 									); 
				
				$this->audit->register($result, $this->data);

		//-----------------------------------------------------------------------------------	

		//---------------------------------Cargar Vistas-------------------------------------
		
			layout_all($this->titulo, $this->url_view, $this->datos_view, $this->view_menu, $this->datos_menu, $this->datos_crud);	 // Carga layouts.

		//-----------------------------------------------------------------------------------
		
	}


}

/* End of file usuario.php */
/* Location: ./application/controller/configuracion/usuario.php */