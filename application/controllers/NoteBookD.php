<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NoteBookD extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->load->view('notebookd');
    }
    public function save()
    {
        $this->db->query("insert into notebook(iduser,title,val) values(1,'".$this->input->post("title")."','".$this->input->post("q")."')");
        $this->load->view('notebookd');
    }
}
?>
