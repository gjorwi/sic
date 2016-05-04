<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends DataMapper {

	public $table = 'menus';

	public $has_one = array('role','crud', 'modulo');

}

/* End of file menu.php */
/* Location: ./application/models/menu.php */