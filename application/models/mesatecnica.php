<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mesatecnica extends DataMapper {

	public $table = 'mesatecnicas';

	public $has_one = array('proyect', 'mta_xvencer','reunion', 'consejocomunal','estado', 'municipio', 'parroquia', 'sector');

	public $has_many = array('persona');

}

/* End of file mesatecnica.php */
/* Location: ./application/models/mesatecnica.php */