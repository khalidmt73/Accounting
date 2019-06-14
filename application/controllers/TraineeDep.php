<?php

class TraineeDep extends CI_Controller {

    function __construct() {
        parent::__construct();
	  }
//-----------------------------------------------------------------------------------------
    public function index() {
	    $data['title'] = $this->lang->line('traineeDep');
		$data['style']      =  $this->style;
		$this->load->view('inc/head', $data);
        $this->load->view('inc/traineeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view('home/traineeDep',$data);
        $this->load->view('inc/traineeDep/'.$this->style.'/footer',$this->data_footer);
    }

//-----------------------------------------------------------------------------------------
}