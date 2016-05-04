<?php defined ('BASEPATH') OR exit ('No direct script access allowed');

/**
 * Class Consejoscomunales
 */
class Consejoscomunales extends CI_Controller {

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

			$this->data         = array();
			$this->url_modulo   = $this->uri->segment(1);
			$this->url_menu     = $this->uri->segment(2);
			$this->url_crud     = $this->uri->segment(3);
			$this->titulo       = ucwords($this->url_menu);
			$this->url_view     = $this->url_modulo.'/'.$this->url_menu;
			$this->view_menu    = $this->url_modulo.'/menu';
			$this->perfilmta_id = $this->session->userdata('perfilmta_id');

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
	 * url_base()/sic/sistema/consejocomunal/inicio
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
	 * url_base()/sic/sistema/consejocomunal/consejocomunales/registrar
	 */
	public function registrar() {

		//--------------------------Cargar variables del Metodo------------------------------ 
			$consejocomunales  = new Consejocomunal;
			$consejocomunalesa = new Consejocomunal;
			$this->datos_view = null;

		//---------------------------------Recivir Variables Post----------------------------

			$consejocomunales->tiporifcc       = validarEntrada($this->input->post('tiporifcc', TRUE));
			$consejocomunales->rifcc           = validarEntrada($this->input->post('rifcc', TRUE));
			$consejocomunales->nombrecc        = validarEntrada($this->input->post('nombrecc', TRUE));
			$consejocomunales->personacc1      = validarEntrada($this->input->post('personacc1', TRUE));
			$consejocomunales->personacc2      = validarEntrada($this->input->post('personacc2', TRUE));
			$consejocomunales->personacc3      = validarEntrada($this->input->post('personacc3', TRUE));
			$consejocomunales->estado_id       = validarEntrada($this->input->post('estado_id', TRUE));
			$consejocomunales->municipio_id    = validarEntrada($this->input->post('municipio_id', TRUE));
			$consejocomunales->parroquia_id    = validarEntrada($this->input->post('parroquia_id', TRUE));
			$consejocomunales->sector_id       = validarEntrada($this->input->post('sector_id', TRUE));
			$consejocomunales->est_cco         = validarEntrada($this->input->post('est_cco', TRUE));
			$consejocomunales->observacionescc = validarEntrada($this->input->post('observacionescc', TRUE));

		//-----------------------------------------------------------------------------------

		//------------------------//Inicio de Validaciones//---------------------------------

			if (!validarRequerido($consejocomunales->tiporifcc, $error, 'Tipo Rif')): $this->datos_view['mensajes'] = 'Debe seleccionar el <b>Tipo de Rif</b>.';

			elseif (!validarInt($consejocomunales->rifcc, 9, 9, $error, 'Rif')): $this->datos_view['mensajes'] = $error;

			else:

				$consejocomunalesa->get_by_rifcc($consejocomunales->rifcc);

				if($consejocomunalesa->rifcc != Null): $this->datos_view['mensajes'] = 'El nombre del Consejo Comunal ya se encuentra <b>Regsitrado</b>.';

				elseif (!validarNombresEspP($consejocomunales->nombrecc, 2, $error, 'Nombre')): $this->datos_view['mensajes'] = $error;

				elseif (!validarNombresEsp($consejocomunales->personacc1, 2, $error, 'Primer Titular')): $this->datos_view['mensajes'] = $error;

				elseif (!validarNombresEsp($consejocomunales->personacc2, 2, $error, 'Segundo Titular')): $this->datos_view['mensajes'] = $error;

				elseif (!validarNombresEsp($consejocomunales->personacc3, 2, $error, 'Tercer Titular')): $this->datos_view['mensajes'] = $error;

				elseif (!validarRequerido($consejocomunales->estado_id, $error, '')): $this->datos_view['mensajes'] = 'Datos del Estado se encuentran vacios.</br> Debe seleccionar un Estado.';

				elseif (!validarRequerido($consejocomunales->municipio_id, $error, '')): $this->datos_view['mensajes'] = 'Datos del Municipio se encuentran vacios.</br> Debe seleccionar un Municipio.';

				elseif (!validarRequerido($consejocomunales->parroquia_id, $error, '')): $this->datos_view['mensajes'] = 'Datos del la Parroquia se encuentran vacios.</br> Debe seleccionar una Parroquia.';

				elseif (!validarRequerido($consejocomunales->sector_id, $error, '')): $this->datos_view['mensajes'] = 'Datos del Sector se encuentran vacios.</br> Debe seleccionar un Sector.';

				else:

					$consejocomunalesa->get_by_sector_id($consejocomunales->sector_id);

					if($consejocomunalesa->sector_id != Null): $this->datos_view['mensajes'] = 'El Sector ya se encuentra asignado a un <b>Consejo Comunal</b>.';

					else:	

						if (!validarPermitidosTodos($consejocomunales->observaciones, $error, 'Observaciones')): $this->datos_view['mensajes'] = $error;
				
						else:

							if($consejocomunales->save()):

								$this->url_view = $this->url_modulo.'/'.$this->url_menu.'/success';
								$result = 'TRUE';

							else:

								$this->datos_view['mensajes'] = mensajeFormularioError('Registrar');
								$result = 'FALSE';

							endif;

							//-----------------------------------Auditoria---------------------------------------

								$this->data = array(
													'Consejo Comunal Registrado Rif:'    => $consejocomunales->rifcc,
													'Consejo Comunal Registrado Nombre:' => $consejocomunales->nombrecc
													);

								$this->audit->register($result, $this->data); 

							//-----------------------------------------------------------------------------------	

						endif;	

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
	 * url_base()/sic/sistema/consejocomunal/consejocomunales/buscar
	 */
	public function buscar() {

			$consejocomunales  = new Consejocomunal;

			$consejocomunales->include_related('municipio', '*');
			$consejocomunales->where('est_mun', 'TRUE');
			$consejocomunales->include_related('municipio/perfilmta', '*');
			$consejocomunales->where('est_pmt', 'TRUE');
			$consejocomunales->where('permisomta', 'TRUE');
			$consejocomunales->where('perfilmta_id', $this->perfilmta_id);
			$consejocomunales->order_by('id', 'ASC')->get();

			$this->url_view    = $this->url_modulo.'/'.$this->url_menu.'/'.$this->url_crud;

			$this->datos_view  = array('consejocomunales' => $consejocomunales);

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
	 * url_base()/sic/sistema/consejocomunal/consejocomunales/modificar
	 */
	public function modificar($id = '') {

		if (!validarNullInt($id, $error, '')):

			redirect('consejocomunal/consejoscomunales/buscar');

		else:
			
			$consejocomunales = new Consejocomunal;

			if($id != null):

				//-----------------------------Buscar Get--------------------------

				$consejocomunales->include_related('estado', '*');
				$consejocomunales->where('est_est', 'TRUE');
				$consejocomunales->include_related('municipio', '*');
				$consejocomunales->where('est_mun', 'TRUE');
				$consejocomunales->include_related('parroquia', '*');
				$consejocomunales->where('est_par', 'TRUE');
				$consejocomunales->include_related('sector', '*');
				$consejocomunales->where('est_sec', 'TRUE');
				$consejocomunales->include_related('municipio/perfilmta', '*');
				$consejocomunales->where('est_pmt', 'TRUE');
				$consejocomunales->where('permisomta', 'TRUE');
				$consejocomunales->where('perfilmta_id', $this->perfilmta_id);
				$consejocomunales->order_by('id', 'ASC')->get_by_id($id);

				$this->url_view   = $this->url_modulo.'/'.$this->url_menu.'/'.$this->url_crud;

				$this->datos_view = array('consejocomunales' => $consejocomunales);

				//-----------------------------------------------------------------

			else:	

				$id = validarEntrada($this->input->post('id', TRUE));

				if($id == null):

					redirect('consejocomunal/consejoscomunales/buscar');

				endif;

				$consejocomunales->include_related('estado', '*');
				$consejocomunales->where('est_est', 'TRUE');
				$consejocomunales->include_related('municipio', '*');
				$consejocomunales->where('est_mun', 'TRUE');
				$consejocomunales->include_related('parroquia', '*');
				$consejocomunales->where('est_par', 'TRUE');
				$consejocomunales->include_related('sector', '*');
				$consejocomunales->where('est_sec', 'TRUE');
				$consejocomunales->include_related('municipio/perfilmta', '*');
				$consejocomunales->where('est_pmt', 'TRUE');
				$consejocomunales->where('permisomta', 'TRUE');
				$consejocomunales->where('perfilmta_id', $this->perfilmta_id);
				$consejocomunales->order_by('id', 'ASC')->get_by_id($id);

				$this->url_view    = $this->url_modulo.'/'.$this->url_menu.'/'.$this->url_crud;

				$this->datos_view  = array('consejocomunales' => $consejocomunales);

		//---------------------------------Recivir Variables Post----------------------------

				$consejocomunales->tiporifcc       = validarEntrada($this->input->post('tiporifcc', TRUE));
				$consejocomunales->rifcc           = validarEntrada($this->input->post('rifcc', TRUE));
				$consejocomunales->nombrecc        = validarEntrada($this->input->post('nombrecc', TRUE));
				$consejocomunales->personacc1      = validarEntrada($this->input->post('personacc1', TRUE));
				$consejocomunales->personacc2      = validarEntrada($this->input->post('personacc2', TRUE));
				$consejocomunales->personacc3      = validarEntrada($this->input->post('personacc3', TRUE));
				$consejocomunales->estado_id       = validarEntrada($this->input->post('estado_id', TRUE));
				$consejocomunales->municipio_id    = validarEntrada($this->input->post('municipio_id', TRUE));
				$consejocomunales->parroquia_id    = validarEntrada($this->input->post('parroquia_id', TRUE));
				$consejocomunales->sector_id       = validarEntrada($this->input->post('sector_id', TRUE));
				$consejocomunales->est_cco         = validarEntrada($this->input->post('est_cco', TRUE));
				$consejocomunales->observacionescc = validarEntrada($this->input->post('observacionescc', TRUE));

			//-----------------------------------------------------------------------------------

			//------------------------//Inicio de Validaciones//---------------------------------

				if (!validarRequerido($consejocomunales->tiporifcc, $error, 'Tipo Rif')): $this->datos_view['mensajes'] = 'Debe seleccionar el <b>Tipo de Rif</b>.';

				elseif (!validarInt($consejocomunales->rifcc, 9, 9, $error, 'Rif')): $this->datos_view['mensajes'] = $error;

				else:

					if (!validarNombresEspP($consejocomunales->nombrecc, 2, $error, 'Nombre')): $this->datos_view['mensajes'] = $error;

					elseif (!validarNombresEsp($consejocomunales->personacc1, 2, $error, 'Primer Titular')): $this->datos_view['mensajes'] = $error;

					elseif (!validarNombresEsp($consejocomunales->personacc2, 2, $error, 'Segundo Titular')): $this->datos_view['mensajes'] = $error;

					elseif (!validarNombresEsp($consejocomunales->personacc3, 2, $error, 'Tercer Titular')): $this->datos_view['mensajes'] = $error;

					elseif (!validarRequerido($consejocomunales->estado_id, $error, '')): $this->datos_view['mensajes'] = 'Datos del Estado se encuentran vacios.</br> Debe seleccionar un Estado.';

					elseif (!validarRequerido($consejocomunales->municipio_id, $error, '')): $this->datos_view['mensajes'] = 'Datos del Municipio se encuentran vacios.</br> Debe seleccionar un Municipio.';

					elseif (!validarRequerido($consejocomunales->parroquia_id, $error, '')): $this->datos_view['mensajes'] = 'Datos del la Parroquia se encuentran vacios.</br> Debe seleccionar una Parroquia.';

					elseif (!validarRequerido($consejocomunales->sector_id, $error, '')): $this->datos_view['mensajes'] = 'Datos del Sector se encuentran vacios.</br> Debe seleccionar un Sector.';

					elseif (!validarPermitidosTodos($consejocomunales->observaciones, $error, '')): $this->datos_view['mensajes'] = $error;
			
					else:

						if($consejocomunales->save()):

							$this->url_view = $this->url_modulo.'/'.$this->url_menu.'/successact';
							$result = 'TRUE';

						else:

							$this->datos_view['mensajes'] = mensajeFormularioError('Modificar');
							$result = 'FALSE';

						endif;

						//-----------------------------------Auditoria---------------------------------------

							$this->data = array(
												'Consejo Comunal Modificado Rif:'    => $consejocomunales->rifcc,
												'Consejo Comunal Modificado Nombre:' => $consejocomunales->nombrecc
												);

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
	 * url_base()/sic/sistema/consejocomunal/consejocomunales/eliminar
	 */
	public function eliminar($id = '') {

		if (!validarInt($id, 1, 15, $error, '')):

			redirect('consejocomunal/consejoscomunales/buscar');

		else:	

			$consejocomunal = new Consejocomunal;

			$this->datos_view = null;

			$consejocomunal->get_by_id($id);
			$consejocomunal->mesatecnica->get();

			$nombrese = $consejocomunal->nombrecc;
			$rifcc = $consejocomunal->rifcc;

			if ($consejocomunal->mesatecnica != null):

				$consejocomunal->mesatecnica->delete();

			endif;

			if ($consejocomunal->delete()):

				$this->url_view = $this->url_modulo.'/'.$this->url_menu.'/successeli';
				$result = 'TRUE';

			else:

				$this->datos_view['mensajes'] = mensajeFormularioError('Eliminar');
				$result = 'FALSE';

			endif;

		endif;	

		//-----------------------------------Auditoria---------------------------------------

				$this->data = array(
									'Consejo Comunal Eliminado Rif:'    => $rifcc,
									'Consejo Comunal Eliminado Nombre:' => $nombrese
									);

				$this->audit->register($result, $this->data); 

		//-----------------------------------------------------------------------------------	

		//---------------------------------Cargar Vistas-------------------------------------
		
			layout_all($this->titulo, $this->url_view, $this->datos_view, $this->view_menu, $this->datos_menu, $this->datos_crud);	 // Carga layouts.

		//-----------------------------------------------------------------------------------
		
	}


}

/* End of file consejoscomunales.php */
/* Location: ./application/controller/configuracion/consejoscomunales.php */