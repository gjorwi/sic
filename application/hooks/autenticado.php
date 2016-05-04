<?php if (!defined( 'BASEPATH')) exit('No direct script access allowed'); 

/**
 * class Autenticado
 */
class Autenticado {

	private $ci;
	private $class_on;
	private $metodos_on;
	private $metodos_off;
	private $data;


	/**
	 * [__construct]
	 */
	public function __construct() {

		 $this->ci 			  =& get_instance();
		 $this->modulos_on    = array('menuprincipal','logout', 'jquery');
		 $this->menus_on      = array('inicio');
		 $this->metodos_off   = array();
		 $this->data          = array();

		$this->modulos = $this->ci->uri->segment(1);

	}

	/**
	 * [check_login]
	 * @return [url] [redirect 'Menuprincipals']
	 */
	public function check_login() {

		$modulos = $this->ci->uri->segment(1);

		$method  = $this->ci->router->method;

		$session = $this->ci->session->userdata('autenticado');

		//---------------PERMISOS MODULOS-------------------------

		if (!empty($session)):	

			$result = $this->modulos_on;	

			$array = array_unique($this->ci->session->userdata('modulos'));

				foreach ($array as $value):
					
					$result[] = $value;

				endforeach;	

			if (!in_array($modulos, $result)): 

				   redirect('menuprincipal');

			endif;

		endif;	

		//---------------PERMISOS MENUS-----------------------------
		/*
		if (!empty($session)):	

			if($this->ci->session->userdata($modulos) != Null):

			$result = $this->menus_on;	

			$array = array_unique($this->ci->session->userdata($modulos));

				foreach ($array as $value):
					
					$result[] = $value;

				endforeach;

				if (!in_array($method, $result)): 

						redirect();

				endif;

			endif;

		endif;
		*/
	}	

}

/*
/end hooks/Autenticado.php
*/