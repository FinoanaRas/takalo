<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		redirect('Login/loadLogin');
	}		
	public function loadLogin(){
        $this->load->view('login');
    }
    public function checkLogin(){
        $email = $this->input->post('email');
        $pass = $this->input->post('pass');
        $this->load->model('user_model','model');
        $user = $this->model->getByAuthentification($email,$pass);
        if($user==null){
            redirect('Login/loadLogin');
        }else{
            $this->load->library('session');
            $data =array();
            $data['id']=$user['id'];
            $this->session->set_userdata($data);
            if($user['estadmin']=="oui"){
                redirect('Accueil/loadAccueil?admin'); //admin
            }else{
                redirect('Accueil/loadAccueil');
            }
        }
    }
    public function logout(){
        $this->load->library('session');
        $data =array('id');
        $this->session->unset_userdata($data);
        redirect('Login/loadLogin');
    }
}
?>