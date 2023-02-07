<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Object_model extends CI_Model{
        public function getAllHistorique(){
            $result = array();
            $query = $this->db->query("SELECT * FROM historique");
            foreach($query->result_array() as $row){
                $result[] = $row;
            }
            return $result;
        }
    }
    
?>