<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ForumT extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('forumT_model');
	}


	public function index() {
		$this->load->view('welcome_message');
	}

	public function test() {
	}

	public function allProblem() {
		$problems = $this->forumT_model->getNonResolveProblemByFiliere(3);
		$data = array(
			'problems' => $problems
		);
		$this->load->view('problem.php', $data);
	} 

	public function addProblem() {
		// $user = $this->session->userdata('iduser');
		// $problem = $this->input->post('problem');
		// $idfiliere = $this->input->post('idfiliere');

		$user = 1;
		$problem = "Fito vavy Fito vinany";
		$idfiliere = 2;

		$this->forumT_model->saveProblem($user, $idfiliere, $problem);

		redirect(site_url('ForumT/allProblem'));
	}

	public function addAnswer() {
		$user = 2;
		$response = 'NONNNNNN';
		$idforum_problem = 3;
		$this->forumT_model->saveResponse($user, $idforum_problem, $response);

	}

	public function detail_forum() {
		// $idforum_problem = $this->input->post('idproblem');
		$idforum_problem = 1;
		$problem = $this->forumT_model->getProblemByIdForumProblem($idforum_problem);
		$response = $this->forumT_model->getresponseByIdForumProblem($idforum_problem);
		$a = array(
			'problem' => array ($problem, $response)
		);
		$data = array(
			'problems' => $response
		);
		$this->load->view('problem.php', $data);
	}

	public function vote() {
		$this->load->model('voteT_model');
		$idforum_response = 2;
		$iduser = 1;
		$this->voteT_model->saveVote($iduser, $idforum_response);
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