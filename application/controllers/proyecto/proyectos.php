<?php defined ('BASEPATH') OR exit ('No direct script access allowed');

/**
 * Class Proyectos
 */
class Proyectos extends CI_Controller {

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
	 * url_base()/sic/sistema/configuracion/proyect/registrar
	 */
	public function registrar() {

		//--------------------------Cargar variables del Metodo------------------------------ 
			$proyect  = new Proyect;
			$proyecta = new Proyect;

			$this->datos_view = null;

		//---------------------------------Recivir Variables Post----------------------------

			$proyect->mesatecnica_id = validarEntrada($this->input->post('mesatecnica_id', TRUE));
			$proyect->empresa_id     = validarEntrada($this->input->post('empresa_id', TRUE));
			$proyect->exp_pro     	 = validarEntrada($this->input->post('exp_pro', TRUE));
			$proyect->nom_proyect    = validarEntrada($this->input->post('nom_proyect', TRUE));
			$proyect->sistema_id     = validarEntrada($this->input->post('sistema_id', TRUE));
			$proyect->subsistema_id  = validarEntrada($this->input->post('subsistema_id', TRUE));
			if ($proyect->subsistema_id==null) {
				$proyect->subsistema_id=null;
			}
			$proyect->problema       = validarEntrada($this->input->post('problema', TRUE));
			$proyect->diagnostico    = validarEntrada($this->input->post('diagnostico', TRUE));
			$proyect->descripcion    = validarEntrada($this->input->post('descripcion', TRUE));
			$proyect->beneficio      = validarEntrada($this->input->post('beneficio', TRUE));
			$proyect->costo          = validarEntrada($this->input->post('costo', TRUE));
			$proyect->fecha          = validarEntrada($this->input->post('fecha', TRUE));
			$proyect->observaciones  = validarEntrada($this->input->post('observaciones', TRUE));
			$proyect->tiempoa		 = validarEntrada($this->input->post('tiempoa', TRUE));
			$proyect->tiempob		 = validarEntrada($this->input->post('tiempob', TRUE));
			$proyect->tiempo		 = $proyect->tiempoa.' '.$proyect->tiempob;
			$proyect->status		 = validarEntrada($this->input->post('status', TRUE));
			$proyect->est_pro		 = validarEntrada($this->input->post('est_pro', TRUE));

		//-----------------------------------------------------------------------------------

		//------------------------//Inicio de Validaciones//---------------------------------

			if (!validarRequerido($proyect->mesatecnica_id, $error, '')): $this->datos_view['mensajes'] = 'Datos de la Mesa Tecnica se encuentran vacios.</br>Debe seleccionar una Mesa Tecnica.';

			elseif (!validarRequerido($proyect->sistema_id, $error, '')): $this->datos_view['mensajes'] = 'Datos del Sistema se encuentran vacios.</br>Debe seleccionar un Sistema.';

			elseif (!validarRequerido($proyect->empresa_id, $error, '')): $this->datos_view['mensajes'] = 'Datos de la Empresa se encuentran vacios.</br> Debe seleccionar una Empresa.';

			elseif (!validarNombresEspP($proyect->nom_proyect, 2, $error, 'Proyecto')): $this->datos_view['mensajes'] = $error;

			elseif (!validarRequerido($proyect->costo, $error, 'Costo')): $this->datos_view['mensajes'] = $error;

			elseif (!validarSoloNumerosDecimales($proyect->costo, $error, 'Costo')): $this->datos_view['mensajes'] = $error;

			elseif (!validarRequerido($proyect->fecha, $error, 'Fecha')): $this->datos_view['mensajes'] = $error;

			elseif (!validarRequerido($proyect->tiempoa, $error, 'Tiempo Estimado de Ejecución')): $this->datos_view['mensajes'] = $error;

			elseif (!validarSoloNumerosInt($proyect->tiempoa, $error, 'Tiempo Estimado de Ejecución')): $this->datos_view['mensajes'] = $error;

			elseif (!validarRequerido($proyect->tiempob, $error, '')): $this->datos_view['mensajes'] = 'Debe seleccionar el Tiempo Estimado de Ejecución';

			elseif (!validarRequerido($proyect->problema, $error, 'Problema')): $this->datos_view['mensajes'] = $error;

			elseif (!validarPermitidosTodos($proyect->problema, $error, 'Problema')): $this->datos_view['mensajes'] = $error;

			elseif (!validarRequerido($proyect->diagnostico, $error, 'Diagnostico')): $this->datos_view['mensajes'] = $error;

			elseif (!validarPermitidosTodos($proyect->diagnostico, $error, 'Diagnostico')): $this->datos_view['mensajes'] = $error;

			elseif (!validarRequerido($proyect->descripcion, $error, 'Descripcion')): $this->datos_view['mensajes'] = $error;

			elseif (!validarPermitidosTodos($proyect->descripcion, $error, 'Descripcion')): $this->datos_view['mensajes'] = $error;

			elseif (!validarRequerido($proyect->beneficio, $error, 'Beneficio')): $this->datos_view['mensajes'] = $error;

			elseif (!validarPermitidosTodos($proyect->beneficio, $error, 'Beneficio')): $this->datos_view['mensajes'] = $error;

			elseif (!validarRequerido($proyect->status, $error, 'Estatus')): $this->datos_view['mensajes'] = $error;

			elseif (!validarRequerido($proyect->exp_pro, $error, 'Nº Expediente')): $this->datos_view['mensajes'] = $error;

			elseif (!validarPermitidosTodos($proyect->observaciones, $error, 'Observaciones')): $this->datos_view['mensajes'] = $error;

			else:

				if($proyect->save()):

					$this->url_view = $this->url_modulo.'/'.$this->url_menu.'/success';
					$result = 'TRUE';

				else:

					$this->datos_view['mensajes'] = mensajeFormularioError('Registrar');
					$result = 'FALSE';

				endif;

				//-----------------------------------Auditoria---------------------------------------

					$this->data = array('Proyecto Registrado:' => $proyect->nom_proyect, 'Mesa Tencica' => $proyect->mesatecnica_id);
					$this->audit->register($result, $this->data); 

				//-----------------------------------------------------------------------------------

			endif;
	
		//------------------------------------------------------------------------------------------------------
		
		//---------------------------------Cargar Vistas-------------------------------------
		
			layout_all($this->titulo, $this->url_view, $this->datos_view , $this->view_menu, $this->datos_menu, $this->datos_crud);	 // Carga layouts.

		//-----------------------------------------------------------------------------------
		
	}	

	/**
	 * Metodo index Carga toda la vista principal Inicio
	 * url_base()/sic/sistema/configuracion/proyect/buscar
	 */
	public function buscar() {

			$proyect  = new Proyect;
			$perfilmta_id = $this->session->userdata('perfilmta_id');

			$proyect->include_related('sistema', '*');
			$proyect->where('est_sis', 'TRUE');
			$proyect->include_related('subsistema', '*');
			$proyect->where('est_sub', 'TRUE');
			$proyect->include_related('empresa', '*');
			$proyect->where('est_emp', 'TRUE');
			$proyect->include_related('mesatecnica', '*');
			$proyect->where('est_mes', 'TRUE');
			$proyect->include_related('mesatecnica/consejocomunal', '*');
			$proyect->where('est_cco', 'TRUE');
			$proyect->include_related('mesatecnica/estado', '*');
			$proyect->where('est_est', 'TRUE');
			$proyect->include_related('mesatecnica/municipio', '*');
			$proyect->where('est_mun', 'TRUE');	
			$proyect->include_related('mesatecnica/parroquia', '*');
			$proyect->where('est_par', 'TRUE');
			$proyect->include_related('mesatecnica/sector', '*');
			$proyect->where('est_sec', 'TRUE');		
			$proyect->include_related('mesatecnica/municipio/perfilmta', '*');
			$proyect->where('est_pmt', 'TRUE');
			$proyect->where('permisomta', 'TRUE');
			$proyect->where('perfilmta_id', $perfilmta_id);
			$proyect->order_by('id', 'ASC')->get();

			$this->url_view   = $this->url_modulo.'/'.$this->url_menu.'/'.$this->url_crud;

			$this->datos_view = array('proyects' => $proyect);

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
	 * url_base()/sic/sistema/configuracion/proyect/modificar
	 */
	public function modificar($id = '') {

		if (!validarNullInt($id, $error, '')):

			redirect('proyect/proyectos/buscar');

		else:
			
			$proyect = new Proyect;

			$perfilmta_id = $this->session->userdata('perfilmta_id');

			if($id != null):

			//-----------------------------Buscar Get--------------------------

				$proyect->include_related('sistema', '*');
				$proyect->where('est_sis', 'TRUE');
				$proyect->include_related('subsistema', '*');
				$proyect->where('est_sub', 'TRUE');
				$proyect->include_related('empresa', '*');
				$proyect->where('est_emp', 'TRUE');
				$proyect->include_related('mesatecnica', '*');
				$proyect->where('est_mes', 'TRUE');
				$proyect->include_related('mesatecnica/consejocomunal', '*');
				$proyect->where('est_cco', 'TRUE');
				$proyect->include_related('mesatecnica/estado', '*');
				$proyect->where('est_est', 'TRUE');
				$proyect->include_related('mesatecnica/municipio', '*');
				$proyect->where('est_mun', 'TRUE');	
				$proyect->include_related('mesatecnica/parroquia', '*');
				$proyect->where('est_par', 'TRUE');
				$proyect->include_related('mesatecnica/sector', '*');
				$proyect->where('est_sec', 'TRUE');		
				$proyect->include_related('mesatecnica/municipio/perfilmta', '*');
				$proyect->where('est_pmt', 'TRUE');
				$proyect->where('permisomta', 'TRUE');
				$proyect->where('perfilmta_id', $perfilmta_id);
				$proyect->order_by('id', 'ASC')->get_by_id($id);

				$this->url_view   = $this->url_modulo.'/'.$this->url_menu.'/'.$this->url_crud;

				$this->datos_view = array('proyects' => $proyect);

			//-----------------------------------------------------------------

			else:	

				$id = validarEntrada($this->input->post('id', TRUE));

				if($id == null):

					redirect('proyect/proyectos/buscar');

				endif;

				$proyect->include_related('sistema', '*');
				$proyect->where('est_sis', 'TRUE');
				$proyect->include_related('subsistema', '*');
				$proyect->where('est_sub', 'TRUE');
				$proyect->include_related('empresa', '*');
				$proyect->where('est_emp', 'TRUE');
				$proyect->include_related('mesatecnica', '*');
				$proyect->where('est_mes', 'TRUE');
				$proyect->include_related('mesatecnica/consejocomunal', '*');
				$proyect->where('est_cco', 'TRUE');
				$proyect->include_related('mesatecnica/estado', '*');
				$proyect->where('est_est', 'TRUE');
				$proyect->include_related('mesatecnica/municipio', '*');
				$proyect->where('est_mun', 'TRUE');	
				$proyect->include_related('mesatecnica/parroquia', '*');
				$proyect->where('est_par', 'TRUE');
				$proyect->include_related('mesatecnica/sector', '*');
				$proyect->where('est_sec', 'TRUE');		
				$proyect->include_related('mesatecnica/municipio/perfilmta', '*');
				$proyect->where('est_pmt', 'TRUE');
				$proyect->where('permisomta', 'TRUE');
				$proyect->where('perfilmta_id', $perfilmta_id);
				$proyect->order_by('id', 'ASC')->get_by_id($id);

				$this->url_view   = $this->url_modulo.'/'.$this->url_menu.'/'.$this->url_crud;

				$this->datos_view = array('proyects' => $proyect);

		//---------------------------------Recivir Variables Post----------------------------

				$proyect->mesatecnica_id = validarEntrada($this->input->post('mesatecnica_id', TRUE));
				$proyect->empresa_id     = validarEntrada($this->input->post('empresa_id', TRUE));
				$proyect->nom_proyect    = validarEntrada($this->input->post('nom_proyect', TRUE));
				$proyect->sistema_id     = validarEntrada($this->input->post('sistema_id', TRUE));
				$proyect->subsistema_id  = validarEntrada($this->input->post('subsistema_id', TRUE));
				$proyect->problema       = validarEntrada($this->input->post('problema', TRUE));
				$proyect->diagnostico    = validarEntrada($this->input->post('diagnostico', TRUE));
				$proyect->descripcion    = validarEntrada($this->input->post('descripcion', TRUE));
				$proyect->beneficio      = validarEntrada($this->input->post('beneficio', TRUE));
				$proyect->costo          = validarEntrada($this->input->post('costo', TRUE));
				$proyect->fecha          = validarEntrada($this->input->post('fecha', TRUE));
				$proyect->observaciones  = validarEntrada($this->input->post('observaciones', TRUE));
				$proyect->tiempoa		 = validarEntrada($this->input->post('tiempoa', TRUE));
				$proyect->tiempob		 = validarEntrada($this->input->post('tiempob', TRUE));
				$proyect->tiempo		 = $proyect->tiempoa.' '.$proyect->tiempob;
				$proyect->status		 = validarEntrada($this->input->post('status', TRUE));
				$proyect->est_pro		 = validarEntrada($this->input->post('est_pro', TRUE));

		//-----------------------------------------------------------------------------------

		//------------------------//Inicio de Validaciones//---------------------------------

				if (!validarRequerido($proyect->mesatecnica_id, $error, '')): $this->datos_view['mensajes'] = 'Datos de la Mesa Tecnica se encuentran vacios.</br>Debe seleccionar una Mesa Tecnica.';

				elseif (!validarRequerido($proyect->sistema_id, $error, '')): $this->datos_view['mensajes'] = 'Datos del Sistema se encuentran vacios.</br>Debe seleccionar un Sistema.';

				elseif (!validarRequerido($proyect->empresa_id, $error, '')): $this->datos_view['mensajes'] = 'Datos de la Empresa se encuentran vacios.</br> Debe seleccionar una Empresa.';

				elseif (!validarNombresEspP($proyect->nom_proyect, 2, $error, 'Proyecto')): $this->datos_view['mensajes'] = $error;

				elseif (!validarRequerido($proyect->costo, $error, 'Costo')): $this->datos_view['mensajes'] = $error;

				elseif (!validarSoloNumerosDecimales($proyect->costo, $error, 'Costo')): $this->datos_view['mensajes'] = $error;

				elseif (!validarRequerido($proyect->fecha, $error, 'Fecha')): $this->datos_view['mensajes'] = $error;

				elseif (!validarRequerido($proyect->tiempoa, $error, 'Tiempo Estimado de Ejecución')): $this->datos_view['mensajes'] = $error;

				elseif (!validarSoloNumerosInt($proyect->tiempoa, $error, 'Tiempo Estimado de Ejecución')): $this->datos_view['mensajes'] = $error;

				elseif (!validarRequerido($proyect->tiempob, $error, '')): $this->datos_view['mensajes'] = 'Debe seleccionar el Tiempo Estimado de Ejecución';

				elseif (!validarRequerido($proyect->problema, $error, 'Problema')): $this->datos_view['mensajes'] = $error;

				elseif (!validarPermitidosTodos($proyect->problema, $error, 'Problema')): $this->datos_view['mensajes'] = $error;

				elseif (!validarRequerido($proyect->diagnostico, $error, 'Diagnostico')): $this->datos_view['mensajes'] = $error;

				elseif (!validarPermitidosTodos($proyect->diagnostico, $error, 'Diagnostico')): $this->datos_view['mensajes'] = $error;

				elseif (!validarRequerido($proyect->descripcion, $error, 'Descripcion')): $this->datos_view['mensajes'] = $error;

				elseif (!validarPermitidosTodos($proyect->descripcion, $error, 'Descripcion')): $this->datos_view['mensajes'] = $error;

				elseif (!validarRequerido($proyect->beneficio, $error, 'Beneficio')): $this->datos_view['mensajes'] = $error;

				elseif (!validarPermitidosTodos($proyect->beneficio, $error, 'Beneficio')): $this->datos_view['mensajes'] = $error;

				elseif (!validarRequerido($proyect->status, $error, 'Estatus')): $this->datos_view['mensajes'] = $error;

				elseif (!validarPermitidosTodos($proyect->observaciones, $error, 'Observaciones')): $this->datos_view['mensajes'] = $error;

				else:

					if($proyect->save()):

						$this->url_view = $this->url_modulo.'/'.$this->url_menu.'/successact';
						$result = 'TRUE';

					else:

						$this->datos_view['mensajes'] = mensajeFormularioError('Modificar');
						$result = 'FALSE';

					endif;

					//-----------------------------------Auditoria---------------------------------------

						$this->data = array('Proyecto Modificado:' => $proyect->nom_proyect);
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
	 * url_base()/sic/sistema/configuracion/proyect/eliminar
	 */
	public function eliminar($id = '') {

		if (!validarInt($id, 1, 15, $error, '')):

			redirect('proyect/proyectos/buscar');

		else:	

			$proyect = new Proyect;

			$this->datos_view = null;			

			$proyect->get_by_id($id);

			$mesatecnicaid  = $proyect->mesatecnica_id;
			$nombrese  	    = $proyect->nom_proyect;

			if ($proyect->delete()):

				$this->url_view = $this->url_modulo.'/'.$this->url_menu.'/successeli';
				$result = 'TRUE';

			else:

				$this->datos_view['mensajes'] = mensajeFormularioError('Eliminar');
				$result = 'FALSE';

			endif;	

		endif;	

		//-----------------------------------Auditoria---------------------------------------

				$this->data = array(
									'Codigo MTA:' => $mesatecnicaid,
									'Nombre del Proyecto:' => $nombrese
									);

				$this->audit->register($result, $this->data);

		//-----------------------------------------------------------------------------------	

		//---------------------------------Cargar Vistas-------------------------------------
		
			layout_all($this->titulo, $this->url_view, $this->datos_view, $this->view_menu, $this->datos_menu, $this->datos_crud);	 // Carga layouts.

		//-----------------------------------------------------------------------------------
		
	}

}

/* End of file proyecto.php */
/* Location: ./application/controller/proyecto/proyecto.php */