<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sector extends DataMapper {

	public $table = 'sectors';

	public $has_one = array('parroquia', 'mesatecnica');

}

/* End of file sector.php */
/* Location: ./application/models/sector.php */