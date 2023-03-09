<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ForumT extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('forumT_model');
<<<<<<< Updated upstream
		$this->load->model('userT_model');
		$this->load->helpers('date_helper');
	}
	
=======
	}

>>>>>>> Stashed changes

	public function index() {
		$this->load->view('welcome_message');
	}

	public function test() {
	}

<<<<<<< Updated upstream
	public function problemByFiliere() {
		$idUser = $this->session->userdata('iduser');
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
		$iduser = $this->session->userdata('iduser');
		$idfiliere = $this->input->post('idfiliere');
		$problem = $this->input->post('problem');
		$desc = $this->input->post('desc');
		$this->forumT_model->saveProblem($iduser, $idfiliere, $problem, $desc);
		redirect(site_url('ForumT/problemByFiliere'));
	}

	public function addAnswer() {
		$user = $this->session->userdata('iduser');
		$response = $this->input->post('response');
		$idforum_problem = $this->input->post('idforum_problem');
		$this->forumT_model->saveResponse($user, $idforum_problem, $response);
		redirect(site_url('ForumT/detail_forum?idforum_problem='.$idforum_problem));
=======
	public function allProblem() {
		$problems = $this->forumT_model->getAllNonResolveProblem();
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
		$problem = "Andry Rajoelina";
		$idfiliere = 2;

		$this->forumT_model->saveProblem($user, $idfiliere, $problem);

		redirect(site_url('ForumT/allProblem'));
	}

	public function addAnswer() {
		$user = 2;
		$response = 'Marc Ravalo';
		$idforum_problem = 3;
		$this->forumT_model->saveResponse($user, $idforum_problem, $response);

>>>>>>> Stashed changes
	}

	public function detail_forum() {
		// $idforum_problem = $this->input->post('idproblem');
<<<<<<< Updated upstream
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
		$iduser = $this->session->userdata('iduser');
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

=======
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
>>>>>>> Stashed changes
	
}