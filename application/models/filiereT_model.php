<?php
    if(!defined('BASEPATH')) exit('No direct script access allowed');
    class FiliereT_model extends CI_Model {

        public function saveFiliere($filiere) {
            $query = "INSERT INTO filiere (valeur) VALUES ('%s')";
            $query = sprintf($query, $filiere);
            $this->db->query($query);
        }

        public function updateFiliere($idfiliere, $filiere) {
            $query = "UPDATE filiere SET valeur='%s' WHERE idfiliere=%s";
            $query = sprintf($query, $filiere, $idfiliere);
            $this->db->query($query);
        }

        public function get() {
            return 'filie;'
        }
        
        

    }
?>