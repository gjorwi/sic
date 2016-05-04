<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*/////////////////////////////////////////////////////////////
 * HELPER DE LAYOUTS PARA CODEIGNITE CREADO POR JOSEPH GARCIA./
 */////////////////////////////////////////////////////////////

/**
 * 
 */
function layout_view_login($titulo = '', $url_view = '', $datos_view = '') {

	$CI = & get_instance();
	$datos = array('titulo' => $titulo);  		     // Datos = array(nombre del titulo,).
	$CI->load->view('layouts/head',$datos);          // Carga vista head.

	$CI->load->view('layouts/header');        	     // Carga vista header.
						
	$CI->load->view($url_view, $datos_view); 	 	 // Carga vista main.

	$CI->load->view('layouts/footer');   			 // Carga vista footer.

}

/**
 * 
 */
function layout_views($titulo = '', $url_view = '', $datos_view = '') {

	$CI = & get_instance();
	$datos = array('titulo' => $titulo);  		     // Datos = array(nombre del titulo,).
	$CI->load->view('layouts/head',$datos);          // Carga vista head.

	$CI->load->view('layouts/header');        	     // Carga vista header.
						
	$CI->load->view($url_view, $datos_view); 	 	 // Carga vista footer.

	$array   = explode(' ', ucwords(strtolower($CI->session->userdata('nombres'))));	 //footer
	$fecha   = $CI->session->userdata('ult_acc');

	if ($fecha == Null):

		$ult_acc = 'Primer Acceso';

	else:

		$ult_acc = date("d M Y - h:i:s A",strtotime($fecha));

	endif;	
		
		$ano = date("Y",strtotime($fecha));

		$perfil = explode(' ', $CI->session->userdata('nom_prf'));

		$datos = array(
						'nombres' => $array[0], 
						'rol'     => $perfil[0],
						'ult_acc' => $ult_acc,
						'ano'     => $ano
					  );  

	$CI->load->view('layouts/footer',$datos); 

}

/**
 * 
 */
function layout_all($titulo = '', $url_view = '', $datos_view = '', $url_menu = '', $datos_menu = '', $datos_crud = '') {

	$CI = & get_instance();
	$datos = array('titulo' => $titulo);  		     // Datos = array(nombre del titulo,).
	$CI->load->view('layouts/head',$datos);          // Carga vista head.

	$CI->load->view('layouts/header');        	     // Carga vista header.

	$CI->load->view('layouts/modal', $datos_view);   // Carga vista CRUD.

	$CI->load->view($url_menu, $datos_menu); 	     // Carga vista menu.

	$CI->load->view('layouts/crud', $datos_crud);    // Carga vista CRUD.
						
	$CI->load->view($url_view, $datos_view); 	 	 // Carga vista footer.

	$array   = explode(' ', ucwords(strtolower($CI->session->userdata('nombres'))));	 //footer
	$fecha   = $CI->session->userdata('ult_acc');

	if ($fecha == Null):

		$ult_acc = 'Primer Acceso';

	else:

		$ult_acc = date("d M Y - h:i:s A",strtotime($fecha));

	endif;	
		
		$ano = date("Y",strtotime($fecha));

		$perfil = explode(' ', $CI->session->userdata('nom_prf'));

		$datos = array(
						'nombres' => $array[0], 
						'rol'     => $perfil[0],
						'ult_acc' => $ult_acc,
						'ano'     => $ano

					  );  

	$CI->load->view('layouts/footer',$datos);

}
/* End of file layout_helper.php */
/* Location: ./application/helpers/layout_helper.php */