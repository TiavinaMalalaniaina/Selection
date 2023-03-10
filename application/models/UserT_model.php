<?php
    if(!defined('BASEPATH')) exit('No direct script access allowed');
    class UserT_model extends CI_Model {
        
        public function countUser() {
            $request = 'SELECT count(*) nbr FROM "user"';
            $query = $this->db->query($request);
            $user = $query->row_array();
            return $user['nbr'];
        }

        public function getUserById($idUser) {
            $request = 'SELECT * FROM user_detailled WHERE iduser=%d';
            $request = sprintf($request, $idUser);
            $query = $this->db->query($request);
            $user = $query->row_array();
            return $user;
        }

        public function login($username, $mdp) {
            $request = "SELECT * FROM \"user\" WHERE email='%s'";
            $request = sprintf($request, $username);
            $query = $this->db->query($request);
            if ($query->result_array()) {
                $user = $query->row_array(); 
                if ($user['password'] == $mdp) {
                    return $user;
                } else {
                    return 'password';
                }
            } 
            return 'username';
        }

        public function logout() {
            $this->session->unset_userdata('iduser');
            $this->session->sess_destroy();
        }

        public function checkUser() {
            if (!$this->session->has_userdata('iduser')) return false;
            return true;
        }
        
    }
?>