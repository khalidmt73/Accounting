<?php

class FinanceDep extends CI_Controller {

    function __construct() {
        parent::__construct();
	 }
//-----------------------------------------------------------------------------------------
    public function index() {
	    $data['title'] = $this->lang->line('financeDep');
		$data['style']      =  $this->style;
		$this->load->view('inc/head', $data);
        $this->load->view('inc/financeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view('home/financeDep',$data);
        $this->load->view('inc/financeDep/'.$this->style.'/footer',$this->data_footer);
    }

//-----------------------------------------------------------------------------------------
}