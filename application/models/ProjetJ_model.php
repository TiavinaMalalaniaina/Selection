<?php

if(!defined('BASEPATH')) exit('No direct script access allowed');
class ProjetJ_model extends CI_Model {

    public function all_projet($iduser) {
        $projects = array();
        $request = "SELECT * FROM projet WHERE iduser=%s";
        $request = sprintf($request, $iduser);
        $query = $this->db->query($request);
        foreach ($query->result_array() as $row) {
            $projects[] = $row;    
        }
        return $projects;
    }

    public function new_projet($iduser, $project_name) {
        $projects = array();
        $request = "INSERT INTO projet VALUES(DEFAULT,%s,'%s')";
        $request = sprintf($request, $iduser, $project_name);
        $query = $this->db->query($request);
        return $projects;
    }

    public function all_tache_projet($idproject) {
        $taches = array();
        $request = "SELECT * FROM tache_projet TPr 
                    JOIN temppasser_tache TPa ON TPr.idproject = TPa.idproject AND TPr.idtache = TPa.idtache
                    WHERE TPr.idproject = %s";
        $request = sprintf($request, $idproject);
        $query = $this->db->query($request);
        foreach ($query->result_array() as $row) {
            $taches[] = $row;    
        }
        return $taches;
    }

    public function isFinish($taches){
        return true;
    }

    public function projet_info($idproject) {
        $request = "SELECT * FROM projet P
                    JOIN temprestant_projet TR ON P.idprojet = TR.idprojet
                    WHERE idprojet = {}";
        $request = sprintf($request, $idproject);
        $query = $this->db->query($request);
        foreach ($query->result_array() as $row) {
            $projet = $row;    
        }
        return $projet;
    }


}

?>