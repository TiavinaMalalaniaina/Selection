<?php
    if(!defined('BASEPATH')) exit('No direct script access allowed');
    class Mon_compte extends CI_Model {
        public function get_user_info_by_id($iduser) {
            $customers = array();
            $sql = ' SELECT *FROM detailuser DU
                        JOIN "user" U ON U.iduser=DU.iduser     
                        JOIN "carriere" Ca ON Ca.idcarriere=DU.idcarriere     
                        JOIN "niveauetude" Ni ON Ni.idniveauetude=DU.idniveauetude     
                        JOIN "filiere" Fi ON Fi.idfiliere=DU.idfiliere     
                        JOIN "specialite" Sp ON Sp.idspecialite=DU.idspecialite
                        WHERE iduser='.$iduser;
            $query = $this->db->query($iduser);
            foreach ($query->result_array() as $row)$user["user"] = $row;      
            return $user;
        }
        public function update() {
            
        }

    }
?>