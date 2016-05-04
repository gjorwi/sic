<?php if (!defined( 'BASEPATH')) exit('No direct script access allowed'); 

/**
 * class Noautenticados
 */
class Noautenticados {

	private $ci;
	private $controladores;
	private $metodos;
	private $metodos_off;

	/**
	 * [__construct]
	 */
	public function __construct() {

		 $this->ci 			     =& get_instance();
		 $this->controladores_on = array('login');
		 $this->metodos_on       = array('logout');
		 $this->metodos_off      = array();
		
	}

	/**
	 * [check_login]
	 * @return [url] [redirect]
	 */
	public function check_login() {

		$class   = $this->ci->router->class;

		$method  = $this->ci->router->method;

		$session = $this->ci->session->userdata('autenticado');

		if (empty($session) && !in_array($class, $this->controladores_on)):

			if (!in_array($method, $this->metodos_on)):
			
				redirect();
			
			endif;
		
		endif;

		if (empty($session) && in_array($class, $this->controladores_on)):

			if (in_array($method, $this->metodos_off)):
		
				redirect();
		
			endif;
	
	    endif;

	}	

}

/*
/end hooks/Noautenticados.php
*/