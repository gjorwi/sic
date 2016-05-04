<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Parroquia extends DataMapper {

	public $table = 'parroquias';

	public $has_one = array('municipio', 'sector', 'mesatecnica');

}

/* End of file parroquia.php */
/* Location: ./application/models/parroquia.php */