<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auditoria extends DataMapper {

	public $table = 'auditorias'; // Nombre de la Tabla.

	public $has_one = array('usuario');

}

/* End of file auditoria.php */
/* Location: ./application/models/auditoria.php */