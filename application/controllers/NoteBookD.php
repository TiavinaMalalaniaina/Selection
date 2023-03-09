<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NoteBookD extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('NoteBookD_model');
    }
    public function index()
    {
        $this->load->view('notebookd');
    }
    public function save()
    {
        $idnote = $this->input->post("idnote");
        if($idnote=="0"){
            $this->db->query("insert into notebook(iduser,title,val) values(1,'".$this->input->post("title")."','".$this->input->post("q")."')");
        }
        else {
            $this->db->query("update notebook set title='".$this->input->post("title")."',val='".$this->input->post("q")."' where id=".$idnote."");
        }
        $this->load->view('notebookd');
    }
    public function loadall(){
        $data = $this->NoteBookD_model->get_list(1);
        echo json_encode($data);
    }
}
?>
