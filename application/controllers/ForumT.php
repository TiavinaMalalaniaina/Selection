<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ForumT extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('forumT_model');
		$this->load->model('userT_model');
		$this->load->helpers('date_helper');
	}
	

	public function index() {
		$this->load->view('welcome_message');
	}

	public function test() {
	}

	public function problemByFiliere() {
		$idUser = 4;
		$user = $this->userT_model->getUserById($idUser);
		$idfiliere = $user['idfiliere'];
		$problems = $this->forumT_model->getAllProblemByFiliere($idfiliere);
		$data = array(
			'problems' => $problems,
			'user' => $user
		);
		$this->load->view('listes_forum', $data);
	} 

	public function addProblem() {
		$iduser = 3;
		$idfiliere = $this->input->post('idfiliere');
		$problem = $this->input->post('problem');
		$desc = $this->input->post('desc');
		$this->forumT_model->saveProblem($iduser, $idfiliere, $problem, $desc);
		redirect(site_url('ForumT/problemByFiliere'));
	}

	public function addAnswer() {
		$user = 2;
		$response = $this->input->post('response');
		$idforum_problem = $this->input->post('idforum_problem');
		$this->forumT_model->saveResponse($user, $idforum_problem, $response);
		redirect(site_url('ForumT/detail_forum?idforum_problem='.$idforum_problem));
	}

	public function detail_forum() {
		// $idforum_problem = $this->input->post('idproblem');
		$idforum_problem = $this->input->get('idforum_problem');
		$problem = $this->forumT_model->getProblemByIdForumProblem($idforum_problem);
		$response = $this->forumT_model->getresponseByIdForumProblem($idforum_problem);
		$data = array(
			'problems' => $problem,
			'responses' => $response
		);
		$this->load->view('detail_forum', $data);
	}

	public function vote() {
		$this->load->model('voteT_model');
		$iduser = 1;
		$idforum_response = $this->input->get('idforum_response');
		$idforum_problem = $this->input->get('idforum_problem');
		$this->voteT_model->saveVote($idforum_response, $iduser);
		redirect(site_url('ForumT/detail_forum?idforum_problem='.$idforum_problem));
	}

	public function resolve() {
		$idforum_problem = 1;
		$this->forumT_model->setEtatProblem($idforum_problem, 1);
	}


	public function remove_problem() {
		$idforum_problem = 1;
		$this->forumT_model->setEtatProblem($idforum_problem, -1);
	}

	
}