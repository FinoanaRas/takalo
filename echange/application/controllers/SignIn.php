<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SignIn extends CI_Controller {

	public function index()
	{
		redirect('SignIn/loadSignIn');
	}		
	public function loadSignIn(){
        $this->load->view('signin');
    }
    public function checkSignIn(){
        $pass = $this->input->post('pass');
        $nom = $this->input->post('nom');
        $this->load->model('user_model','model');
        $this->model->saveUser($nom,$pass);
        $user = $this->model->getLastUser();
        $this->load->library('session');
        $data =array();
        $data['id']=$user['id'];
        $this->session->set_userdata($data);
      
        redirect('Accueil/loadAccueil');
        
    }

}
?>