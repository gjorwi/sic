<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Persona extends DataMapper {

	public $table = 'personas';

	public $has_one = array('usuario');

	public $has_many = array('mesatecnica', 'reunion');

}

/* End of file persona.php */
/* Location: ./application/models/persona.php */