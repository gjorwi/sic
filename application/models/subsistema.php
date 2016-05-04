<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Subsistema extends DataMapper {

	public $table = 'subsistemas';

	public $has_one = array('sistema');

}

/* End of file subsistemas.php */
/* Location: ./application/models/subsistemas.php */