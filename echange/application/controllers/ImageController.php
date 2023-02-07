<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ImageController extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        if($this->session->has_userdata('id')==false){
            redirect('Login/loadLogin');
        }
    }
	public function index()
	{
		redirect('ImageController/imageDisplay');
	}		
    public function upload($file,$dossier,$edit)
    {
        $this->load->library('session');
        $fichier = basename($file['name']);
        $taille_maxi = 2000000;
        $taille = filesize($file['tmp_name']);
        $extensions = array('.png', '.gif', '.jpg', '.jpeg','.PNG');
        $extension = strrchr($file['name'], '.');
        //Début des vérifications de sécurité...
        if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
        {
            $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc';
        }
        if($taille>$taille_maxi)
        {
            $erreur = 'Le fichier est trop gros...';
        }
        if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
        {
            //On formate le nom du fichier ici...
            $fichier = strtr($fichier, 
            'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
            'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
            //On remplace ceux qui ont un accent, par les lettres qui n'ont pas
            $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
                if(move_uploaded_file($file['tmp_name'], $dossier . $fichier))
            {
                if($edit!=null){
                    edit_image($edit,$fichier);
                }else{
                    add_image($this->session->userdata('id'),$fichier);
                }
                
                echo "upload mety";
            }else{
                echo "upload tsy mety";
            }
        }
        else{
          echo $erreur;
        }
    }
    public function multiUploads(){
        $dossier = site_url()+'assets/images/upload/';
        $files =$_FILES['images[]'];
        $edit = null;
        if(isset($_POST['edit'])){
            $edit = $_POST['edit'];
        }
        foreach($_FILES['images[]'] as $file => $files){
            upload($file,$dossier,$edit);
        }
    }

    public function imageDisplay(){
        $this->load->view('imageUpload');
    }
}
?>