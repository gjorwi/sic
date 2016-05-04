<?php defined ('BASEPATH') OR exit ('No direct script access allowed');

/**
 * Class Menuprincipal
 */
class Menuprincipal extends CI_Controller {

	//Variables
	private $data;
	private $class;
	private $url;

	/**
	 * Metodo construct para caragar modelos, helpers librerias y validacion de sesion.
	 */
	public function __construct() {

		parent::__construct();

			$this->data = array();
			$this->url  = $this->uri->segment(1);
			$this->load->helper('layout');    					 // Carga helper para validar los formularios. // Carga helper para cargar las vistas.

	}

	/**
	 * Metodo index Carga toda la vista principal Menuprincipal.
	 * url_base()/sic/sistema/menuprincipal
	 */
	public function index() {

		//--------------------------Cargar variables del Metodo------------------------------ 	
		
			$titulo = 'Menu Principal';
			$accion = 'ACCESO';

		///--------------------------------------------

			$array = array_unique($this->session->userdata('modulos'));

			foreach ($array as $value):
				
				$result[] = $value;

			endforeach;


		//-------------------------------JQuery----------------------------------------------	

			$this->data['json'] = json_encode($result);
				
		//-----------------------------------------------------------------------------------

		//-----------------------------------Auditoria---------------------------------------

		//---------------------------------Fin Auditoria-------------------------------------

		//---------------------------------Cargar Vistas-------------------------------------	
  
			layout_views($titulo, $this->url, $this->data); //Carga layout				 				       	     // Carga vista footer.

		//-----------------------------------------------------------------------------------

	}	

}

/* End of file Menuprincipal.php */
/* Location: ./application/controller/Menuprincipal.php */