<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
	public function categoryList(){
        $this->load->library('session');
        $this->load->model('user_model','user');
        
        $this->load->view('header');
        $this->load->view('accueil',$data);
        $this->load->view('footer');
    }
	public function objectByCategory(){
        $this->load->library('session');
        $this->load->model('user_model','user');
        
        $this->load->view('header');
        $this->load->view('accueil',$data);
        $this->load->view('footer');
    }

    
    
}
?>