<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mesatecnicas_persona extends DataMapper {

	public $table = 'mesatecnicas_personas';

	public $has_one = array('mesatecnica', 'persona');

}

/* End of file mesatecnicas_personas.php */
/* Location: ./application/models/mesatecnicas_personas.php */