<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Estado extends DataMapper {

	public $table = 'estados';

	public $has_one = array('ciudad', 'municipio', 'mesatecnica');

}

/* End of file estado.php */
/* Location: ./application/models/estado.php */