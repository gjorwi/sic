<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Municipio extends DataMapper {

	public $table = 'municipios';

	public $has_one  = array('estado','parroquia', 'consejocomunal', 'mesatecnica');

	public $has_many = array('perfilmta');

}

/* End of file municipio.php */
/* Location: ./application/models/municipio.php */