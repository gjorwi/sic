<?php defined ('BASEPATH') OR exit ('No direct script access allowed');

/**
 * Class embalse
 */
class Embalses extends CI_Controller {

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
	 * url_base()/sic/sistema/configuracion/embalse/registrar
	 */
	public function registrar() {

		//--------------------------Cargar variables del Metodo------------------------------ 
			$embalse  = new Embalse;
			$embalsee = new Embalse;

			$this->datos_view = null;

		//---------------------------------Recivir Variables Post----------------------------

			$embalse->utme          = validarEntrada($this->input->post('utme', TRUE));
			$embalse->utmn          = validarEntrada($this->input->post('utmn', TRUE));
			$embalse->nom_emb       = validarEntrada($this->input->post('nom_emb', TRUE));
			//$embalse->manantial     = validarEntrada($this->input->post('manantial', TRUE));
			$embalse->estado_id     = validarEntrada($this->input->post('estado_id', TRUE));
			$embalse->municipio_id  = validarEntrada($this->input->post('municipio_id', TRUE));
			$embalse->parroquia_id  = validarEntrada($this->input->post('parroquia_id', TRUE));
			$embalse->cronologia    = validarEntrada($this->input->post('cronologia', TRUE));
			$embalse->cotamaxima    = validarEntrada($this->input->post('cotamaxima', TRUE));
			$embalse->cotanormal    = validarEntrada($this->input->post('cotanormal', TRUE));
			$embalse->cotavolmuerto = validarEntrada($this->input->post('cotavolmuerto', TRUE));
			$embalse->volmaximo     = validarEntrada($this->input->post('volmaximo', TRUE));
			$embalse->volnormal     = validarEntrada($this->input->post('volnormal', TRUE));
			$embalse->volmuerto     = validarEntrada($this->input->post('volmuerto', TRUE));
			$embalse->volutil       = validarEntrada($this->input->post('volutil', TRUE));
			$embalse->caudal        = validarEntrada($this->input->post('caudal', TRUE));
			$embalse->fecha         = validarEntrada($this->input->post('fecha', TRUE));
			$embalse->emb_est       = validarEntrada($this->input->post('emb_est', TRUE));


		//------------------------//Inicio de Validaciones//---------------------------------

			if (!validarSoloNumerosDecimalesN($embalse->utme, $error, 'UTM-E')): $this->datos_view['mensajes'] = $error;

			elseif (!validarSoloNumerosDecimalesN($embalse->utmn, $error, 'UTM-N')): $this->datos_view['mensajes'] = $error;

			elseif (!validarNombresEspP($embalse->nom_emb, 2, $error, 'Nombre del Embalse')): $this->datos_view['mensajes'] = $error;

			else:

				$embalsee->get_by_nom_emb($embalse->nom_emb);

				if ($embalsee->nom_emb != Null): $this->datos_view['mensajes'] = 'EL <b>Nombre del Embalse</b> ya se ecuentra Registrado.';

				elseif (!validarRequerido($embalse->estado_id, $error, '')): $this->datos_view['mensajes'] = 'Datos del Estado se encuentran vacios.</br> Debe seleccionar un Estado.';

				elseif (!validarRequerido($embalse->municipio_id, $error, '')): $this->datos_view['mensajes'] = 'Datos del Municipio se encuentran vacios.</br> Debe seleccionar un Municipio.';

				elseif (!validarRequerido($embalse->parroquia_id, $error, '')): $this->datos_view['mensajes'] = 'Datos del la Parroquia se encuentran vacios.</br> Debe seleccionar una Parroquia.';

				elseif (!validarSoloNumerosDecimalesN($embalse->cronologia, $error, 'Cronologia')): $this->datos_view['mensajes'] = $error;

				elseif (!validarSoloNumerosDecimalesN($embalse->cotamaxima, $error, 'Cronologia')): $this->datos_view['mensajes'] = $error;

				elseif (!validarSoloNumerosDecimalesN($embalse->cotanormal, $error, 'Cronologia')): $this->datos_view['mensajes'] = $error;

				elseif (!validarSoloNumerosDecimalesN($embalse->cotavolmuerto, $error, 'Cronologia')): $this->datos_view['mensajes'] = $error;

				elseif (!validarSoloNumerosDecimalesN($embalse->volmaximo, $error, 'Cronologia')): $this->datos_view['mensajes'] = $error;

				elseif (!validarSoloNumerosDecimalesN($embalse->volnormal, $error, 'Cronologia')): $this->datos_view['mensajes'] = $error;

				elseif (!validarSoloNumerosDecimalesN($embalse->volmuerto, $error, 'Cronologia')): $this->datos_view['mensajes'] = $error;

				elseif (!validarSoloNumerosDecimalesN($embalse->volutil, $error, 'Cronologia')): $this->datos_view['mensajes'] = $error;

				elseif (!validarRequerido($embalse->caudal, $error, 'Caudal')): $this->datos_view['mensajes'] = $error;

				elseif (!validarPermitidosTodos($embalse->caudal, $error, 'Caudal')): $this->datos_view['mensajes'] = $error;

				elseif (!validarRequerido($embalse->fecha, $error, 'Fecha')): $this->datos_view['mensajes'] = $error;

				else:

					if($embalse->save()):

						$this->url_view = $this->url_modulo.'/'.$this->url_menu.'/success';
						$result = 'TRUE';

					else:

						$this->datos_view['mensajes'] = mensajeFormularioError('Registrar');
						$result = 'FALSE';

					endif;

					//-----------------------------------Auditoria---------------------------------------

								$this->data = array(
													'Embalse Registado:' => $embalse->nom_emb,
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
	 * url_base()/sic/sistema/configuracion/embalse/buscar
	 */
	public function buscar() {

			$embalse = new Embalse;

			$embalse->include_related('estado', '*');
			$embalse->include_related('municipio', '*');
			$embalse->include_related('parroquia', '*');
			$embalse->where('id >', '0');
			$embalse->order_by('id', 'ASC');
			$embalse->get();

			$this->url_view   = $this->url_modulo.'/'.$this->url_menu.'/'.$this->url_crud;

			$this->datos_view = array('embalses' => $embalse);

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
	 * url_base()/sic/sistema/configuracion/embalse/modificar
	 */
	public function modificar($id = '') {

		if (!validarNullInt($id, $error, '')):

			redirect('seguridad/embalses/buscar');

		else:
			
			$embalse = new Embalse;

			if($id != null):

				//-----------------------------Buscar Get--------------------------

				$embalse->include_related('estado', '*');
				$embalse->include_related('municipio', '*');
				$embalse->include_related('parroquia', '*');
				$embalse->where('id >', '0');
				$embalse->order_by('id', 'ASC');
				$embalse->get();


				$this->url_view    = $this->url_modulo.'/'.$this->url_menu.'/'.$this->url_crud;

				$this->datos_view  = array(
											'embalses' => $embalse
										  );

				//-----------------------------------------------------------------

			else:	

				$id = validarEntrada($this->input->post('id', TRUE));

				if($id == null):

					redirect('seguridad/embalses/buscar');

				endif;

				$embalse->include_related('estado', '*');
				$embalse->include_related('municipio', '*');
				$embalse->include_related('parroquia', '*');
				$embalse->where('id >', '0');
				$embalse->order_by('id', 'ASC');
				$embalse->get();

			//-----------------------------------------------------------------------------------

				$this->url_view   = $this->url_modulo.'/'.$this->url_menu.'/'.$this->url_crud;

				$this->datos_view  = array(
											'embalses' => $embalse,
										  );

			//---------------------------------Recivir Variables Post----------------------------

				$embalse->utme          = validarEntrada($this->input->post('utme', TRUE));
				$embalse->utmn          = validarEntrada($this->input->post('utmn', TRUE));
				$embalse->nom_emb       = validarEntrada($this->input->post('nom_emb', TRUE));
				//$embalse->manantial     = validarEntrada($this->input->post('manantial', TRUE));
				$embalse->estado_id     = validarEntrada($this->input->post('estado_id', TRUE));
				$embalse->municipio_id  = validarEntrada($this->input->post('municipio_id', TRUE));
				$embalse->parroquia_id  = validarEntrada($this->input->post('parroquia_id', TRUE));
				$embalse->cronologia    = validarEntrada($this->input->post('cronologia', TRUE));
				$embalse->cotamaxima    = validarEntrada($this->input->post('cotamaxima', TRUE));
				$embalse->cotanormal    = validarEntrada($this->input->post('cotanormal', TRUE));
				$embalse->cotavolmuerto = validarEntrada($this->input->post('cotavolmuerto', TRUE));
				$embalse->volmaximo     = validarEntrada($this->input->post('volmaximo', TRUE));
				$embalse->volnormal     = validarEntrada($this->input->post('volnormal', TRUE));
				$embalse->volmuerto     = validarEntrada($this->input->post('volmuerto', TRUE));
				$embalse->volutil       = validarEntrada($this->input->post('volutil', TRUE));
				$embalse->caudal        = validarEntrada($this->input->post('caudal', TRUE));
				$embalse->fecha         = validarEntrada($this->input->post('fecha', TRUE));
				$embalse->emb_est       = validarEntrada($this->input->post('emb_est', TRUE));

			//-----------------------------------------------------------------------------------

			//------------------------//Inicio de Validaciones//---------------------------------

				if (!validarSoloNumerosDecimalesN($embalse->utme, $error, 'UTM-E')): $this->datos_view['mensajes'] = $error;

				elseif (!validarSoloNumerosDecimalesN($embalse->utmn, $error, 'UTM-N')): $this->datos_view['mensajes'] = $error;

				elseif (!validarNombresEspP($embalse->nom_emb, 2, $error, 'Nombre del Embalse')): $this->datos_view['mensajes'] = $error;

				else:

					if (!validarRequerido($embalse->estado_id, $error, '')): $this->datos_view['mensajes'] = 'Datos del Estado se encuentran vacios.</br> Debe seleccionar un Estado.';

					elseif (!validarRequerido($embalse->municipio_id, $error, '')): $this->datos_view['mensajes'] = 'Datos del Municipio se encuentran vacios.</br> Debe seleccionar un Municipio.';

					elseif (!validarRequerido($embalse->parroquia_id, $error, '')): $this->datos_view['mensajes'] = 'Datos del la Parroquia se encuentran vacios.</br> Debe seleccionar una Parroquia.';

					elseif (!validarSoloNumerosDecimalesN($embalse->cronologia, $error, 'Cronologia')): $this->datos_view['mensajes'] = $error;

					elseif (!validarSoloNumerosDecimalesN($embalse->cotamaxima, $error, 'Cronologia')): $this->datos_view['mensajes'] = $error;

					elseif (!validarSoloNumerosDecimalesN($embalse->cotanormal, $error, 'Cronologia')): $this->datos_view['mensajes'] = $error;

					elseif (!validarSoloNumerosDecimalesN($embalse->cotavolmuerto, $error, 'Cronologia')): $this->datos_view['mensajes'] = $error;

					elseif (!validarSoloNumerosDecimalesN($embalse->volmaximo, $error, 'Cronologia')): $this->datos_view['mensajes'] = $error;

					elseif (!validarSoloNumerosDecimalesN($embalse->volnormal, $error, 'Cronologia')): $this->datos_view['mensajes'] = $error;

					elseif (!validarSoloNumerosDecimalesN($embalse->volmuerto, $error, 'Cronologia')): $this->datos_view['mensajes'] = $error;

					elseif (!validarSoloNumerosDecimalesN($embalse->volutil, $error, 'Cronologia')): $this->datos_view['mensajes'] = $error;

					elseif (!validarRequerido($embalse->caudal, $error, 'Caudal')): $this->datos_view['mensajes'] = $error;

					elseif (!validarPermitidosTodos($embalse->caudal, $error, 'Caudal')): $this->datos_view['mensajes'] = $error;

					elseif (!validarRequerido($embalse->fecha, $error, 'Fecha')): $this->datos_view['mensajes'] = $error;

					else:

						if($embalse->save()):

							$this->url_view = $this->url_modulo.'/'.$this->url_menu.'/successact';
							$result = 'TRUE';

						else:

							$this->datos_view['mensajes'] = mensajeFormularioError('Modificar');
							$result = 'FALSE';

						endif;

						//-----------------------------------Auditoria---------------------------------------

							$this->data = array('Embalse Modificado:' => $embalse->nom_emb);
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
	 * url_base()/sic/sistema/configuracion/embalse/eliminar
	 */
	public function eliminar($id = '') {

			$embalse = new Embalse;

			$this->url_view   = $this->url_modulo.'/'.$this->url_crud;

			$this->datos_view = null;

			$embalse->get_by_id($id);

			$embalsee = $embalse->nom_emb;

			if ($embalse->delete()):

				$this->url_view = $this->url_modulo.'/'.$this->url_menu.'/successeli';
				$result = 'TRUE';

			else:

				$this->datos_view['mensajes'] = mensajeFormularioError('Eliminar');
				$result = 'FALSE';

			endif;	

		//-----------------------------------Auditoria---------------------------------------

				$this->data = array(
									'Embalse Eliminado:' => $embalsee
 									); 
				
				$this->audit->register($result, $this->data);

		//-----------------------------------------------------------------------------------	

		//---------------------------------Cargar Vistas-------------------------------------
		
			layout_all($this->titulo, $this->url_view, $this->datos_view, $this->view_menu, $this->datos_menu, $this->datos_crud);	 // Carga layouts.

		//-----------------------------------------------------------------------------------
		
	}

}

/* End of file embalses.php */
/* Location: ./application/controller/configuracion/embalses.php */