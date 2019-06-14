<?php

class Web extends CI_Controller {

	 public $headers ;
    
	function __construct() {
        parent::__construct();
	
    }
//-----------------------------------------------------------------------------------------
    public function index() {
        $data['title']    = $this->lang->line('home');
		$data['style']      =  $this->style;
        $this->load->view('inc/head', $data);
        $this->load->view('inc/web/'.$this->style.'/header',$this->data_header);
        $this->load->view('home/index',$data);
        $this->load->view('inc/web/'.$this->style.'/footer',$this->data_footer);
    }
//-----------------------------------------------------------------------------------------

}