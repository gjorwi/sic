<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Perfilmta extends DataMapper {

	public $table = 'perfilmtas';

	public $has_one  = array('usuario');

	public $has_many = array('municipio');

}

/* End of file perfilmta.php */
/* Location: ./application/models/perfilmta.php */