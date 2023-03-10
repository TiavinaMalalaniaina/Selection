<?php

if(!defined('BASEPATH')) exit('No direct script access allowed');
class ProjetJ_model extends CI_Model {

    public function all_projet($iduser) {
        $projects = array();
        $request = "SELECT * FROM projet WHERE iduser=%d";
        $request = sprintf($request, $iduser);
        $query = $this->db->query($request);
        foreach ($query->result_array() as $row) {
            $row['statue'] = $this->getStatus($row['idprojet']);
            $projects[] = $row;    
        }
        return $projects;
    }
    
    
    public function recent_project($iduser, $max) {
        $projects = array();
        $request = "SELECT * FROM projet WHERE iduser=%d ORDER BY idprojet DESC LIMIT %d";
        $request = sprintf($request, $iduser, $max);
        $query = $this->db->query($request);
        foreach ($query->result_array() as $row) {
            $row['statue'] = $this->getStatus($row['idprojet']);
            $projects[] = $row;    
        }
        return $projects;
    }
    
    public function all_tache_projet($idproject) {
        $taches = array();
        $request = "SELECT TPr.idprojet,TPr.idtache,TPr.nom,TPr.temptotal,
                    TPa.temppasser FROM tache_projet TPr 
                    LEFT JOIN temppasser_tache TPa ON TPr.idprojet = TPa.idprojet AND TPr.idtache = TPa.idtache
                    WHERE TPr.idprojet = %d";
        $request = sprintf($request, $idproject);
        $query = $this->db->query($request);
        foreach ($query->result_array() as $row) {
            if($row['temppasser'] >= $row['temptotal'])$row['finish'] = true;
            else $row['finish'] = false;
            $taches[] = $row;    
        }
        return $taches;
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
    
    public function getLatestProjet(){
        $request = "SELECT * FROM projet ORDER BY idprojet DESC LIMIT 1";
        $query = $this->db->query($request);
        foreach ($query->result_array() as $row) {
            $row['statue'] = $this->getStatus($row['idprojet']);
            $row['left_date'] = $this->get_left_date($row['deadline']);
            $projet = $row;    
        }
        return $projet;
    }
    public function getProjetById($idproject){
        $request = "SELECT * FROM projet WHERE idprojet = %d";
        $request = sprintf($request, $idproject);
        $query = $this->db->query($request);
        foreach ($query->result_array() as $row) {
            $row['statue'] = $this->getStatus($idproject);
            $row['left_date'] = $this->get_left_date($row['deadline']);
            $projet = $row;    
        }
        return $projet;
    }
    
    public function getStatus($idproject){  
        $request = "SELECT (TT.temppasser/TP.temptotal::FLOAT)*100 AS statue  FROM temppasser_projet TT
                    JOIN temptotal_projet TP ON TP.idprojet = TT.idprojet
                    WHERE TT.idprojet = %d";
        $request = sprintf($request, $idproject);
        $query = $this->db->query($request);
        $answer = 0;
        foreach ($query->result_array() as $row) {
            $float = floatval($row['statue']); // Cast the string to float
            $answer = number_format($float, 2, '.', '');
        }
        return $answer;
    }
    public function get_left_date($date){
        $date1 = new DateTime(); // date actuelle
        $date2 = new DateTime($date); // date de fin spécifique
        $diff = $date2->diff($date1); // calculer la différence entre les deux dates
        $day = $diff->format('%a');
        $hour = $diff->format('%H');
        $minute = $diff->format('%I');
        $second = $diff->format('%S');
        return $day." jours"." ".$hour." heure(s)"." ".$minute." minute(s)"." ".$second." second(s)";
    }
    public function new_projet($iduser, $project_name, $deadline) {
        $request = "INSERT INTO projet VALUES(DEFAULT,%s,'%s', '%s'::timestamp)";
        $request = sprintf($request, $iduser, $project_name, $deadline);
        $query = $this->db->query($request);
    }
    public function new_tache($idproject, $tache_name, $temptotal) {
        $request = "INSERT INTO tache_projet VALUES( %d, DEFAULT, '%s', %d)";
        $request = sprintf($request, $idproject, $tache_name, $temptotal);
        $query = $this->db->query($request);
    }
    public function partie_fini($idproject, $idtache, $temppasser){
        $request = "INSERT INTO tache_status VALUES( %d, %d, %d)";
        $request = sprintf($request, $idproject, $idtache, $temppasser);
        $query = $this->db->query($request);
    }
    public function supprimer_projet($idprojet){
        $request = "DELETE FROM projet WHERE idprojet = %d";
        $request = sprintf($request, $idprojet);
        $query = $this->db->query($request);
    }
    public function rename($idprojet, $new_name){
        $request = "UPDATE projet SET nom = '%s' WHERE idprojet = %d";
        $request = sprintf($request, $new_name, $idprojet);
        $query = $this->db->query($request);
    }
}

?>