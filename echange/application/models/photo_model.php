<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Photo_model extends CI_Model{
        public function getAllPhotos(){
            $result = array();
            $query = $this->db->query('SELECT * FROM Photo');
            foreach($query->result_array() as $row){
                $result[] = $row;
            }
            return $result;
        }
        public function getLastPhoto(){
            $sql = "SELECT * FROM Photo order by id desc limit 1";
            $query = $this->db->query($sql);
            $result = $query->row_array();
            return $result;
        }
        public function getById($id){
            $sql = sprintf("SELECT * FROM Photo where id=%u",$id);
            $query = $this->db->query($sql);
            $result = $query->row_array();
            return $result;
        }
        public function savePhoto($nom,$objet){
            $sql = sprintf("INSERT INTO Photo values(null,'%s','%u')",$nom,$objet);
            $query = $this->db->query($sql);
        }
    }
    
?>