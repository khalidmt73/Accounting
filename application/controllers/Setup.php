<?php
class Setup extends CI_Controller {
	

    function __construct() {
        parent::__construct();
		
	  }
//-----------------------------------------------------------------------------------------
    public function index() {
	     $data['title'] = $this->lang->line('setup');
		$data['style']      =  $this->style;
		$this->load->view('inc/head', $data);
        $this->load->view('inc/traineeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view('setup/menu');
        $this->load->view('setup/index',$data);
        $this->load->view('inc/traineeDep/'.$this->style.'/footer',$this->data_footer);
    }
//-----------------------------------------------------------------------------------
}