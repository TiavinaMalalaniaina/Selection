<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccountT extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('userT_model');
		if (!$this->userT_model->checkUser()) redirect('logT/');
    }

    public function index() {
        $idUser = $this->session->userdata('iduser');
        $user = $this->userT_model->getUserById($idUser);
        $data = array(
            'user' => $user
        );
        $this->load->view('myAccount', $data);
    }

    
    public function do_upload()
    {
        $idUser = $this->session->userdata('iduser');
        $config['upload_path']          = './assets/images/profil';
        $config['allowed_types']        = 'gif|jpg|png|webpg|jfif';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());
            redirect(site_url('accountT/'));
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $this->userT_model->modifImage('./assets/images/profil/'.$data['upload_data']['file_name'], $idUser);
            redirect(site_url('accountT/'));
        }
    }


    public function modif() {
        $data = $this->userT_model->getform();
        $this->load->view('modifier_profil', $data);
    }

    public function modifing() {
        $idUser = $this->session->userdata('iduser');
        $fil = $this->input->post('fil');
        $etab = $this->input->post('etab');
        $niv = $this->input->post('niv');
        $car = $this->input->post('car');
        $this->userT_model->update($fil, $etab, $niv, $car, $idUser);
        redirect(site_url('accountT/'));
    }
}