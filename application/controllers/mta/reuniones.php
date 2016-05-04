<?php defined ('BASEPATH') OR exit ('No direct script access allowed');

/**
 * Class Reuniones
 */
class Reuniones extends CI_Controller {

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
	 * url_base()/sic/sistema/configuracion/reunion/registrar
	 */
	public function registrar() {

		//--------------------------Cargar variables del Metodo------------------------------ 
			$reunion  = new Reunion;
			$reuniona = new Reunion;
			$persona  = new Persona;

			$this->datos_view = null;

		//---------------------------------Recivir Variables Post----------------------------

			$reunion->mesatecnica_id = validarEntrada($this->input->post('mesatecnica_id', TRUE));
			$reunion->objetivo       = validarEntrada($this->input->post('objetivo', TRUE));
			$reunion->lugar          = validarEntrada($this->input->post('lugar', TRUE));
			$reunion->participacion	 = validarEntrada($this->input->post('participacion', TRUE));
			$reunion->fecha          = validarEntrada($this->input->post('fecha', TRUE));
			$reunion->hora   	     = validarEntrada($this->input->post('hora', TRUE));
			$reunion->compromiso  	 = validarEntrada($this->input->post('compromiso', TRUE));
			$reunion->responsable  	 = validarEntrada($this->input->post('responsable', TRUE));
			$reunion->fechacom  	 = validarEntrada($this->input->post('fechacom', TRUE));
			$reunion->conclusiones   = validarEntrada($this->input->post('conclusiones', TRUE));
			$reunion->observaciones  = validarEntrada($this->input->post('observaciones', TRUE));
			//$reunion->est_reu        = validarEntrada($this->input->post('est_reu', TRUE));
			$reunion->personati1_id  = validarEntrada($this->input->post('personati1_id', TRUE));
			$reunion->personati2_id  = validarEntrada($this->input->post('personati2_id', TRUE));
			$reunion->personati3_id  = validarEntrada($this->input->post('personati3_id', TRUE));
			$reunion->personati4_id  = validarEntrada($this->input->post('personati4_id', TRUE));
			$reunion->personasup1_id = validarEntrada($this->input->post('personasup1_id', TRUE));
			$reunion->personasup2_id = validarEntrada($this->input->post('personasup2_id', TRUE));
			$reunion->personasup3_id = validarEntrada($this->input->post('personasup3_id', TRUE));
			$reunion->personasup4_id = validarEntrada($this->input->post('personasup4_id', TRUE));
			
			$reunion->personati1 	  = validarEntrada($this->input->post('personati1', TRUE));
			if ($reunion->personati1  == null): $reunion->personati1 = 1; endif;
			$reunion->personati2  	  = validarEntrada($this->input->post('personati2', TRUE));
			if ($reunion->personati2  == null): $reunion->personati2 = 2; endif;
			$reunion->personati3  	  = validarEntrada($this->input->post('personati3', TRUE));
			if ($reunion->personati3  == null): $reunion->personati3 = 3; endif;
			$reunion->personati4  	  = validarEntrada($this->input->post('personati4', TRUE));
			if ($reunion->personati4  == null): $reunion->personati4 = 4; endif;
			$reunion->personasup1 	  = validarEntrada($this->input->post('personasup1', TRUE));
			if ($reunion->personasup1 == null): $reunion->personasup1 = 5; endif;
			$reunion->personasup2  	  = validarEntrada($this->input->post('personasup2', TRUE));
			if ($reunion->personasup2 == null): $reunion->personasup2 = 6; endif;
			$reunion->personasup3  	  = validarEntrada($this->input->post('personasup3', TRUE));
			if ($reunion->personasup3 == null): $reunion->personasup3 = 7; endif;
			$reunion->personasup4  	  = validarEntrada($this->input->post('personasup4', TRUE));
			if ($reunion->personasup4 == null): $reunion->personasup4 = 8; endif;

			$per = array($reunion->personati1_id, $reunion->personati2_id, $reunion->personati3_id, $reunion->personati4_id, $reunion->personasup1_id, $reunion->personasup2_id, $reunion->personasup3_id, $reunion->personasup4_id);

		//-----------------------------------------------------------------------------------

		//------------------------//Inicio de Validaciones//---------------------------------

			if (!validarRequerido($reunion->mesatecnica_id, $error, '')): $this->datos_view['mensajes'] = 'Datos de la Mesa Tecnica se encuentran vacios.</br> Debe seleccionar una Mesa Tecnica.';

			elseif (!validarRequerido($reunion->objetivo, $error, 'Objetivo')): $this->datos_view['mensajes'] = $error;

			elseif (!validarPermitidosTodos($reunion->objetivo, $error, 'Objetivo')): $this->datos_view['mensajes'] = $error;

			elseif (!validarRequerido($reunion->lugar, $error, 'Lugar')): $this->datos_view['mensajes'] = $error;

			elseif (!validarPermitidosTodos($reunion->lugar, $error, 'Lugar')): $this->datos_view['mensajes'] = $error;

			elseif (!validarRequerido($reunion->participacion, $error, 'Por Participación Social')): $this->datos_view['mensajes'] = $error;

			elseif (!validarPermitidosTodos($reunion->participacion, $error, 'Por Participación Social')): $this->datos_view['mensajes'] = $error;

			elseif (!validarRequerido($reunion->fecha, $error, 'Fecha')): $this->datos_view['mensajes'] = $error;

			elseif (!validarRequerido($reunion->hora, $error, 'Hora')): $this->datos_view['mensajes'] = $error;

			elseif (!validarPermitidosTodos($reunion->compromiso, $error, 'Compromiso(s)')): $this->datos_view['mensajes'] = $error;

			elseif (!validarPermitidosTodos($reunion->responsable, $error, 'Responsable(s)')): $this->datos_view['mensajes'] = $error;

			elseif (!validarPermitidosTodos($reunion->fechacom, $error, 'Fecha de Compromiso(s)')): $this->datos_view['mensajes'] = $error;

			elseif (!validarPermitidosTodos($reunion->conclusiones, $error, 'Desarrollo y Conclusiones')): $this->datos_view['mensajes'] = $error;

			elseif (!validarPermitidosTodos($reunion->observaciones, $error, 'Observaciones')): $this->datos_view['mensajes'] = $error;

			else:

				if($reunion->personati1_id == null && $reunion->personati2_id == null && $reunion->personati3_id == null && $reunion->personati4_id == null && $reunion->personasup1_id == null && $reunion->personasup2_id == null && $reunion->personasup3_id == null && $reunion->personasup4_id == null): $this->datos_view['mensajes'] = 'Debe seleccionar por lo menos un representante de la Mesa Tecnica';

				elseif ($reunion->personati1 == $reunion->personati2 || $reunion->personati1 == $reunion->personati3 || $reunion->personati1 == $reunion->personati4 || $reunion->personati1 == $reunion->personasup1 || $reunion->personati1 == $reunion->personasup2 || $reunion->personati1 == $reunion->personasup3 || $reunion->personati1 == $reunion->personasup4):

				$this->datos_view['mensajes'] = 'La persona <b>'.$reunion->personati1.'</b> se encuentra repetida.';

				else:

					if ($reunion->personati2 == $reunion->personati1 || $reunion->personati2 == $reunion->personati3 || $reunion->personati2 == $reunion->personati4 || $reunion->personati2 == $reunion->personasup1 || $reunion->personati2 == $reunion->personasup2 || $reunion->personati2 == $reunion->personasup3 || $reunion->personati2 == $reunion->personasup4):

					$this->datos_view['mensajes'] = 'La persona <b>'.$reunion->personati2.'</b> se encuentra repetida.';

					else:

						if ($reunion->personati3 == $reunion->personati1 || $reunion->personati3 == $reunion->personati2 || $reunion->personati3 == $reunion->personati4 || $reunion->personati3 == $reunion->personasup1 || $reunion->personati3 == $reunion->personasup2 || $reunion->personati3 == $reunion->personasup3 || $reunion->personati3 == $reunion->personasup4):

						$this->datos_view['mensajes'] = 'La persona <b>'.$reunion->personati3.'</b> se encuentra repetida.';

						else:

							if ($reunion->personati4 == $reunion->personati1 || $reunion->personati4 == $reunion->personati2 || $reunion->personati4 == $reunion->personati3 || $reunion->personati4 == $reunion->personasup1 || $reunion->personati4 == $reunion->personasup2 || $reunion->personati4 == $reunion->personasup3 || $reunion->personati4 == $reunion->personasup4):

							$this->datos_view['mensajes'] = 'La persona <b>'.$reunion->personati4.'</b> se encuentra repetida.';

							else:

								if ($reunion->personasup1 == $reunion->personati1 || $reunion->personasup1 == $reunion->personati2 || $reunion->personasup1 == $reunion->personati3 || $reunion->personasup1 == $reunion->personati4 || $reunion->personasup1 == $reunion->personasup2 || $reunion->personasup1 == $reunion->personasup3 || $reunion->personasup1 == $reunion->personasup4):

								$this->datos_view['mensajes'] = 'La persona <b>'.$reunion->personasup1.'</b> se encuentra repetida.';

								else:

									if ($reunion->personasup2 == $reunion->personati1 || $reunion->personasup2 == $reunion->personati2 || $reunion->personasup2 == $reunion->personati3 || $reunion->personasup2 == $reunion->personati4 || $reunion->personasup2 == $reunion->personasup1 || $reunion->personasup2 == $reunion->personasup3 || $reunion->personasup2 == $reunion->personasup4):

									$this->datos_view['mensajes'] = 'La persona <b>'.$reunion->personasup2.'</b> se encuentra repetida.';

									else:

										if ($reunion->personasup3 == $reunion->personati1 || $reunion->personasup3 == $reunion->personati2 || $reunion->personasup3 == $reunion->personati3 || $reunion->personasup3 == $reunion->personati4 || $reunion->personasup3 == $reunion->personasup1 || $reunion->personasup3 == $reunion->personasup2 || $reunion->personasup3 == $reunion->personasup4):

										$this->datos_view['mensajes'] = 'La persona <b>'.$reunion->personasup3.'</b> se encuentra repetida.';

										else:
												
											if ($reunion->personasup4 == $reunion->personati1 || $reunion->personasup4 == $reunion->personati2 || $reunion->personasup4 == $reunion->personati3 || $reunion->personasup4 == $reunion->personati4 || $reunion->personasup4 == $reunion->personasup1 || $reunion->personasup4 == $reunion->personasup2 || $reunion->personasup4 == $reunion->personasup3):

											$this->datos_view['mensajes'] = 'La persona <b>'.$reunion->personasup4.'</b> se encuentra repetida.';

											else:
												
												if ($reunion->save()):

													$result = 'succes';

												else:

													$result = 'fail';

												endif;

												$reunion->order_by('id', 'DESC')->limit(1)->get();

												foreach ($per as $id):

													if ($id != null):

														$persona->where('id', $id);
														$persona->get();

														$count = $persona->asist;

														if ($count == null):

															$count = 1;

														else:

															$count++;

														endif;

														$persona->asist = $count;
														$persona->save();
														$persona->save($reunion);

													endif;	

												endforeach;

												if($result == 'succes'):

														$this->url_view = $this->url_modulo.'/'.$this->url_menu.'/success';
														$result = 'TRUE';

												else:

														$this->datos_view['mensajes'] = mensajeFormularioError('Registrar');
														$result = 'FALSE';

												endif;

													//-----------------------------------Auditoria---------------------------------------

														$this->data = array(
																			'Reunion Registrada:' => $reunion->objetivo,
																			'Mta Id:'             => $reunion->mesatecnica_id                  
																		   );

														$this->audit->register($result, $this->data); 

													//-----------------------------------------------------------------------------------

											endif;

										endif;

									endif;

								endif;

							endif;

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
	 * url_base()/sic/sistema/configuracion/reunion/buscar
	 */
	public function buscar($id = '') {

			if ($id != null):

				if (!validarNullInt($id, $error, '')):

					redirect('mta/reuniones/');

				endif;

				$reunion = new Reunion;
				$perfilmta_id = $this->session->userdata('perfilmta_id');

				$reunion->include_related('mesatecnica', '*');
				$reunion->where('est_mes', 'TRUE');	
				$reunion->include_related('persona', '*');
				$reunion->where('est_prs', 'TRUE');
				$reunion->include_related('mesatecnica/consejocomunal', '*');
				$reunion->where('est_cco', 'TRUE');	
				$reunion->include_related('mesatecnica/estado', '*');
				$reunion->where('est_est', 'TRUE');
				$reunion->include_related('mesatecnica/municipio', '*');
				$reunion->where('est_mun', 'TRUE');
				$reunion->include_related('mesatecnica/parroquia', '*');
				$reunion->where('est_par', 'TRUE');	
				$reunion->include_related('mesatecnica/sector', '*');
				$reunion->where('est_sec', 'TRUE');	
				$reunion->include_related('mesatecnica/municipio/perfilmta', '*');
				$reunion->where('est_pmt', 'TRUE');
				$reunion->where('permisomta', 'TRUE');
				$reunion->where('perfilmta_id', $perfilmta_id);
				$reunion->order_by('id', 'ASC')->get_by_id($id);

				if ($reunion->id != null):

					$this->url_view   = $this->url_modulo.'/'.$this->url_menu.'/ver';

				else:

					$this->url_view   = $this->url_modulo.'/'.$this->url_menu;

				endif;

				$this->datos_view = array('reunions' => $reunion);

			//-----------------------------------Auditoria---------------------------------------

				$this->data = array('Ver:' => 'Todo');

				$this->audit->register('TRUE', $this->data);

			//-----------------------------------------------------------------------------------

			else:	

			$reunion = new Reunion;
			$perfilmta_id = $this->session->userdata('perfilmta_id');

			$reunion->include_related('mesatecnica', '*');
			$reunion->where('est_mes', 'TRUE');			
			$reunion->include_related('mesatecnica/municipio/perfilmta', '*');
			$reunion->where('est_pmt', 'TRUE');
			$reunion->where('permisomta', 'TRUE');
			$reunion->where('perfilmta_id', $perfilmta_id);
			$reunion->order_by('id', 'ASC')->get();

			$this->url_view   = $this->url_modulo.'/'.$this->url_menu.'/'.$this->url_crud;

			$this->datos_view = array('reunions' => $reunion);

		//-----------------------------------Auditoria---------------------------------------

			$this->data = array('Busqueda:' => 'Todo');

			$this->audit->register('TRUE', $this->data);

		//-----------------------------------------------------------------------------------

		endif;		
		
		//---------------------------------Cargar Vistas-------------------------------------
		
			layout_all($this->titulo, $this->url_view, $this->datos_view, $this->view_menu, $this->datos_menu, $this->datos_crud);	 // Carga layouts.

		//-----------------------------------------------------------------------------------
		
	}

}

/* End of file reuniones.php */
/* Location: ./application/controller/configuracion/reuniones.php */