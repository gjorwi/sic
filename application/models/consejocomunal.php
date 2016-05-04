<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Consejocomunal extends DataMapper {

	public $table = 'consejocomunals';

	public $has_one = array('mesatecnica', 'estado', 'municipio', 'parroquia', 'sector');

}

/* End of file consejocomunal.php */
/* Location: ./application/models/consejocomunal.php */