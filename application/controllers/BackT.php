<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BackT extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('userT_model');
		if (!$this->userT_model->checkUser()) redirect('logT/');
    }

    public function index() {
        $this->load->model('signalT_model');
        $this->load->model('filiereT_model');
        $problems = $this->signalT_model->getAllForumProblemToBan();   
        $filieres = $this->filiereT_model->getAll();   
        $userNbr = $this->userT_model->countUser();   
        $data = array(
            'problems' => $problems,
            'filieres' => $filieres,
            'number' => $userNbr
        );
        $this->load->view('backOffice', $data);
    }


    public function drop() {
        $this->load->model('forumT_model');
        $idforum_problem = $this->input->get('idforum_problem');
        $this->forumT_model->setEtatProblem($idforum_problem, -1);
        redirect(site_url('BackT/index'));
    }


    public function addFiliere() {
        $this->load->model('filiereT_model');
        $filiere = $this->input->post('filiere');
        $this->filiereT_model->saveFiliere($filiere);
        redirect(site_url('BackT/index'));
    }

}