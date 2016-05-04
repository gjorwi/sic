<?php defined ('BASEPATH') OR exit ('No direct script access allowed');

/**
 * Class Inicio
 */
class Jquery extends CI_Controller {

	private $data;

	/**
	 * [__construct]
	 */
	public function __construct() {

		parent::__construct();

		$this->data = array();
		$this->load->helper('validaciones');

	}

	/**
	 * [Cerrar sesion]
	 * @return [url] [al inicio login]
	 */
	public function index() {

		redirect();

	}

	/**
	 * Valida si la persona esta registrada.
	 */
	public function persona_unique() {

			$persona = new Persona;

		//---------------------------------Recivir Variables Post----------------------------	

			$persona->cedula = validarEntrada($this->input->post('cedula', TRUE));	

		//-----------------------------------------------------------------------------------

			if ($persona->cedula == null):

				redirect();

			endif;


		//-------------Validar que el campo Cedula no este repetido boton check----------------------

			if (!validarInt($persona->cedula, 7, 8, $error, '')):

				echo '0';	

			else:

				$persona->get_by_cedula($persona->cedula);

				if ($persona->cedula != null):

			       	echo '1';

			    else:
			       
			       	echo '2';

			    endif;  

			endif;    

		//-------------------------------------------------------------------------------------------

	}


	/**
	 * Busqueda persona.
	 */
	public function persona_busqueda() {

		$persona = new Persona;

		$est_prs = validarEntrada($this->input->post('valor', TRUE));

		if ($est_prs == null):

			redirect();

		endif;	

		$persona->where('nombres <>', 'PROGRAMADOR');
		$persona->where('id  >', '0');
		$persona->where('est_prs', $est_prs)->order_by('created', 'DESC')->get();
		
		foreach ($persona as $value) {	

		$this->data['id'][] = $value->id;
		$this->data['cedula'][] = $value->cedula;
		$this->data['nombres'][] = $value->nombres;
		$this->data['apellidos'][] = $value->apellidos;
			
		}	 

		$this->data = json_encode($this->data);

		print_r($this->data);

	}	

	/**
	 * Valida si el usuario esta registrado.
	 */
	public function usuario_unique() {

			$usuario = new Usuario;

		//---------------------------------Recivir Variables Post----------------------------	

			$usuario->login = validarEntrada($this->input->post('login', TRUE));	

		//-----------------------------------------------------------------------------------

			if ($usuario->login == null):
				redirect();

			endif;


		//-------------Validar que el campo Usurio no este repetido boton check----------------------

			if (!validarUsuario($usuario->login, 4, 20, $error, '')):

				echo '0';	

			else:

				$usuario->get_by_login($usuario->login);

				if ($usuario->login != null):

			       	echo '1';

			    else:
			       
			       	echo '2';

			    endif;  

			endif;    

		//-------------------------------------------------------------------------------------------

	}

	/**
	 * Valida si la persona ya posee un usuario asignado.
	 */
	public function usuario_persona() {

			$usuario = new Usuario;

		//---------------------------------Recivir Variables Post----------------------------	

			$usuario->persona_id = validarEntrada($this->input->post('persona_id', TRUE));	

		//-----------------------------------------------------------------------------------

			if ($usuario->persona_id == null):

				redirect();

			endif;

		//-------------------------------------------------------------------------------------------

			$usuario->get_by_persona_id($usuario->persona_id);

			if ($usuario->persona_id != null):

		       	echo '1';

		    else:
		       
		       	echo '2';

		    endif;     

		//-------------------------------------------------------------------------------------------

	}

	/**
	 * Valida si el empresa esta registrado.
	 */
	public function empresa_unique() {

			$empresa = new Empresa;

		//---------------------------------Recivir Variables Post----------------------------	

			$empresa->rif = validarEntrada($this->input->post('rif', TRUE));
			$tiporif      = validarEntrada($this->input->post('tiporif', TRUE));	

		//-----------------------------------------------------------------------------------

			if ($empresa->rif == null):

				redirect();

			endif;

		//-------------Validar que el campo Usurio no este repetido boton check----------------------

			if (!validarInt($empresa->rif, 9, 9, $error, '')):

				echo '0';	

			else:

				$empresa->get_by_rif($empresa->rif);

				if($empresa->rif != Null && $empresa->tiporif == $tiporif):

			       	echo '1';

			    else:
			       
			       	echo '2';

			    endif;  

			endif;    

		//-------------------------------------------------------------------------------------------

	}

	/**
	 * Valida si el sistema esta registrado.
	 */
	public function sistema_unique() {

			$sistema = new Sistema;

		//---------------------------------Recivir Variables Post----------------------------	

			$sistema->nom_sis = validarEntrada($this->input->post('nom_sis', TRUE));	

		//-----------------------------------------------------------------------------------

			if ($sistema->nom_sis == null):

				redirect();

			endif;


		//-------------Validar que el campo Usurio no este repetido boton check----------------------

			if (!validarNombresEspP($sistema->nom_sis, 2, $error, '')):

				echo '0';	

			else:

				$sistema->get_by_nom_sis($sistema->nom_sis);

				if ($sistema->nom_sis != null):

			       	echo '1';

			    else:
			       
			       	echo '2';

			    endif;  

			endif;    

		//-------------------------------------------------------------------------------------------

	}

	/**
	 * Valida si el subsistema esta registrado.
	 */
	public function subsistema_unique() {

			$subsistema = new Subsistema;

		//---------------------------------Recivir Variables Post----------------------------	

			$subsistema->nom_sub = validarEntrada($this->input->post('nom_sub', TRUE));	

		//-----------------------------------------------------------------------------------

			if ($subsistema->nom_sub == null):

				redirect();

			endif;


		//-------------Validar que el campo Usurio no este repetido boton check----------------------

			if (!validarNombresEspP($subsistema->nom_sub, 2, $error, '')):

				echo '0';	

			else:

				$subsistema->get_by_nom_sub($subsistema->nom_sub);

				if ($subsistema->nom_sub != null):

			       	echo '1';

			    else:
			       
			       	echo '2';

			    endif;  

			endif;    

		//-------------------------------------------------------------------------------------------

	}

	/**
	 * Busqueda sistema.
	 */
	public function sistema_busqueda() {

		$sistema = new Sistema;

		$est_sis = validarEntrada($this->input->post('valor', TRUE));

		if ($est_sis == null):

			redirect();

		endif;	

		$sistema->where('est_sis', $est_sis)->get();
		
		foreach ($sistema as $value) {	

		$this->data['id'][] = $value->id;
		$this->data['nom_sis'][] = $value->nom_sis;
			
		}	 

		$this->data = json_encode($this->data);

		print_r($this->data);

	}	

	 /**
	 * Busqueda perfiles.
	 */
	public function perfile_busqueda() {

		$perfile = new Perfile;

		$est_prf = validarEntrada($this->input->post('valor', TRUE));

		if ($est_prf == null):

			redirect();

		endif;	

		$perfile->where('est_prf', $est_prf)->get();
		
		foreach ($perfile as $value) {	

			$this->data['id'][] = $value->id;
			$this->data['nom_prf'][] = $value->nom_prf;
			
		}	 

		$this->data = json_encode($this->data);

		print_r($this->data);

	}	

	 /**
	 * Busqueda perfilmta.
	 */
	public function perfilmta_busqueda() {

		$perfilmta = new Perfilmta;

		$est_pmt = validarEntrada($this->input->post('valor', TRUE));

		if ($est_pmt == null):

			redirect();

		endif;	

		$perfilmta->where('est_pmt', $est_pmt)->get();
		
		foreach ($perfilmta as $value) {	

			$this->data['id'][] = $value->id;
			$this->data['nom_prf'][] = $value->nom_pmt;
			
		}	 

		$this->data = json_encode($this->data);

		print_r($this->data);

	}	

	/**
	 * Busqueda estado.
	 */
	public function estado_busqueda() {

		$estado = new Estado;

		$est_est = validarEntrada($this->input->post('valor', TRUE));

		if ($est_est == null):

			redirect();

		endif;	

		$estado->where('est_est', $est_est)->get();
		
		foreach ($estado as $value) {	

			$this->data['id'][] = $value->id;
			$this->data['nom_est'][] = strtoupper(str_replace(array("á","é","í","ó","ú","ñ"), array("Á","É","Í","Ó","Ú","Ñ"), $value->nom_est));
			
		}	 

		$this->data = json_encode($this->data);

		print_r($this->data);

	}

	/**
	 * Busqueda municipio.
	 */
	public function municipio_busqueda() {

		$municipio = new Municipio;

		$estado_id = validarEntrada($this->input->post('estado_id', TRUE));
		$perfilmta_id = $this->session->userdata('perfilmta_id');

		if ($estado_id == null):

			redirect();

		endif;	

		$municipio->include_related('perfilmta', '*');
		$municipio->where('est_pmt', 'TRUE');
		$municipio->where('permisomta', 'TRUE');
		$municipio->where('perfilmta_id', $perfilmta_id);
		$municipio->where('est_mun', 'TRUE')->order_by('id', 'ASC')->get_by_estado_id($estado_id);
		
		foreach ($municipio as $value) {	

			$this->data['id'][] = $value->id;
			$this->data['nom_mun'][] = strtoupper(str_replace(array("á","é","í","ó","ú","ñ"), array("Á","É","Í","Ó","Ú","Ñ"), $value->nom_mun));
			
		}	 

		$this->data = json_encode($this->data);

		print_r($this->data);

	}

	/**
	 * Busqueda parroquia.
	 */
	public function parroquia_busqueda() {

		$parroquia = new Parroquia;

		$municipio_id = validarEntrada($this->input->post('municipio_id', TRUE));

		if ($municipio_id == null):

			redirect();

		endif;	

		$parroquia->where('est_par', 'TRUE')->get_by_municipio_id($municipio_id);
		
		foreach ($parroquia as $value) {	

			$this->data['id'][] = $value->id;
			$this->data['nom_par'][] = strtoupper(str_replace(array("á","é","í","ó","ú","ñ"), array("Á","É","Í","Ó","Ú","Ñ"), $value->nom_par));
			
		}	 

		$this->data = json_encode($this->data);

		print_r($this->data);

	}

	/**
	 * Busqueda sector.
	 */
	public function sector_busqueda() {

		$sector = new Sector;

		$parroquia_id = validarEntrada($this->input->post('parroquia_id', TRUE));

		if ($parroquia_id == null):

			redirect();

		endif;	

		$sector->where('est_sec', 'TRUE')->order_by('created', 'DESC')->get_by_parroquia_id($parroquia_id);
		
		foreach ($sector as $value) {	

			$this->data['id'][] = $value->id;
			$this->data['nom_sec'][] = $value->nom_sec;
			
		}	 

		$this->data = json_encode($this->data);

		print_r($this->data);

	}

	/**
	 * Busqueda sector.
	 */
	public function sector_registrar() {

		$sector  = new Sector;
		$sectora = new Sector;

		$sector->parroquia_id = validarEntrada($this->input->post('parroquia_id', TRUE));
		$sector->nom_sec = validarEntrada($this->input->post('nom_sec', TRUE));
		$sector->est_sec = 'TRUE';

		if ($sector->parroquia_id == null):

			redirect();

		endif;	

		if(!validarNombresEspP($sector->nom_sec, 2, $error, '')):

			echo '0';

		else:

			$sectora->get_by_nom_sec($sector->nom_sec);

			if ($sectora->nom_sec != null):

			    echo '1';

			else:
			       
			    echo '2';
				$sector->save();

			endif;  

		endif;

	}

	/**
	 * Valida si el empresa esta registrado.
	 */
	public function ccomunal_unique() {

			$consejocomunal = new Consejocomunal;

		//---------------------------------Recivir Variables Post----------------------------	

			$consejocomunal->rifcc = validarEntrada($this->input->post('rifcc', TRUE));
			$tiporifcc = validarEntrada($this->input->post('tiporifcc', TRUE));	

		//-----------------------------------------------------------------------------------

			if ($consejocomunal->rifcc == null):

				redirect();

			endif;

		//-------------Validar que el campo Usurio no este repetido boton check----------------------

			if (!validarInt($consejocomunal->rifcc, 9, 9, $error, '')):

				echo '0';	

			else:

				$consejocomunal->get_by_rifcc($consejocomunal->rifcc);

				if($consejocomunal->rifcc != Null && $consejocomunal->tiporifcc == $tiporifcc):

			       	echo '1';

			    else:
			       
			       	echo '2';

			    endif;  

			endif;    

		//-------------------------------------------------------------------------------------------

	}

		/**
	 * Busqueda sistema.
	 */
	public function ccomunal_busqueda() {

		$consejocomunales = new Consejocomunal;

		$est_cco = validarEntrada($this->input->post('valor', TRUE));

		if ($est_cco == null):

			redirect();

		endif;	

		$perfilmta_id = $this->session->userdata('perfilmta_id');

			$consejocomunales->include_related('estado', '*');
			$consejocomunales->where('est_est', $est_cco);
			$consejocomunales->include_related('municipio', '*');
			$consejocomunales->where('est_mun', $est_cco);
			$consejocomunales->include_related('parroquia', '*');
			$consejocomunales->where('est_par', $est_cco);
			$consejocomunales->include_related('sector', '*');
			$consejocomunales->where('est_sec', $est_cco);
			$consejocomunales->include_related('municipio/perfilmta', '*');
			$consejocomunales->where('est_pmt', 'TRUE');
			$consejocomunales->where('permisomta', 'TRUE');
			$consejocomunales->where('perfilmta_id', $perfilmta_id);
			$consejocomunales->where('est_cco', $est_cco);
			$consejocomunales->order_by('id', 'ASC')->get();
		
		foreach ($consejocomunales as $value) {	

		$this->data['id'][] = $value->id;
		$this->data['tiporifcc'][] = $value->tiporifcc;
		$this->data['rifcc'][] = $value->rifcc;
		$this->data['personacc1'][] = $value->personacc1;
		$this->data['personacc2'][] = $value->personacc2;
		$this->data['personacc3'][] = $value->personacc3;
		$this->data['nombrecc'][] = $value->nombrecc;
		$this->data['nom_est'][] = strtoupper(str_replace(array("á","é","í","ó","ú","ñ"), array("Á","É","Í","Ó","Ú","Ñ"), $value->estado_nom_est));
		$this->data['nom_mun'][] = strtoupper(str_replace(array("á","é","í","ó","ú","ñ"), array("Á","É","Í","Ó","Ú","Ñ"), $value->municipio_nom_mun));
		$this->data['nom_par'][] = strtoupper(str_replace(array("á","é","í","ó","ú","ñ"), array("Á","É","Í","Ó","Ú","Ñ"), $value->parroquia_nom_par));
		$this->data['nom_sec'][] = $value->sector_nom_sec;
			
		}	 

		$this->data = json_encode($this->data);

		print_r($this->data);

	}	

	/**
	 * Valida si la persona ya posee un usuario asignado.
	 */
	public function mta_ccomunal() {

			$mta = new Mesatecnica;

		//---------------------------------Recivir Variables Post----------------------------	

			$mta->ccomunal_id = validarEntrada($this->input->post('ccomunal_id', TRUE));	

		//-----------------------------------------------------------------------------------

			if ($mta->ccomunal_id == null):

				redirect();

			endif;

		//-------------------------------------------------------------------------------------------

			$mta->get_by_consejocomunal_id($mta->ccomunal_id);

			if ($mta->consejocomunal_id != null):

		       	echo '1';

		    else:
		       
		       	echo '2';

		    endif;     

		//-------------------------------------------------------------------------------------------

	}

	/**
	 * Valida si el empresa esta registrado.
	 */
	public function mta_unique() {

			$mta = new Mesatecnica;

		//---------------------------------Recivir Variables Post----------------------------	

			$mta->rifmta = validarEntrada($this->input->post('rifmta', TRUE));	
			$tiporifmta = validarEntrada($this->input->post('tiporifmta', TRUE));

		//-----------------------------------------------------------------------------------

			if ($mta->rifmta == null):

				redirect();

			endif;

		//-------------Validar que el campo Usurio no este repetido boton check----------------------

			if (!validarInt($mta->rifmta, 9, 9, $error, '')):

				echo '0';	

			else:

				$mta->get_by_rifmta($mta->rifmta);

				if ($mta->rifmta != Null && $mta->tiporifmta == $tiporifmta):

			       	echo '1';

			    else:
			       
			       	echo '2';

			    endif;  

			endif;    

		//-------------------------------------------------------------------------------------------

	}

	 /**
	 * Busqueda perfilmta.
	 */
	public function empresa_busqueda() {

		$empresa = new Empresa;

		$est_emp = validarEntrada($this->input->post('valor', TRUE));

		if ($est_emp == null):

			redirect();

		endif;	

		$empresa->where('est_emp', $est_emp)->get();
		
		foreach ($empresa as $value) {	

			$this->data['id'][] = $value->id;
			$this->data['tiporif'][] = $value->tiporif;
			$this->data['rif'][] = $value->rif;
			$this->data['razon'][] = $value->razon;
			$this->data['telefonoh'][] = $value->telefonoh;
			
		}	 

		$this->data = json_encode($this->data);

		print_r($this->data);

	}	

	/**
	 * Busqueda subsistema.
	 */
	public function subsistema_busqueda() {

		$subsistema = new Subsistema;

		$sistema_id = validarEntrada($this->input->post('sistema_id', TRUE));

		if ($sistema_id == null):

			redirect();

		endif;	

		$subsistema->where('est_sub', 'TRUE')->order_by('nom_sub', 'ASC')->get_by_sistema_id($sistema_id);
		
		foreach ($subsistema as $value) {	

			$this->data['id'][] = $value->id;
			$this->data['nom_sub'][] = $value->nom_sub;
			
		}	 

		$this->data = json_encode($this->data);

		print_r($this->data);

	}

	 /**
	 * Busqueda perfilmta.
	 */
	public function mta_busqueda() {

		$mesatecnica = new Mesatecnica;

		$est_mes = validarEntrada($this->input->post('valor', TRUE));

		if ($est_mes == null):

			redirect();

		endif;	

			$perfilmta_id = $this->session->userdata('perfilmta_id');

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
			$mesatecnica->where('est_mes', $est_mes);
			$mesatecnica->order_by('id', 'ASC')->get();
		
		foreach ($mesatecnica as $value) {	

			$this->data['id'][] = $value->id;
			$this->data['tiporifmta'][] = $value->tiporifmta;
			$this->data['rifmta'][] = $value->rifmta;
			$this->data['nom_mta'][] = $value->nom_mta;
			$this->data['consejocomunal'][] = $value->consejocomunal_nombrecc;
			$this->data['estado'][] = validarEntrada($value->estado_nom_est);
			$this->data['municipio'][] = validarEntrada($value->municipio_nom_mun);
			$this->data['parroquia'][] = validarEntrada($value->parroquia_nom_par);
			$this->data['sector'][] = validarEntrada($value->sector_nom_sec);
			
		}	 

		$this->data = json_encode($this->data);

		print_r($this->data);

	}	

	/**
	 * Busqueda Auditoria.
	 */
	public function auditoria_busqueda() {

		$auditoria = new Auditoria;

		$valor = validarEntrada($this->input->post('valor', TRUE));

		if ($valor == null):

			redirect();

		endif;	

			$auditoria->include_related('usuario', '*');
			$auditoria->include_related('usuario/persona', '*');
			$auditoria->include_related('usuario/perfile', '*');
			$auditoria->order_by('id', 'DESC');
			$auditoria->get();
		
		foreach ($auditoria as $row) {	

			$nombre   = explode(' ', $row->usuario_persona_nombres);
			$apellido = explode(' ', $row->usuario_persona_apellidos);

			$this->data['cedula'][] = $row->usuario_persona_cedula;
			$this->data['nombre'][] = $nombre[0].' '.$apellido[0];
			$this->data['usuario'][]= $row->usuario_login;
			$this->data['modulo'][] = $row->modulo;
			$this->data['menu'][]   = $row->sub_modulo;
			$this->data['accion'][] = $row->accion;
			$this->data['result'][] = $row->result;
			$this->data['fecha'][]  = formatoFecha($row->created);
			
		}	 

		$this->data = json_encode($this->data);

		print_r($this->data);

	}

	/**
	 * Busqueda subsistema.
	 */
	public function persona_reunion() {

		$mta = new Mesatecnica;

		$mta_id = validarEntrada($this->input->post('mesatecnica_id', TRUE));

		if ($mta_id == null):

			redirect();

		endif;	

		$mta->include_related('persona', '*');
		$mta->where('est_prs', 'TRUE');
		$mta->order_by('sec', 'ASC');
		$mta->get_by_mesatecnica_id($mta_id);
		
		foreach ($mta as $row) {	

			if ($row->persona_id != 0):

				$this->data['id'][]        = $row->persona_id;
				$this->data['cedula'][]    = $row->persona_cedula;
				$this->data['nombres'][]   = $row->persona_nombres;
				$this->data['apellidos'][] = $row->persona_apellidos;

			endif;
			
		}	 

		$this->data = json_encode($this->data);

		print_r($this->data);

	}

	/**
	 * Reset asistencia.
	 */
	public function reset_asist() {

		$persona = new Persona;

		$x = validarEntrada($this->input->post('valor', TRUE));

		if ($x == null):

			redirect();

		endif;	

		if ($persona->update('asist', 0)):

			echo 1;
		
		else:

			echo 0;		

		endif;	

	}

	/**
	 * Reset asistencia.
	 */
	public function reset_persona() {

		$persona = new Persona;

		$cedula = validarEntrada($this->input->post('cedula', TRUE));

		if ($cedula == null):

			redirect();

		endif;

		$persona->get_by_cedula($cedula);

		$persona->asist = 0;	

		if ($persona->save()):

			echo 1;
		
		else:

			echo 0;		

		endif;	

	}

	/**
	 * mta vencidas.
	 */
	public function mta_vencidas() {

		
		$valor = validarEntrada($this->input->post('valor', TRUE));

		if ($valor == null):

			redirect();

		endif;

		$perfilmta_id = $this->session->userdata('perfilmta_id');

		$mta = new Mesatecnica;

		$mta->include_related('municipio', '*');
		$mta->where('est_mun', 'TRUE');
		$mta->include_related('municipio/perfilmta', '*');
		$mta->where('est_pmt', 'TRUE');
		$mta->where('permisomta', 'TRUE');
		$mta->where('perfilmta_id', $perfilmta_id);
		$mta->where('est_mes', 'FALSE');
		$mta->order_by('id', 'ASC');
		$mta->get();

		foreach ($mta as $row) {	

			$this->data['rif'][]             = $row->tiporifmta.' '.$row->rifmta;
			$this->data['nom_mta'][]         = $row->nom_mta;
			$this->data['municipio'][]       = validarEntrada($row->municipio_nom_mun);
			$this->data['registradao_por'][] = $row->registrado_por2.' '.$row->registrado_por1;
			
		}	 

		$this->data = json_encode($this->data);

		print_r($this->data);
		
	}


	/**
	 * mta vencidas count.
	 */
	public function count_mta_ven() {

		$valor = validarEntrada($this->input->post('valor', TRUE));

		if ($valor == null):

			redirect();

		endif;

		$perfilmta_id = $this->session->userdata('perfilmta_id');

		$mta = new Mesatecnica;

		 $mta->include_related('municipio/perfilmta', '*');
		 $mta->where('est_pmt', 'TRUE');
		 $mta->where('permisomta', 'TRUE');
		 $mta->where('perfilmta_id', $perfilmta_id);
		 $this->data['inactivas'][] = $mta->where('est_mes','FALSE')->count();

		$this->data = json_encode($this->data);

		print_r($this->data);

	}	

	/**
	 * mta vencidas count.
	 */
	public function count_mta_xven() {

		$valor = validarEntrada($this->input->post('valor', TRUE));

		if ($valor == null):

			redirect();

		endif;

		$perfilmta_id = $this->session->userdata('perfilmta_id');

		$mta_xvencer = new Mta_xvencer;

		 $mta_xvencer->include_related('mesatecnica/municipio/perfilmta', '*');
		 $mta_xvencer->where('est_pmt', 'TRUE');
		 $mta_xvencer->where('permisomta', 'TRUE');
		 $mta_xvencer->where('perfilmta_id', $perfilmta_id);
		 $this->data['xvencer'][] = $mta_xvencer->count();

		$this->data = json_encode($this->data);

		print_r($this->data);

	}

	/**
	 * mta por vencer.
	 */
	public function mta_porvencer() {

		
		$valor = validarEntrada($this->input->post('valor', TRUE));

		if ($valor == null):

			redirect();

		endif;
		

		$mta = new Mesatecnica;
		$mta_xvencer = new Mta_xvencer;

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

			$anovenc  = $ano + 2;
			$anovenc1 = $ano + 1;

		if ($mes == 1 || $mes ==2):
			
			if($anoactual == $anovenc1):

				if($mes == 1 && $mesactual == 11):

					$mta_xvencer->get_by_mesatecnica_id($row->id);
					$mta_xvencer->mesatecnica_id = $row->id;
					$mta_xvencer->save();
					
				elseif ($mes == 2 && $mesactual == 12):

				    $mta_xvencer->get_by_mesatecnica_id($row->id);
					$mta_xvencer->mesatecnica_id = $row->id;
					$mta_xvencer->save();

				endif;	

			endif;	
		
		else:

			$mesvenc = $mes - 2;

		endif;		

		if($anovenc == $anoactual && $mesvenc == $mesactual):
			
				$mta_xvencer->get_by_mesatecnica_id($row->id);
				$mta_xvencer->mesatecnica_id = $row->id;
				$mta_xvencer->save();

		endif;

			$anovenc = 0;

		endforeach;

		$perfilmta_id = $this->session->userdata('perfilmta_id'); 
		
		 $mta_xvencer->include_related('mesatecnica', '*');
		 $mta_xvencer->include_related('mesatecnica/municipio', '*');
		 $mta_xvencer->where('est_mun', 'TRUE');
		 $mta_xvencer->include_related('mesatecnica/municipio/perfilmta', '*');
		 $mta_xvencer->where('est_pmt', 'TRUE');
		 $mta_xvencer->where('permisomta', 'TRUE');
		 $mta_xvencer->where('perfilmta_id', $perfilmta_id);
		 $mta_xvencer->get();

		 foreach ($mta_xvencer as $row) {	

			$this->data['rif'][]             = $row->mesatecnica_tiporifmta.' '.$row->mesatecnica_rifmta;
			$this->data['nom_mta'][]         = $row->mesatecnica_nom_mta;
			$this->data['municipio'][]       = validarEntrada($row->mesatecnica_municipio_nom_mun);
			$this->data['registradao_por'][] = $row->mesatecnica_registrado_por2.' '.$row->mesatecnica_registrado_por1;
			
		}	

		$this->data = json_encode($this->data);

		print_r($this->data);
		
	}	

}

/* End of file jquery.php */
/* Location: ./application/controller/jquery.php */
