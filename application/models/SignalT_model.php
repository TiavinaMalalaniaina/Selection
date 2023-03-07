<?php
    if(!defined('BASEPATH')) exit('No direct script access allowed');
    class SignalT_model extends CI_Model {
        
        public function saveSignal($iduser, $idforum_problem) {
            $script = "INSERT INTO forum_signal_problem (iduser, idforum_problem) VALUES (%s, %s)";
            $script = sprintf($script, $iduser, $idforum_problem);
            $this->db->query($script);
        }

        public function getAllForumProblemToBan() {
            $problems = array();
            $request = "SELECT * FROM forum_problem_retired";
            $query = $this->db->query($request);
            foreach ($query->result_array() as $row) {
                $problems[] = $row;    
            }
            return $problems;
        }
        
        
    }
?>