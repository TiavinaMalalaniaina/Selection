<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LogT extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('userT_model');
		if ($this->userT_model->checkUser()) redirect(site_url('welcome'));
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
        redirect('welcome');
    }

    public function logout() {
        $this->userT_model->logout();
        redirect(site_url('logT'));
    }
    public function signuper1(){
        $data = [];
        $data['nom'] = '';
        $data['prenom'] = '';
        $data['contact'] = '';
        $data['email'] = '';
        $data['mdp'] = '';
        if($this->session->has_userdata("insc")){
            $data['nom'] = $this->session->userdata("nom");
            $data['prenom'] = $this->session->userdata("prenom");
            $data['contact'] = $this->session->userdata("contact");
            $data['email'] = $this->session->userdata("email");
            $data['mdp'] = $this->session->userdata("mdp");
        }
        $this->load->view("inscription1",$data);
    }
    public function signuper2(){
        $this->session->set_userdata("insc",0);
        $this->session->set_userdata("nom",$this->input->get("nom"));
        $this->session->set_userdata("prenom",$this->input->get("prenom"));
        $this->session->set_userdata("contact",$this->input->get("contact"));
        $this->session->set_userdata("email",$this->input->get("email"));
        $this->session->set_userdata("mdp",$this->input->get("mdp"));
        $data = $this->userT_model->getform();
        $this->load->view("inscription2",$data);
    }
    public function signuper3(){
        $data['nom'] = $this->session->userdata("nom");
        $data['prenom'] = $this->session->userdata("prenom");
        $data['contact'] = $this->session->userdata("contact");
        $data['email'] = $this->session->userdata("email");
        $data['mdp'] = $this->session->userdata("mdp");
        $this->db->query("INSERT INTO \"public\".\"user\"(nom, prenom, contact, email, \"password\" ) VALUES ('".$data['nom']."', '".$data['prenom']."','".$data['contact']."', '".$data['email']."', '".$data['mdp']."')");
        $req = " select max(iduser) as m from \"public\".\"user\"";
        $query = $this->db->query($req);
        $row = $query->row_array();
        $id =  $row['m'];
        $this->db->query("insert into \"public\".detailuser(iduser,idfiliere,idniveauetude,idcarriere,idetablissement,specialite) values(".$id.",".$this->input->get("fil").",".$this->input->get("niv").",".$this->input->get("car").",".$this->input->get("etab").",'".$this->input->get("specialite")."')");
        redirect('LogT/index');
    }
}