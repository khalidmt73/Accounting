<?php

class ServiceDep extends CI_Controller {

    function __construct() {
        parent::__construct();
		
	  }
//-----------------------------------------------------------------------------------------
    public function index() {
	    $data['title'] = $this->lang->line('serviceDep');
		$data['style']      =  $this->style;
		$this->load->view('inc/head', $data);
        $this->load->view('inc/serviceDep/'.$this->style.'/header',$this->data_header);
        $this->load->view('home/serviceDep',$data);
        $this->load->view('inc/serviceDep/'.$this->style.'/footer',$this->data_footer);
    }

//-----------------------------------------------------------------------------------------
}

?>
