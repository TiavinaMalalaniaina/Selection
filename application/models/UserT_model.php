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
        
    }
?>