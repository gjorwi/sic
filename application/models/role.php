<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends DataMapper {

	public $table = 'roles';

	public $has_one = array('modulo', 'menu', 'crud');
	public $has_many = array('perfile');

}

/* End of file role.php */
/* Location: ./application/models/role.php */