<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Proposition_model extends CI_Model{
        public function getAllPropositions(){
            $result = array();
            $query = $this->db->query('SELECT * FROM Proposition');
            foreach($query->result_array() as $row){
                $result[] = $row;
            }
            return $result;
        }
        public function getAllPropositionsForId($id){
            $result = array();
            $sql = sprintf("SELECT * FROM Proposition where idObjet2='%u'",$id);
            $query = $this->db->query($sql);
            foreach($query->result_array() as $row){
                $result[] = $row;
            }
            return $result;
        }
        public function getAllPropositionsById($id){
            $result = array();
            $sql = sprintf("SELECT * FROM Proposition where idObjet1='%u'",$id);
            $query = $this->db->query($sql);
            foreach($query->result_array() as $row){
                $result[] = $row;
            }
            return $result;
        }
        public function getById($id){
            $sql = sprintf("SELECT * FROM Proposition where id=%u",$id);
            $query = $this->db->query($sql);
            $result = $query->row_array();
            return $result;
        }
        public function saveProposition($objet1,$objet2){
            $sql = sprintf("INSERT INTO Proposition values(null,'%s','%u',5)",$objet1,$objet2);
            $query = $this->db->query($sql);
        }
        public function updateStatus($id,$status)
        {
            $sql = sprintf("UPDATE objets SET status='%d' where id='%u'",$status,$id);
            $query = $this->db->query($sql);
        }

        public function countEchange($status){
            $sql = sprintf("SELECT count(*) FROM proposition where status=%u", $status);
            $query = $this->db->query($sql);
            $result = $query->row_array();
            return $result;
        }
    }
    
?>