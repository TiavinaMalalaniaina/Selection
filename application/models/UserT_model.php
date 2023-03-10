<?php
    if(!defined('BASEPATH')) exit('No direct script access allowed');
    class UserT_model extends CI_Model {
        
        public function countUser() {
            $request = 'SELECT count(*) nbr FROM "user"';
            $query = $this->db->query($request);
            $user = $query->row_array();
            return $user['nbr'];
        }

        public function update($fil, $etab, $niv, $car, $idUser) {
            $request = "UPDATE detailuser SET idfiliere=%s,idetablissement=%s,idniveauetude=%s,idcarriere=%s WHERE iduser=%s";
            $request = sprintf($request, $fil, $etab, $niv, $car, $idUser);
            $this->db->query($request);
        }

        public function getUserById($idUser) {
            $request = 'SELECT * FROM user_detailled WHERE iduser=%d';
            $request = sprintf($request, $idUser);
            $query = $this->db->query($request);
            $user = $query->row_array();
            return $user;
        }

        public function modifImage($name, $idUser) {
            $request = "UPDATE \"user\" SET img='%s' WHERE iduser=%s";
            $request = sprintf($request, $name, $idUser);
            $this->db->query($request);
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
        public function getform(){
            $i = 0;
            $carrieres = [];
            $sql = $this->db->query("select * from carriere");
            foreach ($sql->result_array() as $row){
                $carrieres[$i][0] = $row['idcarriere'];
                $carrieres[$i][1] = $row['valeur'];
                $i++;
            }
            $i = 0;
            $filieres = [];
            $sql = $this->db->query("select * from filiere");
            foreach ($sql->result_array() as $row){
                $filieres[$i][0] = $row['idfiliere'];
                $filieres[$i][1] = $row['valeur'];
                $i++;
            }$i = 0;
            $niveaus = [];
            $sql = $this->db->query("select * from niveauetude");
            foreach ($sql->result_array() as $row){
                $niveaus[$i][0] = $row['idniveauetude'];
                $niveaus[$i][1] = $row['valeur'];
                $i++;
            }$i = 0;
            $etab = [];
            $sql = $this->db->query("select * from etablissement");
            foreach ($sql->result_array() as $row){
                $etab[$i][0] = $row['id'];
                $etab[$i][1] = $row['nom'];
                $i++;
            }
            $data = [];
            $data['fil'] = $filieres;
            $data['etab'] = $etab;
            $data['niv'] = $niveaus;
            $data['car'] = $carrieres;
            return $data;
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