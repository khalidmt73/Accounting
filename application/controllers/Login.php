<?php
class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
       
    }

    function index() {
        $data['title'] = $this->lang->line('login');
		$data['style']      =  $this->style;

        $this->load->view('inc/head',$data);
        $this->load->view('inc/cpanel/'.$this->style.'/header',$this->data_header);
        $this->form_validation->set_rules('userUser', 'userUser', 'required');
        $this->form_validation->set_rules('userPass', 'Password', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login/login_form');
        } else {

            $data['userUser'] = $_POST['userUser'];
            $data['userPass'] = $_POST['userPass'];
            $user = $this->model->user($data['userUser'], $data['userPass']);
            $user_data = $this->model->user_data($data['userUser'], $data['userPass']);
            if(count($user_data) < 1 ){redirect(base_url('login/index'));}
			$userId   = $user_data[0]->id;
            $userName = $user_data[0]->userName;
            $userRole = $user_data[0]->userRole;
            $site = $user_data[0]->site;
            if ($user > 0) {
                $newdata = array(
                    'userUserCC' => $data['userUser'],
                    'userRoleCC' => $userRole,
				    'userIdCC' => $userId,
                    'userNameCC' => $userName,
                    'lang' => 'arabic',
                    'userCC' => TRUE
                ); 
				
                $this->session->set_userdata($newdata);
				$site = explode('-',$site);	
				if (count($site) < 2 ){
					redirect(base_url($site[0].'/index'));
				    }
				else{
					 redirect(base_url('web/index'));	
				    }
            } 
			else {
				  $this->load->view('login/login_form');
                 }
        }
        $this->load->view('inc/cpanel/'.$this->style.'/footer',$this->data_footer);
    }
    function user() {
        $data['userUser'] = $_POST['userUser'];
        $data['userPass'] = $_POST['userPass'];
        $user = $this->model->user($data['userUser'], $data['userPass']);

        if ($user > 0) {
            $newdata = array(
                'userUser' => $data['userUser'],
                'userCC' => TRUE
            );
            $this->session->set_userdata($newdata);
            redirect(base_url('web'));
        } else {
            redirect(base_url('login/index'));
        }
    }
    function logout() {
        $this->session->sess_destroy();
        redirect(base_url('login/index'));
    }
}
