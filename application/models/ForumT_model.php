<?php
    if(!defined('BASEPATH')) exit('No direct script access allowed');
    class ForumT_model extends CI_Model {
        
        public function saveProblem($idUser, $idFiliere, $problem) {
            $query = "INSERT INTO forum_problem(proprietaire, idfiliere, problem) VALUES (%s, %s, '%s')";
            $query = sprintf($query, $idUser, $idFiliere, $problem);
            $this->db->query($query);
        }
        
        
        public function saveResponse($idUser, $idForum_problem, $response) {
            $query = "INSERT INTO forum_problem(repondeur, idforum_problem, response) VALUES (%s, %s, '%s')";
            $query = sprintf($query, $idUser, $idForum_problem, $response);
            $this->db->query($query);
        }


        public function setEtatProblem($idForum_problem, $etat) {
            $query = "UPDATE forum_problem SET etat=%s WHERE idforum_problem=%s";
            $query = sprintf($query, $etat, $idForum_problem);
            $this->db->query($query);
        }

        public function setEtatResponse($idForum_problem, $etat) {
            $query = "UPDATE forum_problem SET etat=%s WHERE idforum_problem=%s";
            $query = sprintf($query, $etat, $idForum_problem);
            $this->db->query($query);
        }


        public function getAllNonResolveProblem() {
            $problems = array();
            $request = "SELECT * FROM forum_problem WHERE etat=0";
            $query = $this->db->query($request);
            foreach ($query->result_array() as $row) {
                $problems[] = $row;    
            }
            return $problems;
        }


        public function getNonResolveProblemByFiliere($idFiliere) {
            $problems = array();
            $request = "SELECT * FROM forum_problem WHERE idfiliere=%s AND etat=0";
            $request = sprintf($request, $idFiliere);
            $query = $this->db->query($request);
            foreach ($query->result_array() as $row) {
                $problems[] = $row;    
            }
            return $problems;
        }


        public function getResponseByIdForumProblem($idForum_problem) {
            $response = array();
            $request = "SELECT * FROM forum_response_vote WHERE idforum_problem=%s";
            $request = sprintf($request, $idForum_problem);
            $query = $this->db->query($request);
            foreach ($query->result_array() as $row) {
                $response[] = $row;    
            }
            return $response;
        }

        public function getProblemByIdForumProblem($idForum_problem) {
            $response = array();
            $request = "SELECT * FROM forum_problem WHERE idforum_problem=%s";
            $request = sprintf($request, $idForum_problem);
            $query = $this->db->query($request);
            foreach ($query->result_array() as $row) {
                $response[] = $row;    
            }
            return $response;
        }

        
        
    }
?>