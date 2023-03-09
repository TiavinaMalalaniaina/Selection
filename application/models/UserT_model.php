<?php
    if(!defined('BASEPATH')) exit('No direct script access allowed');
    class UserT_model extends CI_Model {
        
        public function getUserById($idUser) {
            $request = 'SELECT * FROM user_detailled WHERE idUser=%s';
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
                if ($user['mdp'] == $mdp) {
                    return $user;
                } else {
                    return 'password';
                }
            } 
            return 'username';
        }
        
    }
?>