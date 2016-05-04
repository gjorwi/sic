<?php defined ('BASEPATH') OR exit ('No direct script access allowed');

/**
 * Class Persona
 */
class Personas extends CI_Controller {

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

			$this->load->helper(array('layout','form', 'validaciones'));   				   // Carga los helper para validar los formularios('validaciones'), cargar las vistas(layouts), seguridad md5 y demas(segurity), carga creacion de formularios html y seguridad en el envio de formularios('form').

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

			$this->datos_view =  null;

		//-----------------------------------------------------------------------------------
		
		//---------------------------------Cargar Vistas-------------------------------------
		
			layout_all($this->titulo, $this->url_view, $this->datos_view , $this->view_menu, $this->datos_menu, $this->datos_crud);	 // Carga layouts.

		//-----------------------------------------------------------------------------------
		
	}	

	/**
	 * Metodo index Carga toda la vista principal Inicio
	 * url_base()/sic/sistema/configuracion/persona/registrar
	 */
	public function registrar() {

		//--------------------------Cargar variables del Metodo------------------------------ 
			$persona  = new Persona;
			$personaa = new Persona;

			$this->datos_view = null;

		//---------------------------------Recivir Variables Post----------------------------

			$persona->nombres      = validarEntrada($this->input->post('nombres', TRUE));
			$persona->apellidos    = validarEntrada($this->input->post('apellidos', TRUE));
			$persona->nacionalidad = validarEntrada($this->input->post('nacionalidad', TRUE));
			$persona->cedula       = validarEntrada($this->input->post('cedula', TRUE));
			$persona->estcivil     = validarEntrada($this->input->post('estcivil', TRUE));
			$persona->sexo         = validarEntrada($this->input->post('sexo', TRUE));
			$persona->correo       = validarEntrada($this->input->post('correo', TRUE));
			$persona->telefonoh    = validarEntrada($this->input->post('telefonoh', TRUE));
			$persona->telefonom    = validarEntrada($this->input->post('telefonom', TRUE));
			$persona->fechanac     = validarEntrada($this->input->post('fechanac', TRUE));
			$persona->direccion    = validarEntrada($this->input->post('direccion', TRUE));
			$persona->est_prs      = validarEntrada($this->input->post('estatus', TRUE));

		//-----------------------------------------------------------------------------------

		//------------------------//Inicio de Validaciones//---------------------------------

			if (!validarInt($persona->cedula, 7, 8, $error, 'Cedula')): $this->datos_view['mensajes'] = $error; 

			else:

				$personaa->get_by_cedula($persona->cedula);
			
				if($personaa->cedula != Null): $this->datos_view['mensajes'] = 'Esta persona ya se encuentra <b>Registrada</b>';

				elseif (!validarNombresEsp($persona->nombres, 2, $error, 'Nombres')): $this->datos_view['mensajes'] = $error;

				elseif (!validarNombresEsp($persona->apellidos, 2, $error, 'Apellidos')): $this->datos_view['mensajes'] = $error;

				elseif (!validarRequerido($persona->nacionalidad, $error, 'Nacionalidad')): $this->datos_view['mensajes'] = $error;

				elseif (!validarRequerido($persona->estcivil, $error, Null)): $this->datos_view['mensajes'] = mensajeSeleccion('Estado Civil');

				elseif (!validarRequerido($persona->sexo, $error, Null)): $this->datos_view['mensajes'] = mensajeSeleccion('Genero');
				
				elseif (!validarNullEmail($persona->correo, $error, 'Correo')): $this->datos_view['mensajes'] = $error;
				
				elseif (!validarFax($persona->telefonoh, $error, 'Teléfono de Habitación')): $this->datos_view['mensajes'] = $error;
				
				elseif (!validarFax($persona->telefonom, $error, 'Teléfono Móvil')): $this->datos_view['mensajes'] = $error;

				elseif (!validarPermitidosTodos($persona->direccion, $error, 'Dirección')): $this->datos_view['mensajes'] = $error;

				else:

					if($persona->save()):

						$this->url_view = $this->url_modulo.'/'.$this->url_menu.'/success';
						$result = 'TRUE';

					else:

						$this->datos_view['mensajes'] = mensajeFormularioError('Registrar');
						$result = 'FALSE';

					endif;

					//-----------------------------------Auditoria---------------------------------------

						$this->data = array('Persona Registrada:' => $persona->cedula);
						$this->audit->register($result, $this->data); 

					//-----------------------------------------------------------------------------------	

				endif;			

			endif;	
		//------------------------------------------------------------------------------------------------------
		
		//---------------------------------Cargar Vistas-------------------------------------
		
			layout_all($this->titulo, $this->url_view, $this->datos_view , $this->view_menu, $this->datos_menu, $this->datos_crud);	 // Carga layouts.

		//-----------------------------------------------------------------------------------
		
	}	

	/**
	 * Metodo index Carga toda la vista principal Inicio
	 * url_base()/sic/sistema/configuracion/persona/buscar
	 */
	public function buscar() {

			$persona = new Persona;

			$persona->where('nombres <>', 'PROGRAMADOR')->where('id >', 0)->order_by('cedula', 'ASC')->get();

			$this->url_view    = $this->url_modulo.'/'.$this->url_menu.'/'.$this->url_crud;

			$this->datos_view  = array('personas' => $persona);

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
	 * url_base()/sic/sistema/configuracion/persona/modificar
	 */
	public function modificar($id = '') {

		if (!validarNullInt($id, $error, '')):

			redirect('configuracion/personas/buscar');

		else:
			
			$persona = new Persona;

			if($id != null):

				//-----------------------------Buscar Get--------------------------

				$persona->where('nombres <>', 'PROGRAMADOR')->get_by_id($id);

				$this->url_view    = $this->url_modulo.'/'.$this->url_menu.'/'.$this->url_crud;

				$this->datos_view  = array('personas' => $persona);

				//-----------------------------------------------------------------

			else:	

				$id = validarEntrada($this->input->post('id', TRUE));

				if($id == null):

					redirect('configuracion/personas/buscar');

				endif;

				$persona->get_by_id($id);

				$this->url_view    = $this->url_modulo.'/'.$this->url_menu.'/'.$this->url_crud;

				$this->datos_view  = array('personas' => $persona);

		//---------------------------------Recivir Variables Post----------------------------

				$persona->nombres      = validarEntrada($this->input->post('nombres', TRUE));
				$persona->apellidos    = validarEntrada($this->input->post('apellidos', TRUE));
				$persona->nacionalidad = validarEntrada($this->input->post('nacionalidad', TRUE));
				$persona->cedula       = validarEntrada($this->input->post('cedula', TRUE));
				$persona->estcivil     = validarEntrada($this->input->post('estcivil', TRUE));
				$persona->sexo         = validarEntrada($this->input->post('sexo', TRUE));
				$persona->correo       = validarEntrada($this->input->post('correo', TRUE));
				$persona->telefonoh    = validarEntrada($this->input->post('telefonoh', TRUE));
				$persona->telefonom    = validarEntrada($this->input->post('telefonom', TRUE));
				$persona->fechanac     = validarEntrada($this->input->post('fechanac', TRUE));
				$persona->direccion    = validarEntrada($this->input->post('direccion', TRUE));
				$persona->est_prs      = validarEntrada($this->input->post('estatus', TRUE));

			//-----------------------------------------------------------------------------------

			//------------------------//Inicio de Validaciones//---------------------------------

				if (!validarInt($persona->cedula, 7, 8, $error, 'Cedula')): $this->datos_view['mensajes'] = $error; 

				else:

					if (!validarNombresEsp($persona->nombres, 2, $error, 'Nombres')): $this->datos_view['mensajes'] = $error;

					elseif (!validarNombresEsp($persona->apellidos, 2, $error, 'Apellidos')): $this->datos_view['mensajes'] = $error;

					elseif (!validarRequerido($persona->nacionalidad, $error, 'Nacionalidad')): $this->datos_view['mensajes'] = $error;

					elseif (!validarRequerido($persona->estcivil, $error, Null)): $this->datos_view['mensajes'] = mensajeSeleccion('Estado Civil');

					elseif (!validarRequerido($persona->sexo, $error, Null)): $this->datos_view['mensajes'] = mensajeSeleccion('Genero');
					
					elseif (!validarNullEmail($persona->correo, $error, 'Correo')): $this->datos_view['mensajes'] = $error;
					
					elseif (!validarFax($persona->telefonoh, $error, 'Teléfono de Habitación')): $this->datos_view['mensajes'] = $error;
					
					elseif (!validarFax($persona->telefonom, $error, 'Teléfono Móvil')): $this->datos_view['mensajes'] = $error;

					elseif (!validarPermitidosTodos($persona->direccion, $error, 'Dirección')): $this->datos_view['mensajes'] = $error;

					else:

						if($persona->save()):

							$this->url_view = $this->url_modulo.'/'.$this->url_menu.'/successact';
							$result = 'TRUE';

						else:

							$this->datos_view['mensajes'] = mensajeFormularioError('Modificar');
							$result = 'FALSE';

						endif;

						//-----------------------------------Auditoria---------------------------------------

							$this->data = array('Persona Modificada:' => $persona->cedula);
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
	 * url_base()/sic/sistema/configuracion/persona/eliminar
	 */
	public function eliminar($id = '') {

		if (!validarInt($id, 1, 15, $error, '')):

			redirect('configuracion/personas/buscar');

		else:	

			$persona = new Persona;

			$this->datos_view = null;			

			$persona->get_by_id($id);
			$persona->usuario->get();

			$cedulae  = $persona->cedula;
			$nombrese = $persona->nombres;

			if ($persona->usuario != Null):

				$persona->usuario->delete();

			endif;

			if ($persona->delete()):

				$this->url_view = $this->url_modulo.'/'.$this->url_menu.'/successeli';
				$result = 'TRUE';

			else:

				$this->datos_view['mensajes'] = mensajeFormularioError('Eliminar');
				$result = 'FALSE';

			endif;	

		endif;	

		//-----------------------------------Auditoria---------------------------------------

				$this->data = array(
									'Persona Eliminada:' => $cedulae,
									'Nombres:' => $nombrese
									);

				$this->audit->register($result, $this->data); 

		//-----------------------------------------------------------------------------------	

		//---------------------------------Cargar Vistas-------------------------------------
		
			layout_all($this->titulo, $this->url_view, $this->datos_view, $this->view_menu, $this->datos_menu, $this->datos_crud);	 // Carga layouts.

		//-----------------------------------------------------------------------------------
		
	}

}

/* End of file Persona.php */
/* Location: ./application/controller/configuracion/Persona.php */