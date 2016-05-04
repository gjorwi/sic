<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sistema extends DataMapper {

	public $table = 'sistemas';

	public $has_one = array('subsistema');

}

/* End of file sistemas.php */
/* Location: ./application/models/sistemas.php */