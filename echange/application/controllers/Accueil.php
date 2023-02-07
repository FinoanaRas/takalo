<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        if($this->session->has_userdata('id')==false){
            redirect('Login/loadLogin');
        }
    }
	public function index()
	{
		redirect('Accueil/loadAccueil');
	}		
	public function loadAccueil(){
        $this->load->library('session');
        $this->load->model('user_model','user');
        $id = $this->session->userdata('id');
        $data = array();
        $data = $this->user->getById($id);
        $this->load->view('header');
        $this->load->view('accueil',$data);
        $this->load->view('footer');
    }

    
    
}
?>