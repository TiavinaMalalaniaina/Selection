<?php
    if(!defined('BASEPATH')) exit('No direct script access allowed');
    class Home_model extends CI_Model {
        public function get_list_customer() {
            $customers = array();
            $query = $this->db->query('SELECT * FROM employe');
            foreach ($query->result_array() as $row) {
                $customers[] = $row;    
            }
            return $customers;
        }
        public function get_list_customer2() {
            $customers = array();
            $query = $this->db->query('SELECT * FROM employe');
            foreach ($query->result_array() as $row) {
                $customers[] = $row;    
            }
            return $customers;
        }

        public function login($user, $mdp) {
            if ($user=="admin" && $mdp=="1234") {
                return true;
            }
            return false;
        }

    }
?>