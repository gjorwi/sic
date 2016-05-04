<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Proyect extends DataMapper {

	public $table = 'proyects';

	public $has_one = array('mesatecnica', 'empresa', 'sistema', 'subsistema');

}

/* End of file proyect.php */
/* Location: ./application/models/proyect.php */