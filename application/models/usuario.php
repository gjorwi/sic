<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends DataMapper {

	public $table = 'usuarios'; // Nombre de la Tabla

	public $has_one = array('persona', 'perfile', 'auditoria', 'perfilmta'); // Relacon 1 a 1 con personas y perfiles.

}

/* End of file usuario.php */
/* Location: ./application/models/usuario.php */