<?php

class Register extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Register_model');
        $lango = $this->session->userdata('lang');
        $this->load->helper('language');
        $this->lang->load('title', $lango);
    }

    function index() {
        $data['title'] = "الرئيسية";
        $this->load->view('inc/cpanel/header', $data);
        $this->load->view('inc/cpanel/menu');
        $this->load->view('register/index');
        $this->load->view('inc/cpanel/footer');
    }

    function register() {
        $data['title'] = "تسجيل";
        $this->load->view('inc/cpanel/header', $data);
        $this->load->view('inc/cpanel/menu');
        $this->load->view('register/register_form');
        $this->load->view('inc/cpanel/footer');
    }

    public function create() {
        $data['userName'] = $_POST['userName'];
        $data['userEmail'] = $_POST['userEmail'];
        $data['userUser'] = $_POST['userUser'];
        $data['userPass'] = $_POST['userPass'];
        $this->Register_model->create($data);
        header('location: ' . base_url('home'));
    }

}
