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
		$this->load->model('projetJ_model');
		$todo = $this->todoT_model->findByUser($idUser);
		$recentProject = $this->projetJ_model->recent_project($idUser, 4);
		$data = array(
			'todo' => $todo,
			'projets' => $recentProject
		);
		$this->load->view('accueil', $data);
	}
}