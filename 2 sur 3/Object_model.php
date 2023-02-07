<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Object_model extends CI_Model{
        public function getAllObjects(){
            $result = array();
            $query = $this->db->query('SELECT * FROM objets');
            foreach($query->result_array() as $row){
                $result[] = $row;
            }
            return $result;
        }
        public function getAllObjectsByOwner($owner){
            $result = array();
            $sql = sprintf("SELECT objets.*,photo.nom as photo FROM objets join photo on photo.idObjet=objets.id where objets.idUser='%u'",$owner);
            $query = $this->db->query($sql);
            foreach($query->result_array() as $row){
                $result[] = $row;
            }
            return $result;
        }
        public function getAllObjectsByOthers($owner){
            $result = array();
            $sql = sprintf("SELECT objets.*,photo.nom as photo FROM objets join photo on photo.idObjet=objets.id where objets.idUser!='%u'",$owner);
            $query = $this->db->query($sql);
            foreach($query->result_array() as $row){
                $result[] = $row;
            }
            return $result;
        }
        public function getLastObject(){
            $sql = "SELECT * FROM objets order by id desc limit 1";
            $query = $this->db->query($sql);
            $result = $query->row_array();
            return $result;
        }
        public function getById($id){
            $sql = sprintf("SELECT * FROM objets where id=%u",$id);
            $query = $this->db->query($sql);
            $result = $query->row_array();
            return $result;
        }
        public function saveObject($titre,$description,$prix,$owner,$category){
            $sql = sprintf("INSERT INTO objets values(null,'%s','%s','%d','%s','%u')",$titre,$description,$prix,$owner,$category);
            $query = $this->db->query($sql);
        }
        public function updateOwner($id,$new)
        {
            $sql = sprintf("UPDATE objets SET idUser='%u' where id='%u'",$new,$id);
            $query = $this->db->query($sql);
        }
        public function getAllObjectsPhoto(){
            $result = array();
            $query = $this->db->query('SELECT objets.*,photo.nom as photo FROM objets join photo on photo.idObjet=objets.id');
            foreach($query->result_array() as $row){
                $result[] = $row;
            }
            return $result;
        }

        public function search($mot, $categorie){
        if ($categorie == null) {
                $result = array();
                $sql = $this->db->query("SELECT *FROM objets WHERE titre LIKE '%%s%'", $mot);
                $query = $this->db->query($sql);
                $result = $query->row_array();
            }
            else{
                $result = array();
                $query = $this->db->query("SELECT *FROM objets WHERE titre LIKE '%%s%' AND idCategorie='%u'", $mot, $categorie);
                foreach ($query->result_array() as $row) {
                    $result[] = $row;
                }
            }
            return $result;
        }
        
    }
    
?>
