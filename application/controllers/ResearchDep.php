<?php

class ResearchDep extends CI_Controller {

    function __construct() {
        parent::__construct();
		
	  }
//-----------------------------------------------------------------------------------------
    public function index() {
	    $data['title'] = $this->lang->line('cpanel');
		$data['style']      =  $this->style;
       	$data['social'] = $this->model->get('social');
		$this->load->view('inc/head', $data);
        $this->load->view('inc/researchDep/'.$this->style.'/header',$this->data_header);
        $this->load->view('home/researchDep',$data);
        $this->load->view('inc/researchDep/'.$this->style.'/footer',$this->data_footer);
    }

//-----------------------------------------------------------------------------------------
}

?>
