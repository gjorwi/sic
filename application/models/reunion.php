<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reunion extends DataMapper {

	public $table = 'reunions';

	public $has_one = array('mesatecnica');

	public $has_many = array('persona');

}

/* End of file reunion.php */
/* Location: ./application/models/reunion.php */