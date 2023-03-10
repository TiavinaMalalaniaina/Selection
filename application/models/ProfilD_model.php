<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfilD_model extends CI_Model
{
    public function getdata($id){
        $req = " select * from user where iduser=".$id;
        $query = $this->db->query($req);
        $row = $query->row_array();
        return $row['id'];
    }
}
?>