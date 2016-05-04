<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Modulo extends DataMapper {

	public $table = 'modulos';

	public $has_one = array('role', 'crud', 'menu');
}

/* End of file modulo.php */
/* Location: ./application/models/modulo.php */