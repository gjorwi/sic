<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ciudad extends DataMapper {

	public $table = 'ciudads';

	public $has_one = array('estado');

}

/* End of file ciudad.php */
/* Location: ./application/models/ciudad.php */