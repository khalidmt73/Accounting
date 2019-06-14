<?php

class Cpanel extends CI_Controller {

    function __construct() {
        parent::__construct();
		
      }
//-----------------------------------------------------------------------------------------
    public function index() {
	    $data['title'] = $this->lang->line('cpanel');
		$data['style']      =  $this->style;
		$this->load->view('inc/head', $data);
        $this->load->view('inc/cpanel/'.$this->style.'/header',$this->data_header);
        $this->load->view('home/cpanel',$data);
        $this->load->view('inc/cpanel/'.$this->style.'/footer',$this->data_footer);
    }

//-----------------------------------------------------------------------------------------
}