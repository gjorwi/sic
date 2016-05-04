<?php defined ('BASEPATH') OR exit ('No direct script access allowed');

/**
 * Class Login
 */
class Login extends CI_Controller {

	private $data;
	private $url;


	/**
	 * Metodo construct para caragar helpers y librerias.
	 */
	public function __construct() {

		parent::__construct();

			$this->data          = array();
			$this->url           = $this->router->class;

			$this->load->helper(array('validaciones','layout','security', 'form')); // Carga los helper para validar los formularios('validaciones'), cargar las vistas(layouts), seguridad md5 y demas(segurity), carga creacion de formularios html y seguridad en el envio de formularios('form').								   			   		   

	}

	/**
	 * Metodo index Carga toda la vista principal Login.
	 * url_base()/sic/sistema/login/index
	 */
	public function index() {

		//--------------------------Cargar variables del Metodo------------------------------ 	

			$titulo = 'SIC';

		//-----------------------------------------------------------------------------------

			layout_view_login($titulo, $this->url); //Carga layout

	}	

	/**
	 * Metodo para validar el formulario login.
	 * url_base()/sic/sistema/login/logueo
	 */
	public function logueo() {

		//--------------------------Cargar variables del Metodo------------------------------

			$usuario  = new Usuario;
			$permisos = new Perfile;
			$titulo   = 'Login';
			$accion   = 'ACCESO';

		//-----------------------------------------------------------------------------------

		//---------------------------------Recivir Variables Post----------------------------

		  	$this->login     = validarEntrada(strtoupper($this->input->post('usuario', TRUE)));  		     	// trim|stripslashes|strip_tags|htmlspecialchars|htmlentities|utf8_encode  /seguridad limpia post SQL injection
		  	$this->clave     = validarEntrada(strtoupper($this->input->post('password',TRUE)));				// trim|stripslashes|strip_tags|htmlspecialchars|htmlentities|utf8_encode  /seguridad limpia post SQL injection
		  	$this->anti_spam = validarEntrada($this->input->post('email',   TRUE));			    // trim|stripslashes|strip_tags|htmlspecialchars|htmlentities|utf8_encode  /seguridad limpia post SQL injection	

		//------------------------------------------------------------------------------------

						 		   //////////////////////////
		//------------------------//Inicio de Validaciones//----------------------------------
						         //////////////////////////

			if (!empty($this->anti_spam)): contador(); $this->data['mensajes'] = mensajeLogin();

			elseif (empty($this->login) && empty($this->clave)): $this->data['mensajes'] = mensajeFormRequerido();

			elseif ($this->session->userdata('contador') >= 3):  $this->data['mensajes'] = mensajeContador();

			elseif (!validarRequerido($this->login, $error, "Usuario")): $this->data['mensajes'] = $error;

			elseif (!validarRequerido($this->clave, $error, "Contrase&ntilde;a")): $this->data['mensajes'] = $error;	

			elseif (!validarPermitidosTodos($this->login, $error, "Usuario")): $this->data['mensajes'] = mensajeLogin();

			elseif (!validarPermitidosTodos($this->clave, $error, "Contraseña")): $this->data['mensajes'] = mensajeLogin();

			else:

		  		$this->clave = do_hash($this->clave, 'md5');

		  		$usuario->get_by_login($this->login);

		  		if ($usuario->login == Null): contador(); $this->data['mensajes'] = mensajeLogin();		  

		  		elseif ($usuario->clave != $this->clave): contador(); $this->data['mensajes'] = mensajeLogin();
			  
		 	    elseif ($usuario->estatus != 't'): $this->data['mensajes'] = mensajeLogin();
			  	
			  	else: 

			  		$usuario->persona->get();
					
				  	if ($usuario->persona->est_prs != 't'): $this->data['mensajes'] = mensajeLogin();
				  	
				  	else: 

				  		$usuario->perfile->get(); 

				  		if ($usuario->perfile->nom_prf == Null): $this->data['mensajes'] = mensajeLogin();

				  		else:

				  		$this->data = array(	
											'usuario_id'  => $usuario->id, 				        // Array de datos para guardar en la sesion.
											'persona_id'  => $usuario->persona_id,
											'perfile_id'  => $usuario->perfile_id,
											'perfilmta_id'=> $usuario->perfilmta_id,
											'ult_acc' 	  => $usuario->ult_acc,
											'nom_prf'	  => $usuario->perfile->nom_prf,
											'nombres'  	  => $usuario->persona->nombres,	
											'apellidos'   => $usuario->persona->apellidos,
											'cedula'      => $usuario->persona->cedula,														
											'autenticado' => TRUE						
								  	   		);

						$this->session->set_userdata($this->data);	         // Guardando datos en la sesion

						$this->data = array('Ingreso al sistema');

						$this->audit->register('TRUE', $this->data);         // Guardando datos Auditoria
						
						//-----------------------------------PERMISOS------------------------------------------

							$permisos->include_related('role', '*'); 	

							$permisos->include_related('role/modulo', '*');  
							$permisos->where('est_mod', 'TRUE');					
							$permisos->order_by('id', 'ASC');					

							$permisos->include_related('role/menu', '*'); 	
							$permisos->where('est_men', 'TRUE');   			
							$permisos->order_by('menu_id', 'ASC'); 				

							$permisos->include_related('role/crud', '*');    
							$permisos->where('est_cru', 'TRUE');   					
							$permisos->order_by('crud_id', 'ASC'); 					 
							
							$permisos->where('permiso', 'TRUE'); 
							$permisos->where('est_rol', 'TRUE');													 
							 									
							$permisos->get_by_id($usuario->perfile_id);	 

							$i = 0;
							foreach ($permisos as $value):

								$array['modulos'][$i] = $value->role_modulo_url_mod;
								$array[$value->role_modulo_url_mod][$i] = $value->role_menu_url_men;
								$array[$value->role_menu_url_men][$i] = $value->role_crud_url_cru;

							$i++;
							endforeach;

							$this->session->set_userdata($array);			

						//-------------------------------------------------------------------------------------

							redirect('menuprincipal');  // Redireccion a inicio.
						
						endif;

				  	endif;					  
			 
				endif;

		  	endif;
					
		//-------------------------------FIn Validaciones---------------------------------			

		    layout_view_login($titulo, $this->url, $this->data);	 // Carga layouts.

	}

}

/* End of file Login.php */
/* Location: ./application/controller/Login.php */