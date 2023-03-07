<?php
    if(!defined('BASEPATH')) exit('No direct script access allowed');
    class VoteT_model extends CI_Model {
        
        public function saveVote($idforum_response, $iduser) {
            $script = "INSERT INTO forum_vote (idforum_response, iduser) VALUES (%s, %s)";
            $script = sprintf($script, $idforum_response, $iduser);
            $this->db->query($script);
        }
        
    }
?>