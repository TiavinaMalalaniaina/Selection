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
<<<<<<< Updated upstream
        }     
=======
        }

        public function get() {
            return 'filie;'
        }
        
        
>>>>>>> Stashed changes

        public function getAll() {
            $filiere = [];
            $request = "SELECT * FROM filiere";
            $query = $this->db->query($request);
            foreach ($query->result_array() as $row) {
                $filiere[] = $row;    
            }
            return $filiere;
        }

    }
?>