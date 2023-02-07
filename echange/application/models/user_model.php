<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class User_model extends CI_Model{
        public function getAllUsers(){
            $result = array();
            $query = $this->db->query('SELECT * FROM user');
            foreach($query->result_array() as $row){
                $result[] = $row;
            }
            return $result;
        }
        public function getLastUser(){
            $sql = "SELECT * FROM user order by id desc limit 1";
            $query = $this->db->query($sql);
            $result = $query->row_array();
            return $result;
        }
        public function getByAuthentification($nom,$mdp){
            $sql = sprintf("SELECT * FROM user where nom='%s' and mdp='%s'",$nom,$mdp);
            $query = $this->db->query($sql);
            $result = $query->row_array();
            return $result;
        }
        public function getById($id){
            $sql = sprintf("SELECT * FROM user where id=%u",$id);
            $query = $this->db->query($sql);
            $result = $query->row_array();
            return $result;
        }
        public function saveUser($name,$mdp){
            $sql = sprintf("INSERT INTO user(nom,mdp,estAdmin) values('%s','%s','non')",$name,$mdp);
            $query = $this->db->query($sql);
        }
    }
    
?>