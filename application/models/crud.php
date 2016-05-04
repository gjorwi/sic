<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends DataMapper {

	public $table = 'cruds';

	public $has_one = array('role','menu','modulo');

}

/* End of file crud.php */
/* Location: ./application/models/crud.php */