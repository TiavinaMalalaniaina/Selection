<?php
    if(!defined('BASEPATH')) exit('No direct script access allowed');
    class ForumT_model extends CI_Model {
        
<<<<<<< Updated upstream
        public function saveProblem($idUser, $idFiliere, $problem, $desc) {
            $query = "INSERT INTO forum_problem(proprietaire, idfiliere, problem, description) VALUES (%s, %s, '%s', '%s')";
            $query = sprintf($query, $idUser, $idFiliere, $problem, $desc);
=======
        public function saveProblem($idUser, $idFiliere, $problem) {
            $query = "INSERT INTO forum_problem(proprietaire, idfiliere, problem) VALUES (%s, %s, '%s')";
            $query = sprintf($query, $idUser, $idFiliere, $problem);
>>>>>>> Stashed changes
            $this->db->query($query);
        }
        
        
        public function saveResponse($idUser, $idForum_problem, $response) {
<<<<<<< Updated upstream
            $query = "INSERT INTO forum_response(repondeur, idforum_problem, response) VALUES (%s, %s, '%s')";
=======
            $query = "INSERT INTO forum_problem(repondeur, idforum_problem, response) VALUES (%s, %s, '%s')";
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
            $request = "SELECT * FROM forum_problem_detailled WHERE etat=0";
            $query = $this->db->query($request);
            foreach ($query->result_array() as $row) {
                $problems[] = $row;    
            }
            return $problems;
        }


        public function getAllProblemByFiliere($idFiliere) {
            $problems = array();
            $request = "SELECT * FROM forum_problem_detailled WHERE etat!='-1' AND idFiliere=%s";
            $request = sprintf($request, $idFiliere);
=======
            $request = "SELECT * FROM forum_problem WHERE etat=0";
>>>>>>> Stashed changes
            $query = $this->db->query($request);
            foreach ($query->result_array() as $row) {
                $problems[] = $row;    
            }
            return $problems;
        }


        public function getNonResolveProblemByFiliere($idFiliere) {
            $problems = array();
<<<<<<< Updated upstream
            $request = "SELECT * FROM forum_problem_detailled WHERE idfiliere=%s AND etat=0";
=======
            $request = "SELECT * FROM forum_problem WHERE idfiliere=%s";
>>>>>>> Stashed changes
            $request = sprintf($request, $idFiliere);
            $query = $this->db->query($request);
            foreach ($query->result_array() as $row) {
                $problems[] = $row;    
            }
            return $problems;
        }


        public function getResponseByIdForumProblem($idForum_problem) {
            $response = array();
<<<<<<< Updated upstream
            $request = "SELECT * FROM forum_response_detailled WHERE idforum_problem=%s ORDER BY date_response";
=======
            $request = "SELECT * FROM forum_response WHERE idforum_problem=%s";
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
>>>>>>> Stashed changes
            $request = sprintf($request, $idForum_problem);
            $query = $this->db->query($request);
            foreach ($query->result_array() as $row) {
                $response[] = $row;    
            }
            return $response;
        }

<<<<<<< Updated upstream
        public function getProblemByIdForumProblem($idForum_problem) {
            $request = "SELECT * FROM forum_problem_detailled WHERE idforum_problem=%s";
            $request = sprintf($request, $idForum_problem);
            $query = $this->db->query($request);
            return $query->row_array();
        }

        
        
=======

        public function getDetail_problem($idforum_problem) {
            $request = "SELECT * FROM forum_response ";
        }

>>>>>>> Stashed changes
    }
?>