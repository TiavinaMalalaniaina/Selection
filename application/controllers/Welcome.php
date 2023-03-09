<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$idUser = $this->session->userdata('iduser');
		$this->load->model('todoT_model');
		$todo = $this->todoT_model->findByUser($idUser);
		var_dump($todo);
		$data = array(
			'todo' => $todo
		);

		$this->load->view('accueil', $data);
	}
}