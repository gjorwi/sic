<?php defined ('BASEPATH') OR exit ('No direct script access allowed');

/**
 * Class Mesastecnicas
 */
class Mesastecnicas extends CI_Controller {

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

		$mta = new Mesatecnica;

		$mta->where('est_mes', 'TRUE');
		$mta->order_by('id', 'ASC');
		$mta->get();

		$fecha = date('d-m-Y');

		$diaactual = date("d",strtotime($fecha));
		$mesactual = date("m",strtotime($fecha));
		$anoactual = date("Y",strtotime($fecha));

		foreach ($mta as $row):

		if ($row->fecharestruct == null):

			$array = explode('-', $row->fechaconform);
		
		else:
			
			$array = explode('-', $row->fecharestruct);

		endif;

			$dia = $array[0];
			$mes = $array[1];
			$ano = $array[2];

			$anovenc = $ano + 2;

		if($anovenc == $anoactual && $mes < $mesactual):

			$count = 1;

		elseif($anovenc == $anoactual && $mes <= $mesactual && $dia <= $diaactual):		

			$count = 1;

		endif;	

		if ($count == 1):

			$mta->where('id', $row->id)->update('est_mes', 'FALSE');

			$mta_xvencer = new Mta_xvencer;

			if($mta_xvencer->get_by_mesatecnica_id($row->id) != null):

				$mta_xvencer->delete();

			endif;	


		endif;	

			$count = 0;
			$anovenc = 0;

		endforeach;

		//--------------------------Cargar variables del Metodo------------------------------ 	

			$this->datos_view =  null;

		//-----------------------------------------------------------------------------------
		
		//---------------------------------Cargar Vistas-------------------------------------
		
			layout_all($this->titulo, $this->url_view, $this->datos_view , $this->view_menu, $this->datos_menu, $this->datos_crud);	 // Carga layouts.

		//-----------------------------------------------------------------------------------
		
	}	

	/**
	 * Metodo index Carga toda la vista principal Inicio
	 * url_base()/sic/sistema/configuracion/mesatecnica/registrar
	 */
	public function registrar() {

		//--------------------------Cargar variables del Metodo------------------------------ 
			$mesatecnica  = new Mesatecnica;
			$mesatecnicaa = new Mesatecnica;
			$relacion     = new Mesatecnicas_persona;

			$this->datos_view = null;

		//---------------------------------Recivir Variables Post----------------------------

			$mesatecnica->consejocomunal_id = validarEntrada($this->input->post('consejocomunal_id', TRUE));
			if ($mesatecnica->consejocomunal_id == null): $mesatecnica->consejocomunal_id = 0; endif;
			$mesatecnica->tiporifmta      	= validarEntrada($this->input->post('tiporifmta', TRUE));
			$mesatecnica->rifmta            = validarEntrada($this->input->post('rifmta', TRUE));
			$mesatecnica->nom_mta	        = validarEntrada($this->input->post('nom_mta', TRUE));
			$mesatecnica->num_cuenta        = validarEntrada($this->input->post('num_cuenta', TRUE));
			$mesatecnica->fechaconform   	= validarEntrada($this->input->post('fechaconform', TRUE));
			$mesatecnica->fecharestruct  	= validarEntrada($this->input->post('fecharestruct', TRUE));
			$mesatecnica->personati1_id  	= validarEntrada($this->input->post('personati1_id', TRUE));
			$mesatecnica->personati2_id  	= validarEntrada($this->input->post('personati2_id', TRUE));
			$mesatecnica->personati3_id  	= validarEntrada($this->input->post('personati3_id', TRUE));
			$mesatecnica->personati4_id  	= validarEntrada($this->input->post('personati4_id', TRUE));
			$mesatecnica->personasup1_id 	= validarEntrada($this->input->post('personasup1_id', TRUE));
			if ($mesatecnica->personasup1_id == null): $mesatecnica->personasup1_id = 0; endif;
			$mesatecnica->personasup2_id 	= validarEntrada($this->input->post('personasup2_id', TRUE));
			if ($mesatecnica->personasup2_id == null): $mesatecnica->personasup2_id = 0; endif;
			$mesatecnica->personasup3_id 	= validarEntrada($this->input->post('personasup3_id', TRUE));
			if ($mesatecnica->personasup3_id == null): $mesatecnica->personasup3_id = 0; endif;
			$mesatecnica->personasup4_id 	= validarEntrada($this->input->post('personasup4_id', TRUE));
			if ($mesatecnica->personasup4_id == null): $mesatecnica->personasup4_id = 0; endif;
			$mesatecnica->personati1 	 	= validarEntrada($this->input->post('personati1', TRUE));
			$mesatecnica->personati2  		= validarEntrada($this->input->post('personati2', TRUE));
			$mesatecnica->personati3  		= validarEntrada($this->input->post('personati3', TRUE));
			$mesatecnica->personati4  		= validarEntrada($this->input->post('personati4', TRUE));
			$mesatecnica->personasup1 	 	= validarEntrada($this->input->post('personasup1', TRUE));
			if ($mesatecnica->personasup1   == null): $mesatecnica->personasup1 = 01; endif; 
			$mesatecnica->personasup2  		= validarEntrada($this->input->post('personasup2', TRUE));
			if ($mesatecnica->personasup2   == null): $mesatecnica->personasup2 = 02; endif; 
			$mesatecnica->personasup3  		= validarEntrada($this->input->post('personasup3', TRUE));
			if ($mesatecnica->personasup3   == null): $mesatecnica->personasup3 = 03; endif; 
			$mesatecnica->personasup4  		= validarEntrada($this->input->post('personasup4', TRUE));	
			if ($mesatecnica->personasup4   == null): $mesatecnica->personasup4 = 04; endif; 
			$mesatecnica->estado_id         = validarEntrada($this->input->post('estado_id', TRUE));
			$mesatecnica->municipio_id      = validarEntrada($this->input->post('municipio_id', TRUE));
			$mesatecnica->parroquia_id      = validarEntrada($this->input->post('parroquia_id', TRUE));
			$mesatecnica->sector_id         = validarEntrada($this->input->post('sector_id', TRUE));
			$mesatecnica->exp_mta 	 		= validarEntrada($this->input->post('exp_mta', TRUE));
			$mesatecnica->est_mes		 	= validarEntrada($this->input->post('est_mes', TRUE));
			$mesatecnica->observaciones  	= validarEntrada($this->input->post('observaciones', TRUE));
			
			$nombres     = explode(' ', ucwords(strtolower($this->session->userdata('nombres'))));
			$apellidos   = explode(' ', ucwords(strtolower($this->session->userdata('apellidos'))));

			$mesatecnica->registrado_por1  = $nombres[0].' '.$apellidos[0]; 
			$mesatecnica->registrado_por2  = $this->session->userdata('cedula');
			
			$per = array($mesatecnica->personati1_id, $mesatecnica->personati2_id, $mesatecnica->personati3_id, $mesatecnica->personati4_id, $mesatecnica->personasup1_id, $mesatecnica->personasup2_id, $mesatecnica->personasup3_id, $mesatecnica->personasup4_id);

		//-----------------------------------------------------------------------------------

		//------------------------//Inicio de Validaciones//---------------------------------


				if (!validarRequerido($mesatecnica->tiporifmta, $error, 'Tipo de Rif de la M.T.A.')): $this->datos_view['mensajes'] = 'Debe seleccionar el <b>Tipo de Rif de la M.T.A.</b>';

				elseif (!validarInt($mesatecnica->rifmta, 9, 9, $error, 'Rif de la M.T.A.')): $this->datos_view['mensajes'] = $error; 

				else:

					$mesatecnicaa->get_by_rifmta($mesatecnica->rifmta);
			
					if($mesatecnicaa->rifmta != Null && $mesatecnicaa->tiporifmta == $mesatecnica->tiporifmta): $this->datos_view['mensajes'] = 'Esta <b>Mesa Tecnica</b> ya se encuentra registrada.';

					elseif (!validarNombresEspP($mesatecnica->nom_mta, 2, $error, 'Nombre M.T.A.')): $this->datos_view['mensajes'] = $error;

					elseif (!validarInt($mesatecnica->num_cuenta, 20, 20, $error, 'Número de Cuenta')): $this->datos_view['mensajes'] = $error; 

					elseif (!validarRequerido($mesatecnica->fechaconform, $error, 'Fecha de Conformación')): $this->datos_view['mensajes'] = $error;

					elseif (!validarRequerido($mesatecnica->estado_id, $error, '')): $this->datos_view['mensajes'] = 'Datos del Estado se encuentran vacios.</br> Debe seleccionar un Estado.';

					elseif (!validarRequerido($mesatecnica->municipio_id, $error, '')): $this->datos_view['mensajes'] = 'Datos del Municipio se encuentran vacios.</br> Debe seleccionar un Municipio.';

					elseif (!validarRequerido($mesatecnica->parroquia_id, $error, '')): $this->datos_view['mensajes'] = 'Datos del la Parroquia se encuentran vacios.</br> Debe seleccionar una Parroquia.';

					elseif (!validarRequerido($mesatecnica->sector_id, $error, '')): $this->datos_view['mensajes'] = 'Datos del Sector se encuentran vacios.</br> Debe seleccionar un Sector.';

					else:

						$mesatecnicaa->get_by_sector_id($mesatecnica->sector_id);

						if($mesatecnicaa->sector_id != Null): $this->datos_view['mensajes'] = 'El Sector ya se encuentra asignado a una <b>Mesa Tecnica de Agua</b>.';

						elseif (!validarRequerido($mesatecnica->personati1_id, $error, '')): $this->datos_view['mensajes'] = 'Datos de la persona de Agua Potable y Saneamiento se encuentran vacios.</br>Debe seleccionar una Persona.';

						else:

							if ($mesatecnica->personati1 == $mesatecnica->personati2 || $mesatecnica->personati1 == $mesatecnica->personati3 || $mesatecnica->personati1 == $mesatecnica->personati4 || $mesatecnica->personati1 == $mesatecnica->personasup1 || $mesatecnica->personati1 == $mesatecnica->personasup2 || $mesatecnica->personati1 == $mesatecnica->personasup3 || $mesatecnica->personati1 == $mesatecnica->personasup4):

							$this->datos_view['mensajes'] = 'La persona <b>'.$mesatecnica->personati1.'</b> se encuentra repetida.';

							elseif (!validarRequerido($mesatecnica->personati2_id, $error, '')): $this->datos_view['mensajes'] = 'Datos de la persona de Administración y Finanzas se encuentran vacios.</br>Debe seleccionar una Persona.';

							else:

								if ($mesatecnica->personati2 == $mesatecnica->personati1 || $mesatecnica->personati2 == $mesatecnica->personati3 || $mesatecnica->personati2 == $mesatecnica->personati4 || $mesatecnica->personati2 == $mesatecnica->personasup1 || $mesatecnica->personati2 == $mesatecnica->personasup2 || $mesatecnica->personati2 == $mesatecnica->personasup3 || $mesatecnica->personati2 == $mesatecnica->personasup4):

								$this->datos_view['mensajes'] = 'La persona <b>'.$mesatecnica->personati2.'</b> se encuentra repetida.';

								elseif (!validarRequerido($mesatecnica->personati3_id, $error, '')): $this->datos_view['mensajes'] = 'Datos de la persona de Contraloria Social se encuentran vacios.</br>Debe seleccionar una Persona.';

								else:

									if ($mesatecnica->personati3 == $mesatecnica->personati1 || $mesatecnica->personati3 == $mesatecnica->personati2 || $mesatecnica->personati3 == $mesatecnica->personati4 || $mesatecnica->personati3 == $mesatecnica->personasup1 || $mesatecnica->personati3 == $mesatecnica->personasup2 || $mesatecnica->personati3 == $mesatecnica->personasup3 || $mesatecnica->personati3 == $mesatecnica->personasup4):

									$this->datos_view['mensajes'] = 'La persona <b>'.$mesatecnica->personati3.'</b> se encuentra repetida.';

									elseif (!validarRequerido($mesatecnica->personati4_id, $error, '')): $this->datos_view['mensajes'] = 'Datos de la persona de Educación Ambiental se encuentran vacios.</br>Debe seleccionar una Persona.';

									else:

										if ($mesatecnica->personati4 == $mesatecnica->personati1 || $mesatecnica->personati4 == $mesatecnica->personati2 || $mesatecnica->personati4 == $mesatecnica->personati3 || $mesatecnica->personati4 == $mesatecnica->personasup1 || $mesatecnica->personati4 == $mesatecnica->personasup2 || $mesatecnica->personati4 == $mesatecnica->personasup3 || $mesatecnica->personati4 == $mesatecnica->personasup4):

										$this->datos_view['mensajes'] = 'La persona <b>'.$mesatecnica->personati4.'</b> se encuentra repetida.';

										else:

											if ($mesatecnica->personasup1 == $mesatecnica->personati1 || $mesatecnica->personasup1 == $mesatecnica->personati2 || $mesatecnica->personasup1 == $mesatecnica->personati3 || $mesatecnica->personasup1 == $mesatecnica->personati4 || $mesatecnica->personasup1 == $mesatecnica->personasup2 || $mesatecnica->personasup1 == $mesatecnica->personasup3 || $mesatecnica->personasup1 == $mesatecnica->personasup4):

											$this->datos_view['mensajes'] = 'La persona <b>'.$mesatecnica->personasup1.'</b> se encuentra repetida.';

											else:

												if ($mesatecnica->personasup2 == $mesatecnica->personati1 || $mesatecnica->personasup2 == $mesatecnica->personati2 || $mesatecnica->personasup2 == $mesatecnica->personati3 || $mesatecnica->personasup2 == $mesatecnica->personati4 || $mesatecnica->personasup2 == $mesatecnica->personasup1 || $mesatecnica->personasup2 == $mesatecnica->personasup3 || $mesatecnica->personasup2 == $mesatecnica->personasup4):

												$this->datos_view['mensajes'] = 'La persona <b>'.$mesatecnica->personasup2.'</b> se encuentra repetida.';

												else:

													if ($mesatecnica->personasup3 == $mesatecnica->personati1 || $mesatecnica->personasup3 == $mesatecnica->personati2 || $mesatecnica->personasup3 == $mesatecnica->personati3 || $mesatecnica->personasup3 == $mesatecnica->personati4 || $mesatecnica->personasup3 == $mesatecnica->personasup1 || $mesatecnica->personasup3 == $mesatecnica->personasup2 || $mesatecnica->personasup3 == $mesatecnica->personasup4):

													$this->datos_view['mensajes'] = 'La persona <b>'.$mesatecnica->personasup3.'</b> se encuentra repetida.';

													else:
														
														if ($mesatecnica->personasup4 == $mesatecnica->personati1 || $mesatecnica->personasup4 == $mesatecnica->personati2 || $mesatecnica->personasup4 == $mesatecnica->personati3 || $mesatecnica->personasup4 == $mesatecnica->personati4 || $mesatecnica->personasup4 == $mesatecnica->personasup1 || $mesatecnica->personasup4 == $mesatecnica->personasup2 || $mesatecnica->personasup4 == $mesatecnica->personasup3):

														$this->datos_view['mensajes'] = 'La persona <b>'.$mesatecnica->personasup4.'</b> se encuentra repetida.';

														elseif (!validarRequerido($mesatecnica->exp_mta, $error, 'Nº Expediente')): $this->datos_view['mensajes'] = $error;

														elseif (!validarPermitidosTodos($mesatecnica->observaciones, $error, '')): $this->datos_view['mensajes'] = $error;

														else:
														
															$mesatecnica->save();
															$mesatecnica->order_by('id', 'DESC')->limit(1)->get();
															$mesatecnica_id = $mesatecnica->id;

															$i = 0;
															foreach ($per as $id):

																$relacion->mesatecnica_id = $mesatecnica_id;
																$relacion->persona_id = $id;
																$relacion->sec = $i;

																$relacion->save();

																$i++;	

															endforeach;

															if($mesatecnica->id != Null):

																$this->url_view = $this->url_modulo.'/'.$this->url_menu.'/success';
																$result = 'TRUE';

															else:

																$this->datos_view['mensajes'] = mensajeFormularioError('Registrar');
																$result = 'FALSE';

															endif;

															//-----------------------------------Auditoria---------------------------------------

																$this->data = array('Mesatecnica Registrada:' => $mesatecnica->nom_mta);
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

					endif;	

				endif;	
		//------------------------------------------------------------------------------------------------------
		
		//---------------------------------Cargar Vistas-------------------------------------
		
			layout_all($this->titulo, $this->url_view, $this->datos_view , $this->view_menu, $this->datos_menu, $this->datos_crud);	 // Carga layouts.

		//-----------------------------------------------------------------------------------
		
	}	

	/**
	 * Metodo index Carga toda la vista principal Inicio
	 * url_base()/sic/sistema/configuracion/mesatecnica/buscar
	 */
	public function buscar() {

			$mesatecnica  = new Mesatecnica;
			$perfilmta_id = $this->session->userdata('perfilmta_id');

			$mesatecnica->include_related('consejocomunal', '*');
			$mesatecnica->where('est_cco', 'TRUE');
			$mesatecnica->include_related('municipio', '*');
			$mesatecnica->where('est_mun', 'TRUE');			
			$mesatecnica->include_related('municipio/perfilmta', '*');
			$mesatecnica->where('est_pmt', 'TRUE');
			$mesatecnica->where('permisomta', 'TRUE');
			$mesatecnica->where('perfilmta_id', $perfilmta_id);
			$mesatecnica->order_by('id', 'ASC')->get();

			$this->url_view   = $this->url_modulo.'/'.$this->url_menu.'/'.$this->url_crud;

			$this->datos_view = array('mesatecnicas' => $mesatecnica);

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
	 * url_base()/sic/sistema/configuracion/mesatecnica/modificar
	 */
	public function modificar($id = '') {

		if (!validarNullInt($id, $error, '')):

			redirect('mta/mesastecnicas/buscar');

		else:
			
			$mesatecnica = new Mesatecnica;
			$relacion = new Mesatecnicas_persona;

			$perfilmta_id = $this->session->userdata('perfilmta_id');

			if($id != null):

				//-----------------------------Buscar Get--------------------------

				$mesatecnica->include_related('persona', '*');
				$mesatecnica->where('est_prs', 'TRUE');
				$mesatecnica->order_by('sec', 'ASC');
				$mesatecnica->include_related('consejocomunal', '*');
				$mesatecnica->where('est_cco', 'TRUE');
				$mesatecnica->include_related('municipio', '*');
				$mesatecnica->where('est_mun', 'TRUE');
				$mesatecnica->include_related('estado', '*');
				$mesatecnica->where('est_est', 'TRUE');
				$mesatecnica->include_related('parroquia', '*');
				$mesatecnica->where('est_par', 'TRUE');	
				$mesatecnica->include_related('sector', '*');
				$mesatecnica->where('est_sec', 'TRUE');				
				$mesatecnica->include_related('municipio/perfilmta', '*');
				$mesatecnica->where('est_pmt', 'TRUE');
				$mesatecnica->where('permisomta', 'TRUE');
				$mesatecnica->where('perfilmta_id', $perfilmta_id);
				$mesatecnica->order_by('id', 'ASC')->get_by_id($id);

				$mesatecnicass = $mesatecnica->fecharestruct;

				$this->url_view   = $this->url_modulo.'/'.$this->url_menu.'/'.$this->url_crud;

				$this->datos_view = array('mesatecnicas' => $mesatecnica);

				//-----------------------------------------------------------------

			else:	

				$id = validarEntrada($this->input->post('id', TRUE));

				if($id == null):

					redirect('mta/mesastecnicas/buscar');

				endif;

				$mesatecnica->include_related('persona', '*');
				$mesatecnica->where('est_prs', 'TRUE');
				$mesatecnica->order_by('sec', 'ASC');
				$mesatecnica->include_related('consejocomunal', '*');
				$mesatecnica->where('est_cco', 'TRUE');
				$mesatecnica->include_related('municipio', '*');
				$mesatecnica->where('est_mun', 'TRUE');
				$mesatecnica->include_related('estado', '*');
				$mesatecnica->where('est_est', 'TRUE');
				$mesatecnica->include_related('parroquia', '*');
				$mesatecnica->where('est_par', 'TRUE');	
				$mesatecnica->include_related('sector', '*');
				$mesatecnica->where('est_sec', 'TRUE');				
				$mesatecnica->include_related('municipio/perfilmta', '*');
				$mesatecnica->where('est_pmt', 'TRUE');
				$mesatecnica->where('permisomta', 'TRUE');
				$mesatecnica->where('perfilmta_id', $perfilmta_id);
				$mesatecnica->order_by('id', 'ASC')->get_by_id($id);

				$mesatecnicass = $mesatecnica->fecharestruct;

				$this->url_view   = $this->url_modulo.'/'.$this->url_menu.'/'.$this->url_crud;

				$this->datos_view = array('mesatecnicas' => $mesatecnica);

		//---------------------------------Recivir Variables Post----------------------------

				$mesatecnica->consejocomunal_id = validarEntrada($this->input->post('consejocomunal_id', TRUE));
				if ($mesatecnica->consejocomunal_id == null): $mesatecnica->consejocomunal_id = 0; endif;
				$mesatecnica->tiporifmta      	= validarEntrada($this->input->post('tiporifmta', TRUE));
				$mesatecnica->rifmta            = validarEntrada($this->input->post('rifmta', TRUE));
				$mesatecnica->nom_mta	        = validarEntrada($this->input->post('nom_mta', TRUE));
				$mesatecnica->num_cuenta        = validarEntrada($this->input->post('num_cuenta', TRUE));
				$mesatecnica->fechaconform   	= validarEntrada($this->input->post('fechaconform', TRUE));
				$mesatecnica->fecharestruct  	= validarEntrada($this->input->post('fecharestruct', TRUE));
				$mesatecnica->personati1_id  	= validarEntrada($this->input->post('personati1_id', TRUE));
				$mesatecnica->personati2_id  	= validarEntrada($this->input->post('personati2_id', TRUE));
				$mesatecnica->personati3_id  	= validarEntrada($this->input->post('personati3_id', TRUE));
				$mesatecnica->personati4_id  	= validarEntrada($this->input->post('personati4_id', TRUE));
				$mesatecnica->personasup1_id 	= validarEntrada($this->input->post('personasup1_id', TRUE));
				$mesatecnica->personasup2_id 	= validarEntrada($this->input->post('personasup2_id', TRUE));
				$mesatecnica->personasup3_id 	= validarEntrada($this->input->post('personasup3_id', TRUE));
				$mesatecnica->personasup4_id 	= validarEntrada($this->input->post('personasup4_id', TRUE));
				$mesatecnica->personati1 	 	= validarEntrada($this->input->post('personati1', TRUE));
				$mesatecnica->personati2  		= validarEntrada($this->input->post('personati2', TRUE));
				$mesatecnica->personati3  		= validarEntrada($this->input->post('personati3', TRUE));
				$mesatecnica->personati4  		= validarEntrada($this->input->post('personati4', TRUE));
				$mesatecnica->personasup1 	 	= validarEntrada($this->input->post('personasup1', TRUE));
				if ($mesatecnica->personasup1   == 'NO  ASIGNADO'): $mesatecnica->personasup1 = 01; endif; 
				$mesatecnica->personasup2  		= validarEntrada($this->input->post('personasup2', TRUE));
				if ($mesatecnica->personasup2   == 'NO  ASIGNADO'): $mesatecnica->personasup2 = 02; endif; 
				$mesatecnica->personasup3  		= validarEntrada($this->input->post('personasup3', TRUE));
				if ($mesatecnica->personasup3   == 'NO  ASIGNADO'): $mesatecnica->personasup3 = 03; endif; 
				$mesatecnica->personasup4  		= validarEntrada($this->input->post('personasup4', TRUE));	
				if ($mesatecnica->personasup4   == 'NO  ASIGNADO'): $mesatecnica->personasup4 = 04; endif; 
				$mesatecnica->estado_id         = validarEntrada($this->input->post('estado_id', TRUE));
				$mesatecnica->municipio_id      = validarEntrada($this->input->post('municipio_id', TRUE));
				$mesatecnica->parroquia_id      = validarEntrada($this->input->post('parroquia_id', TRUE));
				$mesatecnica->sector_id         = validarEntrada($this->input->post('sector_id', TRUE));
				$mesatecnica->est_mes		 	= validarEntrada($this->input->post('est_mes', TRUE));
				$mesatecnica->observaciones  	= validarEntrada($this->input->post('observaciones', TRUE));

				$nombres     = explode(' ', ucwords(strtolower($this->session->userdata('nombres'))));
				$apellidos   = explode(' ', ucwords(strtolower($this->session->userdata('apellidos'))));

				$mesatecnica->registrado_por1  = $nombres[0].' '.$apellidos[0]; 
				$mesatecnica->registrado_por2  = $this->session->userdata('cedula');

				$per = array($mesatecnica->personati1_id, $mesatecnica->personati2_id, $mesatecnica->personati3_id, $mesatecnica->personati4_id, $mesatecnica->personasup1_id, $mesatecnica->personasup2_id, $mesatecnica->personasup3_id, $mesatecnica->personasup4_id);

		//-----------------------------------------------------------------------------------

		//------------------------//Inicio de Validaciones//---------------------------------

				if (!validarRequerido($mesatecnica->tiporifmta, $error, 'Tipo de Rif')): $this->datos_view['mensajes'] = 'Debe seleccionar el <b>Tipo de Rif</b>';

				elseif (!validarInt($mesatecnica->rifmta, 9, 9, $error, 'Rif')): $this->datos_view['mensajes'] = $error; 

				else:

					if (!validarNombresEspP($mesatecnica->nom_mta, 2, $error, 'Nombre M.T.A.')): $this->datos_view['mensajes'] = $error;

					elseif (!validarInt($mesatecnica->num_cuenta, 20, 20, $error, 'Número de Cuenta')): $this->datos_view['mensajes'] = $error; 

					elseif (!validarRequerido($mesatecnica->fechaconform, $error, 'Fecha de Conformación')): $this->datos_view['mensajes'] = $error;

					elseif (!validarRequerido($mesatecnica->personati1_id, $error, '')): $this->datos_view['mensajes'] = 'Datos de la persona de Agua Potable y Saneamiento se encuentran vacios.</br>Debe seleccionar una Persona.';

					else:

						if ($mesatecnica->personati1 == $mesatecnica->personati2 || $mesatecnica->personati1 == $mesatecnica->personati3 || $mesatecnica->personati1 == $mesatecnica->personati4 || $mesatecnica->personati1 == $mesatecnica->personasup1 || $mesatecnica->personati1 == $mesatecnica->personasup2 || $mesatecnica->personati1 == $mesatecnica->personasup3 || $mesatecnica->personati1 == $mesatecnica->personasup4):

						$this->datos_view['mensajes'] = 'La persona <b>'.$mesatecnica->personati1.'</b> se encuentra repetida.';

						elseif (!validarRequerido($mesatecnica->personati2_id, $error, '')): $this->datos_view['mensajes'] = 'Datos de la persona de Administración y Finanzas se encuentran vacios.</br>Debe seleccionar una Persona.';

						else:

							if ($mesatecnica->personati2 == $mesatecnica->personati1 || $mesatecnica->personati2 == $mesatecnica->personati3 || $mesatecnica->personati2 == $mesatecnica->personati4 || $mesatecnica->personati2 == $mesatecnica->personasup1 || $mesatecnica->personati2 == $mesatecnica->personasup2 || $mesatecnica->personati2 == $mesatecnica->personasup3 || $mesatecnica->personati2 == $mesatecnica->personasup4):

							$this->datos_view['mensajes'] = 'La persona <b>'.$mesatecnica->personati2.'</b> se encuentra repetida.';

							elseif (!validarRequerido($mesatecnica->personati3_id, $error, '')): $this->datos_view['mensajes'] = 'Datos de la persona de Contraloria Social se encuentran vacios.</br>Debe seleccionar una Persona.';

							else:

								if ($mesatecnica->personati3 == $mesatecnica->personati1 || $mesatecnica->personati3 == $mesatecnica->personati2 || $mesatecnica->personati3 == $mesatecnica->personati4 || $mesatecnica->personati3 == $mesatecnica->personasup1 || $mesatecnica->personati3 == $mesatecnica->personasup2 || $mesatecnica->personati3 == $mesatecnica->personasup3 || $mesatecnica->personati3 == $mesatecnica->personasup4):

								$this->datos_view['mensajes'] = 'La persona <b>'.$mesatecnica->personati3.'</b> se encuentra repetida.';

								elseif (!validarRequerido($mesatecnica->personati4_id, $error, '')): $this->datos_view['mensajes'] = 'Datos de la persona de Educación Ambiental se encuentran vacios.</br>Debe seleccionar una Persona.';

								else:

									if ($mesatecnica->personati4 == $mesatecnica->personati1 || $mesatecnica->personati4 == $mesatecnica->personati2 || $mesatecnica->personati4 == $mesatecnica->personati3 || $mesatecnica->personati4 == $mesatecnica->personasup1 || $mesatecnica->personati4 == $mesatecnica->personasup2 || $mesatecnica->personati4 == $mesatecnica->personasup3 || $mesatecnica->personati4 == $mesatecnica->personasup4):

									$this->datos_view['mensajes'] = 'La persona <b>'.$mesatecnica->personati4.'</b> se encuentra repetida.';

									else:

										if ($mesatecnica->personasup1 == $mesatecnica->personati1 || $mesatecnica->personasup1 == $mesatecnica->personati2 || $mesatecnica->personasup1 == $mesatecnica->personati3 || $mesatecnica->personasup1 == $mesatecnica->personati4 || $mesatecnica->personasup1 == $mesatecnica->personasup2 || $mesatecnica->personasup1 == $mesatecnica->personasup3 || $mesatecnica->personasup1 == $mesatecnica->personasup4):

										$this->datos_view['mensajes'] = 'La persona <b>'.$mesatecnica->personasup1.'</b> se encuentra repetida.';

										else:

											if ($mesatecnica->personasup2 == $mesatecnica->personati1 || $mesatecnica->personasup2 == $mesatecnica->personati2 || $mesatecnica->personasup2 == $mesatecnica->personati3 || $mesatecnica->personasup2 == $mesatecnica->personati4 || $mesatecnica->personasup2 == $mesatecnica->personasup1 || $mesatecnica->personasup2 == $mesatecnica->personasup3 || $mesatecnica->personasup2 == $mesatecnica->personasup4):

											$this->datos_view['mensajes'] = 'La persona <b>'.$mesatecnica->personasup2.'</b> se encuentra repetida.';

											else:

												if ($mesatecnica->personasup3 == $mesatecnica->personati1 || $mesatecnica->personasup3 == $mesatecnica->personati2 || $mesatecnica->personasup3 == $mesatecnica->personati3 || $mesatecnica->personasup3 == $mesatecnica->personati4 || $mesatecnica->personasup3 == $mesatecnica->personasup1 || $mesatecnica->personasup3 == $mesatecnica->personasup2 || $mesatecnica->personasup3 == $mesatecnica->personasup4):

												$this->datos_view['mensajes'] = 'La persona <b>'.$mesatecnica->personasup3.'</b> se encuentra repetida.';

												else:
													
													if ($mesatecnica->personasup4 == $mesatecnica->personati1 || $mesatecnica->personasup4 == $mesatecnica->personati2 || $mesatecnica->personasup4 == $mesatecnica->personati3 || $mesatecnica->personasup4 == $mesatecnica->personati4 || $mesatecnica->personasup4 == $mesatecnica->personasup1 || $mesatecnica->personasup4 == $mesatecnica->personasup2 || $mesatecnica->personasup4 == $mesatecnica->personasup3):

													$this->datos_view['mensajes'] = 'La persona <b>'.$mesatecnica->personasup4.'</b> se encuentra repetida.';

													elseif (!validarPermitidosTodos($mesatecnica->observaciones, $error, '')): $this->datos_view['mensajes'] = $error;

													else:

														$relacion->order_by('sec', 'ASC')->get_by_mesatecnica_id($id);

														$i = 0;
														foreach($relacion as $row):

															$relacion->where('id_mes_prs', $row->id_mes_prs);
															$relacion->update('persona_id', $per[$i]);

														$i++;
														endforeach;	


														if($mesatecnica->save()):

															if($mesatecnica->fecharestruct != null && $mesatecnica->fecharestruct != $mesatecnicass):

																$mta_xvencer = new Mta_xvencer;
																if($mta_xvencer->get_by_mesatecnica_id($id) != null):

																	$mta_xvencer->delete();

																endif;	

															endif;	

															$this->url_view = $this->url_modulo.'/'.$this->url_menu.'/successact';
															$result = 'TRUE';

														else:

															$this->datos_view['mensajes'] = mensajeFormularioError('Modificar');
															$result = 'FALSE';

														endif;

														//-----------------------------------Auditoria---------------------------------------

															$this->data = array('Mesatecnica Modificada:' => $mesatecnica->nom_mta);
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

				endif;		

			endif;	
		//---------------------------------Cargar Vistas-------------------------------------
		
			layout_all($this->titulo, $this->url_view, $this->datos_view, $this->view_menu, $this->datos_menu, $this->datos_crud);	 // Carga layouts.

		//-----------------------------------------------------------------------------------

		endif;	
		
	}

	/**
	 * Metodo index Carga toda la vista principal Inicio
	 * url_base()/sic/sistema/configuracion/mesatecnica/eliminar
	 */
	public function eliminar($id = '') {

		if (!validarInt($id, 1, 15, $error, '')):

			redirect('mta/mesastecnicas/buscar');

		else:	

			$mesatecnica = new Mesatecnica;
			$proyect     = new Proyect;
			$reunion     = new Reunion;
			$relacion    = new Mesatecnicas_persona;

			$this->datos_view = null;			

			$proyect->get_by_mesatecnica_id($id);
			$reunion->get_by_mesatecnica_id($id);
			$relacion->get_by_mesatecnica_id($id);
			$mesatecnica->get_by_id($id);

			$ccomunale  = $mesatecnica->consejocomunal_id;
			$nombrese   = $mesatecnica->mesastecnica;

			if ($proyect->nom_proyect != Null):

				$proyect->delete_all();

			endif;

			if ($reunion->objetivo != Null):

				$reunion->delete_all();

			endif;

			if ($relacion->mesatecnica_id != Null):

				$relacion->delete_all();

			endif;

			if ($mesatecnica->delete()):

				$this->url_view = $this->url_modulo.'/'.$this->url_menu.'/successeli';
				$result = 'TRUE';

			else:

				$this->datos_view['mensajes'] = mensajeFormularioError('Eliminar');
				$result = 'FALSE';

			endif;	

		endif;	

		//-----------------------------------Auditoria---------------------------------------

				$this->data = array(
									'Codigo cc:' => $ccomunale,
									'Nombre M.T.A. Eliminada' => $nombrese
									);

				$this->audit->register($result, $this->data); 

		//-----------------------------------------------------------------------------------	

		//---------------------------------Cargar Vistas-------------------------------------
		
			layout_all($this->titulo, $this->url_view, $this->datos_view, $this->view_menu, $this->datos_menu, $this->datos_crud);	 // Carga layouts.

		//-----------------------------------------------------------------------------------
		
	}

}

/* End of file mesastecnicas.php */
/* Location: ./application/controller/configuracion/mesastecnicas.php */