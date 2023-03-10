<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if (!$this->userT_model->checkUser()) redirect('logT/');
	}

	public function index() {
		$idUser = $this->session->userdata('iduser');
		$this->load->model('todoT_model');
		$todo = $this->todoT_model->findByUser($idUser);
		$data = array(
			'todo' => $todo
		);

		$this->load->view('accueil', $data);
	}
}