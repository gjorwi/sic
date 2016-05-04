<?php defined ('BASEPATH') OR exit ('No direct script access allowed');

/**
 * Class Inicio
 */
class Logout extends CI_Controller {

	private $data;

	/**
	 * [__construct]
	 */
	public function __construct() {

		parent::__construct();

		$this->data = array();

	}

	/**
	 * [Cerrar sesion]
	 * @return [url] [al inicio login]
	 */
	public function index() {

		$usuario = new Usuario;

		$usuario_id = $this->session->userdata('usuario_id');

		if ($usuario_id != Null):

			$usuario->get_by_id($usuario_id);

			$usuario->ult_acc = date('Y-m-d H:i:s');
			$usuario->save();

			$this->data = array('Cerrar Sesion');

			//-----------------------------------Auditoria--------------------------------
				
				$this->audit->register('TRUE', $this->data);         // Guardando datos Auditoria

			//---------------------------------Fin Auditoria--------------------------------	

			$this->session->sess_destroy();

		endif;
		
		redirect();

	}

}

/* End of file Logout.php */
/* Location: ./application/controller/Logout.php */