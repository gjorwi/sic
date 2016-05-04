<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Perfile extends DataMapper {

	public $table = 'perfiles';

	public $has_one  = array('usuario');
	public $has_many = array('role'); 
}

/* End of file perfile.php */
/* Location: ./application/models/perfile.php */