<?php defined ('BASEPATH') OR exit ('No direct script access allowed');

/**
 * Class sistemas
 */
class Sistemas extends CI_Controller {

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
	 * url_base()/sic/sistema/configuracion/sistema/registrar
	 */
	public function registrar() {

		//--------------------------Cargar variables del Metodo------------------------------ 
			$sistema  = new Sistema;
			$sistemaa = new Sistema;

			$this->datos_view = null;

		//---------------------------------Recivir Variables Post----------------------------

			$sistema->nom_sis = validarEntrada($this->input->post('nom_sis', TRUE));
			$sistema->est_sis = validarEntrada($this->input->post('est_sis', TRUE));

		//-----------------------------------------------------------------------------------

		//------------------------//Inicio de Validaciones//---------------------------------

			if (!validarNombresEspP($sistema->nom_sis, 2, $error, 'Nombre del Sistema')): $this->datos_view['mensajes'] = $error;

			else:

				$sistemaa->get_by_nom_sis($sistema->nom_sis);
			
				if($sistemaa->nom_sis != Null): $this->datos_view['mensajes'] = 'El Nombre del Sistema ya se encuentra <b>Registrado</b>';

				else:

					if($sistema->save()):

						$this->url_view = $this->url_modulo.'/'.$this->url_menu.'/success';
						$result = 'TRUE';

					else:

						$this->datos_view['mensajes'] = mensajeFormularioError('Registrar');
						$result = 'FALSE';

					endif;

					//-----------------------------------Auditoria---------------------------------------

						$this->data = array('Sistema Registrado:' => $sistema->nom_sis);
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
	 * url_base()/sic/sistema/configuracion/sistema/buscar
	 */
	public function buscar() {

			$sistema = new Sistema;

			$sistema->order_by('id', 'ASC')->get();

			$this->url_view    = $this->url_modulo.'/'.$this->url_menu.'/'.$this->url_crud;

			$this->datos_view  = array('sistemas' => $sistema);

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
	 * url_base()/sic/sistema/configuracion/sistema/modificar
	 */
	public function modificar($id = '') {

		if (!validarNullInt($id, $error, '')):

			redirect('configuracion/sistemas/buscar');

		else:
			
			$sistema = new sistema;

			if($id != null):

				//-----------------------------Buscar Get--------------------------

				$sistema->get_by_id($id);

				$this->url_view    = $this->url_modulo.'/'.$this->url_menu.'/'.$this->url_crud;

				$this->datos_view  = array('sistemas' => $sistema);

				//-----------------------------------------------------------------

			else:	

				$id = validarEntrada($this->input->post('id', TRUE));

				if($id == null):

					redirect('configuracion/sistemas/buscar');

				endif;

				$sistema->get_by_id($id);

				$this->url_view    = $this->url_modulo.'/'.$this->url_menu.'/'.$this->url_crud;

				$this->datos_view  = array('sistemas' => $sistema);

		//---------------------------------Recivir Variables Post----------------------------

				$sistema->nom_sis = validarEntrada($this->input->post('nom_sis', TRUE));
				$sistema->est_sis = validarEntrada($this->input->post('est_sis', TRUE));

		//-----------------------------------------------------------------------------------

		//------------------------//Inicio de Validaciones//---------------------------------

				if (!validarNombresEspP($sistema->nom_sis, 2, $error, 'Nombre del Sistema')): $this->datos_view['mensajes'] = $error;

				else:

					if($sistema->save()):

						$this->url_view = $this->url_modulo.'/'.$this->url_menu.'/successact';
						$result = 'TRUE';

					else:

						$this->datos_view['mensajes'] = mensajeFormularioError('Modificar');
						$result = 'FALSE';

					endif;

						//-----------------------------------Auditoria---------------------------------------

							$this->data = array('Sistema Modificado:' => $sistema->nom_sis);
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
	 * url_base()/sic/sistema/configuracion/sistema/eliminar
	 */
	public function eliminar($id = '') {

		if (!validarInt($id, 1, 15, $error, '')):

			redirect('configuracion/sistemas/buscar');

		else:	

			$sistema    = new Sistema;
			$subsistema = new Subsistema;

			$this->datos_view = null;

			$subsistema->get_by_sistema_id($id);
			$sistema->get_by_id($id);

			$nombrese = $sistema->nom_sis;

			if ($subsistema->nom_sub != Null):

				$subsistema->delete_all();

			endif;

			if ($sistema->delete()):

				$this->url_view = $this->url_modulo.'/'.$this->url_menu.'/successeli';
				$result = 'TRUE';

			else:

				$this->datos_view['mensajes'] = mensajeFormularioError('Eliminar');
				$result = 'FALSE';

			endif;	

		endif;	

		//-----------------------------------Auditoria---------------------------------------

				$this->data = array('Sistema Eliminado:' => $nombrese);

				$this->audit->register($result, $this->data);

		//-----------------------------------------------------------------------------------	

		//---------------------------------Cargar Vistas-------------------------------------
		
			layout_all($this->titulo, $this->url_view, $this->datos_view, $this->view_menu, $this->datos_menu, $this->datos_crud);	 // Carga layouts.

		//-----------------------------------------------------------------------------------
		
	}

}

/* End of file sistemas.php */
/* Location: ./application/controller/configuracion/sistemas.php */