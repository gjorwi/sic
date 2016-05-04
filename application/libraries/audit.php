<?php

/**
 * Provee la implementacion para el registro de auditorias del sistema.
 *
 */
class Audit {

    public function __construct() {

        $this->CI = &get_instance();
        $this->CI->load->library('user_agent');

    }

    /**
     * Realiza el registro de auditorias del sistema.
     * Llamar $this->audit->register(parametros);
     */
    public function register($result, $detalles) {

        $auditoria = new auditoria;
 
        $auditoria->usuario_id  = $this->CI->session->userdata('usuario_id');
        $auditoria->accion      = strtoupper($this->CI->uri->segment(3));  
        if    ($result == 'TRUE')  $auditoria->result = 'SUCCESS';
        elseif($result == 'FALSE') $auditoria->result = 'FAILURE';
        $auditoria->url         = base_url($this->CI->input->server('REQUEST_URI'));
        $auditoria->ip          = $this->CI->input->ip_address();
        $auditoria->navegador   = strtoupper($this->CI->agent->browser());
        $auditoria->version     = $this->CI->agent->version();
        $auditoria->os          = $this->CI->agent->platform();
        $auditoria->detalles    = strtoupper(json_encode($detalles));
        $auditoria->modulo      = strtoupper($this->CI->uri->segment(1));
        $auditoria->sub_modulo  = strtoupper($this->CI->uri->segment(2));
    
        $auditoria->save();

    }

}
