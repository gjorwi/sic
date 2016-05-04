<?php defined ('BASEPATH') OR exit ('No direct script access allowed');

/**
 * Class Empresas
 */
class Empresas extends CI_Controller {

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
	 * url_base()/sic/sistema/configuracion/empresa/registrar
	 */
	public function registrar() {

		//--------------------------Cargar variables del Metodo------------------------------ 
			$empresa  = new Empresa;
			$empresaa = new Empresa;

			$this->datos_view = null;

		//---------------------------------Recivir Variables Post----------------------------

			$empresa->tiporif       = validarEntrada($this->input->post('tiporif', TRUE));
			$empresa->rif           = validarEntrada($this->input->post('rif', TRUE));
			$empresa->razon         = validarEntrada($this->input->post('razon', TRUE));
			$empresa->correo        = validarEntrada($this->input->post('correo', TRUE));
			$empresa->telefonoh     = validarEntrada($this->input->post('telefonoh', TRUE));
			$empresa->telefonom     = validarEntrada($this->input->post('telefonom', TRUE));
			$empresa->fax           = validarEntrada($this->input->post('fax', TRUE));
			$empresa->direccion     = validarEntrada($this->input->post('direccion', TRUE));
			$empresa->tipo          = validarEntrada($this->input->post('tipo', TRUE));
			$empresa->observaciones = validarEntrada($this->input->post('observaciones', TRUE));
			$empresa->est_emp       = validarEntrada($this->input->post('est_emp', TRUE));

		//-----------------------------------------------------------------------------------

		//------------------------//Inicio de Validaciones//---------------------------------

			if (!validarRequerido($empresa->tiporif, $error, 'Tipo de Rif')): $this->datos_view['mensajes'] = 'Debe seleccionar el <b>Tipo de Rif</b>';

			elseif (!validarInt($empresa->rif, 9, 9, $error, 'Rif')): $this->datos_view['mensajes'] = $error; 

			else:

				$empresaa->get_by_rif($empresa->rif);
			
				if($empresaa->rif != Null && $empresaa->tiporif == $empresa->tiporif): $this->datos_view['mensajes'] = 'Esta empresa ya se encuentra <b>Registrada</b>';

				elseif (!validarNombresEspP($empresa->razon , 2, $error, 'Razon')): $this->datos_view['mensajes'] = $error;

				elseif (!validarFax($empresa->fax, $error, 'Fax')): $this->datos_view['mensajes'] = $error;

				elseif (!validarInt($empresa->tipo, 1, 2, $error, 'Tipo')): $this->datos_view['mensajes'] = $error;
				
				elseif (!validarEmail($empresa->correo, $error, 'Correo')): $this->datos_view['mensajes'] = $error;
				
				elseif (!validarTelefono($empresa->telefonoh, $error, 'Teléfono de Habitación')): $this->datos_view['mensajes'] = $error;
				
				elseif (!validarTelefono($empresa->telefonom, $error, 'Teléfono Movil')): $this->datos_view['mensajes'] = $error;

				elseif (!validarRequerido($empresa->direccion, $error, 'Dirección')): $this->datos_view['mensajes'] = $error;

				elseif (!validarPermitidosTodos($empresa->direccion, $error, 'Dirección')): $this->datos_view['mensajes'] = $error;

				elseif (!validarPermitidosTodos($empresa->observaciones, $error, 'Dirección')): $this->datos_view['mensajes'] = $error;

				else:

					if($empresa->save()):

						$this->url_view = $this->url_modulo.'/'.$this->url_menu.'/success';
						$result = 'TRUE';

					else:

						$this->datos_view['mensajes'] = mensajeFormularioError('Registrar');
						$result = 'FALSE';

					endif;

					//-----------------------------------Auditoria---------------------------------------

						$this->data = array(
											'Empresa Registrada:' => $empresa->razon,
											'Rif' => $empresa->rif
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
	 * url_base()/sic/sistema/configuracion/empresa/buscar
	 */
	public function buscar() {

			$empresa = new empresa;

			$empresa->order_by('rif', 'ASC')->get();

			$this->url_view    = $this->url_modulo.'/'.$this->url_menu.'/'.$this->url_crud;

			$this->datos_view  = array('empresas' => $empresa);

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
	 * url_base()/sic/sistema/configuracion/empresa/modificar
	 */
	public function modificar($id = '') {

		if (!validarNullInt($id, $error, '')):

			redirect('configuracion/empresas/buscar');

		else:
			
			$empresa = new empresa;

			if($id != null):

				//-----------------------------Buscar Get--------------------------

				$empresa->get_by_id($id);

				$this->url_view    = $this->url_modulo.'/'.$this->url_menu.'/'.$this->url_crud;

				$this->datos_view  = array('empresas' => $empresa);

				//-----------------------------------------------------------------

			else:	

				$id = validarEntrada($this->input->post('id', TRUE));

				if($id == null):

					redirect('configuracion/empresas/buscar');

				endif;

				$empresa->get_by_id($id);

				$this->url_view    = $this->url_modulo.'/'.$this->url_menu.'/'.$this->url_crud;

				$this->datos_view  = array('empresas' => $empresa);

		//---------------------------------Recivir Variables Post----------------------------

				$empresa->tiporif       = validarEntrada($this->input->post('tiporif', TRUE));
				$empresa->rif           = validarEntrada($this->input->post('rif', TRUE));
				$empresa->razon         = validarEntrada($this->input->post('razon', TRUE));
				$empresa->correo        = validarEntrada($this->input->post('correo', TRUE));
				$empresa->telefonoh     = validarEntrada($this->input->post('telefonoh', TRUE));
				$empresa->telefonom     = validarEntrada($this->input->post('telefonom', TRUE));
				$empresa->fax           = validarEntrada($this->input->post('fax', TRUE));
				$empresa->direccion     = validarEntrada($this->input->post('direccion', TRUE));
				$empresa->tipo          = validarEntrada($this->input->post('tipo', TRUE));
				$empresa->observaciones = validarEntrada($this->input->post('observaciones', TRUE));
				$empresa->est_emp       = validarEntrada($this->input->post('est_emp', TRUE));


			//-----------------------------------------------------------------------------------

			//------------------------//Inicio de Validaciones//---------------------------------

				if (!validarRequerido($empresa->tiporif, $error, 'Tipo de Rif')): $this->datos_view['mensajes'] = $error;

				elseif (!validarInt($empresa->rif, 9, 9, $error, 'Rif')): $this->datos_view['mensajes'] = $error; 

				else:

					if (!validarNombresEspP($empresa->razon , 2, $error, 'Razon')): $this->datos_view['mensajes'] = $error;
					
					elseif (!validarFax($empresa->fax, $error, 'Fax')): $this->datos_view['mensajes'] = $error;

					elseif (!validarInt($empresa->tipo, 1, 2, $error, 'Tipo')): $this->datos_view['mensajes'] = $error;
					
					elseif (!validarEmail($empresa->correo, $error, 'Correo')): $this->datos_view['mensajes'] = $error;
					
					elseif (!validarTelefono($empresa->telefonoh, $error, 'Teléfono de Habitación')): $this->datos_view['mensajes'] = $error;
					
					elseif (!validarTelefono($empresa->telefonom, $error, 'Teléfono Movil')): $this->datos_view['mensajes'] = $error;

					elseif (!validarRequerido($empresa->direccion, $error, 'Dirección')): $this->datos_view['mensajes'] = $error;

					elseif (!validarPermitidosTodos($empresa->direccion, $error, 'Dirección')): $this->datos_view['mensajes'] = $error;

					elseif (!validarPermitidosTodos($empresa->observaciones, $error, 'Dirección')): $this->datos_view['mensajes'] = $error;

					else:

						if($empresa->save()):

							$this->url_view = $this->url_modulo.'/'.$this->url_menu.'/successact';
							$result = 'TRUE';

						else:

							$this->datos_view['mensajes'] = mensajeFormularioError('Modificar');
							$result = 'FALSE';

						endif;

						//-----------------------------------Auditoria---------------------------------------

							$this->data = array(
												'Empresa Modificada:' => $empresa->rif,
												'Nombre:' => $empresa->razon
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
	 * url_base()/sic/sistema/configuracion/empresa/eliminar
	 */
	public function eliminar($id = '') {

		if (!validarInt($id, 1, 15, $error, '')):

			redirect('configuracion/empresas/buscar');

		else:	

			$empresa = new Empresa;

			$this->datos_view = null;

			$empresa->get_by_id($id);

			$tiporife = $empresa->tiporif;
			$rife     = $empresa->rif;
			$nombrese = $empresa->razon;

			if ($empresa->delete()):

				$this->url_view = $this->url_modulo.'/'.$this->url_menu.'/successeli';
				$result = 'TRUE';

			else:

				$this->datos_view['mensajes'] = mensajeFormularioError('Eliminar');
				$result = 'FALSE';

			endif;	

		endif;	

		//-----------------------------------Auditoria---------------------------------------

				$this->data = array(
									'Tipo rif:' => $tiporife,
									'Empresa Eliminada:' => $rife,
									'Nombre:' => $nombrese
									);

				$this->audit->register($result, $this->data); 

		//-----------------------------------------------------------------------------------	

		//---------------------------------Cargar Vistas-------------------------------------
		
			layout_all($this->titulo, $this->url_view, $this->datos_view, $this->view_menu, $this->datos_menu, $this->datos_crud);	 // Carga layouts.

		//-----------------------------------------------------------------------------------
		
	}

}

/* End of file Empresas.php */
/* Location: ./application/controller/configuracion/empresas.php */