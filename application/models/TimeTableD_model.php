<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class TimeTableD_model extends CI_Model
{
    public function get_matieres($id){
        $i = 0;
        $result = [];
        $sql = $this->db->query("select * from matiere where iduser=".$id);
        foreach ($sql->result_array() as $row){
            $result[$i]['id'] = $row['id'];
            $result[$i]['nom'] = $row['nom'];
            $i++;
        }
        return $result;
    }
    public function get_days(){
        $i = 0;
        $result = [];
        $sql = $this->db->query("select * from tableday");
        foreach ($sql->result_array() as $row){
            $result[0][$i][0] = $row['id'];
            $result[0][$i][1] = $row['nom'];
            $result[1][$i] = $row['nom'];
            $i++;
        }
        return $result;
    }
    public function get_table_composants($idtimetable){
        $i = 0;
        $result = [];
        $sql = $this->db->query("select * from timetabledetail join matiere on matiere.id=timetabledetail.idmatiere where idtimetable=".$idtimetable);
        foreach ($sql->result_array() as $row){
            $result[$i] = array(
                'title' => $row['nom'],
                'start' => "2022-08-0".$row['idtableday']."T".$row['timestart'],
                'end' => "2022-08-0".$row['idtableday']."T".$row['timeend']
            );
            $i++;
        }
        return $result;
    }
    public function get_user_table($id){
        $req = " select * from timetable where iduser=".$id;
        $query = $this->db->query($req);
        $row = $query->row_array();
        return $row['id'];
    }
    public function insert_matiere($id,$nom){
        $req = " select * from matiere where iduser=".$id." and nom like '%".$nom."%'";
        $query = $this->db->query($req);
        $row = $query->row_array();
        if(!isset($row)){
            $data = array(
                'nom'=>$nom,
                'iduser'=>$id
            );
            $this->db->insert('matiere',$data);
        }
    }
    public function insert_timetable($idtimetable,$idtableday,$idmatiere,$start,$end,$replace){
        if($replace){
            $req = "delete from timetabledetail where idtimetable=".$idtimetable." and idtableday=".$idtableday." and ((timestart<='".$start."' and '".$end."'<=timeend) or ('".$start."'<timestart and timestart<'".$end."') or ('".$start."'<timeend and timeend<'".$end."'))";
            $this->db->query($req);
        }
        $this->db->query("insert into timetabledetail(idtimetable,idtableday,idmatiere,timestart,timeend) values(".$idtimetable.",".$idtableday.",".$idmatiere.",'".$start."','".$end."')");
    }
    public function get_next_matiere($idtimetable){
        $daynum = date("N",strtotime(date('l')));
        $hr = date('H:i');
        $req = "select * from (select EXTRACT(EPOCH from(timetabledetail.timestart-'".$hr."'))/60 as diff,matiere.nom,matiere.id from timetabledetail join matiere on matiere.id=timetabledetail.idmatiere where idtimetable=".$idtimetable." and idtableday=".$daynum.") as p where diff>0 order by diff asc limit 1";
        // echo $req;
        $query = $this->db->query($req);
        $row = $query->row_array();
        return $row;
    }
    public function get_current_matiere($idtimetable){
        $daynum = date("N",strtotime(date('l')));
        $h = date('H:i');
        $req = "select * from timetabledetail join matiere on matiere.id=timetabledetail.idmatiere where idtimetable=".$idtimetable." and idtableday=".$daynum." and timestart<='".$h."' and timeend<='".$h."'";
        // echo $req;
        $query = $this->db->query($req);
        $row = $query->row_array();
        if(isset($row)){
            return "Cours de ".$row['nom']."en progression";   
        }
        return "Aucun cours en progression";
    }
}
?>