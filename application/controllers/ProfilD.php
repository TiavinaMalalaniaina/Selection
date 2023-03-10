<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProfilD extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProfilD_model');
    }
    public function index()
    {
        $this->load->view('notebookd');
    }
}
?>
