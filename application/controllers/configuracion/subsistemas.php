<?php defined ('BASEPATH') OR exit ('No direct script access allowed');

/**
 * Class Subsistemas
 */
class Subsistemas extends CI_Controller {

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
	 * url_base()/sic/subsistema/configuracion/inicio
	 */
	public function index() {

			$this->datos_view = null;

		//-----------------------------------------------------------------------------------
		
		//---------------------------------Cargar Vistas-------------------------------------
		
			layout_all($this->titulo, $this->url_view, $this->datos_view , $this->view_menu, $this->datos_menu, $this->datos_crud);	 // Carga layouts.

		//-----------------------------------------------------------------------------------
		
	}	

	/**
	 * Metodo index Carga toda la vista principal Inicio
	 * url_base()/sic/subsistema/configuracion/subsistema/registrar
	 */
	public function registrar() {

		//--------------------------Cargar variables del Metodo------------------------------ 
			$subsistema  = new Subsistema;
			$subsistemaa = new Subsistema;

			$this->datos_view = null;

		//---------------------------------Recivir Variables Post----------------------------

			$subsistema->sistema_id = validarEntrada($this->input->post('sistema_id', TRUE));

			$subsistema->nom_sub = validarEntrada($this->input->post('nom_sub', TRUE));

			$subsistema->est_sub = validarEntrada($this->input->post('est_sub', TRUE));

		//-----------------------------------------------------------------------------------

		//------------------------//Inicio de Validaciones//---------------------------------

			if (!validarRequerido($subsistema->sistema_id, $error, '')): $this->datos_view['mensajes'] = 'Debe seleccionar un sistema';

			elseif (!validarNombresEspP($subsistema->nom_sub, 2, $error, 'Nombre del Subsistema')): $this->datos_view['mensajes'] = $error;

			else:

				$subsistemaa->get_by_nom_sub($subsistema->nom_sub);
			
				if($subsistemaa->nom_sub != Null): $this->datos_view['mensajes'] = 'El Nombre del Subsistema ya se encuentra <b>Registrado</b>.';

				else:

					if($subsistema->save()):

						$this->url_view = $this->url_modulo.'/'.$this->url_menu.'/success';
						$result = 'TRUE';

					else:

						$this->datos_view['mensajes'] = mensajeFormularioError('Registrar');
						$result = 'FALSE';

					endif;

					//-----------------------------------Auditoria---------------------------------------

						$this->data = array(
											'Sistema_id'             => $subsistema->sistema_id,
											'Subsistema Registrado:' => $subsistema->nom_sub
										   );

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
	 * url_base()/sic/subsistema/configuracion/subsistema/buscar
	 */
	public function buscar() {

			$subsistema = new Subsistema;

			$subsistema->include_related('sistema', '*');
			$subsistema->where('est_sis', 'TRUE');
			$subsistema->where('id >', '0');
			$subsistema->order_by('id', 'ASC')->get();

			$this->url_view    = $this->url_modulo.'/'.$this->url_menu.'/'.$this->url_crud;

			$this->datos_view  = array('subsistemas' => $subsistema);

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
	 * url_base()/sic/subsistema/configuracion/subsistema/modificar
	 */
	public function modificar($id = '') {

		if (!validarNullInt($id, $error, '')):

			redirect('configuracion/subsistemas/buscar');

		else:
			
			$subsistema = new Subsistema;
			$sistema    = new Sistema;

			if($id != null):

				//-----------------------------Buscar Get--------------------------

					$subsistema->include_related('sistema', '*');
					$subsistema->order_by('nom_sub', 'ASC')->get_by_id($id);

					$this->url_view = $this->url_modulo.'/'.$this->url_menu.'/'.$this->url_crud;

					$sistema->get();

					$this->datos_view = array('sistemas' => $sistema);

					$this->datos_view = array('subsistemas' => $subsistema);

				//-----------------------------------------------------------------

			else:	

				$id = validarEntrada($this->input->post('id', TRUE));

				if($id == null):

					redirect('configuracion/subsistemas/buscar');

				endif;

				$subsistema->include_related('sistema', '*');
				$subsistema->order_by('nom_sub', 'ASC')->get();

				$this->url_view    = $this->url_modulo.'/'.$this->url_menu.'/'.$this->url_crud;

				$sistema->get();

				$this->datos_view = array('sistemas' => $sistema);

				$this->datos_view = array('subsistemas' => $subsistema);

		//---------------------------------Recivir Variables Post----------------------------

				$subsistema->sistema_id = validarEntrada($this->input->post('sistema_id', TRUE));

				$subsistema->nom_sub = validarEntrada($this->input->post('nom_sub', TRUE));

				$subsistema->est_sub = validarEntrada($this->input->post('est_sub', TRUE));

		//-----------------------------------------------------------------------------------

		//------------------------//Inicio de Validaciones//---------------------------------

				if (!validarNombresEspP($subsistema->nom_sub, 2, $error, 'Nombre del Subsistema')): $this->datos_view['mensajes'] = $error;

				else:

					if($subsistema->save()):

						$this->url_view = $this->url_modulo.'/'.$this->url_menu.'/successact';
						$result = 'TRUE';

					else:

						$this->datos_view['mensajes'] = mensajeFormularioError('Modificar');
						$result = 'FALSE';

					endif;

						//-----------------------------------Auditoria---------------------------------------

							$this->data = array(
												'Sistema'                => $subsistema->sistema_nom_sis,
												'Subsistema Modificado:' => $subsistema->nom_sub
												);

							$this->audit->register($result, $this->data); 

						//-----------------------------------------------------------------------------------			

				endif;
						
			endif;
		//---------------------------------Cargar Vistas-------------------------------------
		
			layout_all($this->titulo, $this->url_view, $this->datos_view, $this->view_menu, $this->datos_menu, $this->datos_crud);	 // Carga layouts.

		//-----------------------------------------------------------------------------------

		endif;	
		
	}

	/**
	 * Metodo index Carga toda la vista principal Inicio
	 * url_base()/sic/subsistema/configuracion/subsistema/eliminar
	 */
	public function eliminar($id = '') {

		if (!validarInt($id, 1, 15, $error, '')):

			redirect('configuracion/subsistemas/buscar');

		else:	

			$subsistema = new Subsistema;

			$this->datos_view = null;

			$subsistema->include_related('sistema', '*');
			$subsistema->get_by_id($id);

			$sistema_nome = $subsistema->sistema_nom_sis;
			$nombrese    = $subsistema->nom_sub;

			if ($subsistema->delete()):

				$this->url_view = $this->url_modulo.'/'.$this->url_menu.'/successeli';
				$result = 'TRUE';

			else:

				$this->datos_view['mensajes'] = mensajeFormularioError('Eliminar');
				$result = 'FALSE';

			endif;	

		endif;	

		//-----------------------------------Auditoria---------------------------------------

				$this->data = array(
									'Nombre del Sistema'    => $sistema_nome,
									'Subsistema Eliminado:' => $nombrese
									);

				$this->audit->register($result, $this->data); 

		//-----------------------------------------------------------------------------------	

		//---------------------------------Cargar Vistas-------------------------------------
		
			layout_all($this->titulo, $this->url_view, $this->datos_view, $this->view_menu, $this->datos_menu, $this->datos_crud);	 // Carga layouts.

		//-----------------------------------------------------------------------------------
		
	}

}

/* End of file subsistemas.php */
/* Location: ./application/controller/configuracion/subsistemas.php */