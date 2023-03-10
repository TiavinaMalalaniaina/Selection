<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TodoT extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('todoT_model');
    }

    public function save() {

        $user = $this->session->userdata('iduser');
        $tache = $this->input->post('tache');
        $this->todoT_model->save($user, $tache);
        redirect(site_url('welcome/'));

    }

    public function done() {
        $idtodo = $this->input->get('idtodo');
        $this->todoT_model->done($idtodo);
        redirect(site_url('welcome/'));
    }
    
	
}