<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProjetJ extends CI_Controller {

	public function __construct() {
		parent::__construct();
        if (!$this->userT_model->checkUser()) redirect('logT/');
		$this->load->model('ProjetJ_model');
	}

    public function index() {
        $iduser = $this->session->userdata('iduser');
        $latest_projet = $this->ProjetJ_model->getLatestProjet();
        $data = array(
            "all_projet" => $this->ProjetJ_model->all_projet($iduser),
            "projet" => $latest_projet,
            "all_tache_projet" => $this->ProjetJ_model->all_tache_projet($latest_projet['idprojet'])
        );
		$this->load->view('gestion_projet', $data);
	}

    public function filtre($idprojet) {
        $iduser = $this->session->userdata('iduser');
        $data = array(
            "all_projet" => $this->ProjetJ_model->all_projet($iduser),
            "projet" => $this->ProjetJ_model->getProjetById($idprojet),
            "all_tache_projet" => $this->ProjetJ_model->all_tache_projet($idprojet)
        );
		$this->load->view('gestion_projet', $data);
	}

    public function new_projet() {
        $iduser = $this->session->userdata('iduser');
        $project_name = $this->input->post('nom');
        $deadline = $this->input->post('deadline');
        $deadline = str_replace("T", " ", $deadline).":00";
        $this->ProjetJ_model->new_projet($iduser, $project_name, $deadline);
		redirect('ProjetJ');
	}

    public function new_tache($idprojet) {
        $tache_name = $this->input->post('nom');
        $temptotal = $this->input->post('temptotal');
        $this->ProjetJ_model->new_tache($idprojet, $tache_name, $temptotal);
		redirect('ProjetJ/filtre/'.$idprojet);
	}

    public function tache_partie($idprojet){
        $idtache = $this->input->post('idtache');
        $temppasser = $this->input->post('temppasser');
        $this->ProjetJ_model->partie_fini($idprojet, $idtache, $temppasser);
        redirect('ProjetJ/filtre/'.$idprojet);
    }

    public function supprimer_projet($idprojet){
        $this->ProjetJ_model->supprimer_projet($idprojet);
        redirect('ProjetJ');
    }

    public function rename($idprojet){
        $new_name = $this->input->post('nom');
        $this->ProjetJ_model->rename($idprojet, $new_name);
        redirect('ProjetJ/filtre/'.$idprojet);
    }

}

?>