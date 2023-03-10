<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TimeTableD extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('TimeTableD_model');
    }
    public function index()
    {
        $this->load->view('timetableD');
    }
    public function test(){
        $id = 1;
        $matieres = $this->TimeTableD_model->get_matieres($id);
        $tabledays = $this->TimeTableD_model->get_days();
        $idtable = $this->TimeTableD_model->get_user_table($id);
        $cont = $this->TimeTableD_model->get_table_composants($idtable);
        $nm = $this->TimeTableD_model->get_next_matiere($idtable);
        $data[0] = $matieres;
        $data[1] = $tabledays;
        $data[2] = $cont;
        $data[3] = $nm;
        $data[4] = $this->TimeTableD_model->get_current_matiere($idtable);
        $st=json_encode($data); 
        echo $st;
    }
    public function test2(){
        $id = 1;
        $idtable = $this->TimeTableD_model->get_user_table($id);
        if($this->input->get('idmatiere')!==null && $this->input->get('jour')!==null && $this->input->get('debut')!==null && $this->input->get('fin')!==null){
            $fafa = false;
            if($this->input->get('fafa')!==null){
                $fafa = true;
            }
            $this->TimeTableD_model->insert_timetable($idtable,$this->input->get('jour'),$this->input->get('idmatiere'),$this->input->get('debut'),$this->input->get('fin'),$fafa);
        }
        $this->index();
    }
    public function test3(){
        $id = 1;
        if($this->input->get("matiere")!==null){
            $this->TimeTableD_model->insert_matiere($id,$this->input->get("matiere"));
        }
        $this->index();
    }
}
?>