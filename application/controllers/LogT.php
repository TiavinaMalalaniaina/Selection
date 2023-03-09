<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LogT extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('userT_model');
    }

    public function index() {
        $this->load->view('login');
    }

    public function login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $log = $this->userT_model->login($username, $password);
        if ($log == 'username' || $log == 'password') redirect(site_url('logT/index'));
        $this->session->set_userdata('iduser', $log['iduser']);
        var_dump($log);
    }
	
}