<?php
    if(!defined('BASEPATH')) exit('No direct script access allowed');
    class TodoT_model extends CI_Model {
        
        public function save($idUser, $tache) {
        
            $request = "INSERT INTO \"public\".todo( idtodo, iduser, tache, date_tache, etat) VALUES ( default, %s, '%s', default, default )";
            $request = sprintf($request, $idUser, $tache);
            $this->db->query($request);
        
        }


        public function findByUser($idUser) {

            $todo = [];
            $request = "SELECT idtodo,iduser,tache,date_tache,etat FROM todo WHERE iduser=%s AND etat=0";
            $request = sprintf($request, $idUser);
            $query = $this->db->query($request);
            foreach ($query->result_array() as $row) {
                $todo[] = $row;    
            }
            return $todo;

        }


        public function done($idtodo) {
            $request = "UPDATE todo SET etat=1 WHERE idtodo=%s";
            $request = sprintf($request, $idtodo);
            $this->db->query($request);
        }

        public function annuler($idtodo) {
            $request = "UPDATE todo SET etat='-1' WHERE idtodo=%s";
            $request = sprintf($request, $idtodo);
            $this->db->query($request);
        }

    }
?>