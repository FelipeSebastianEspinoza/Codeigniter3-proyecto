<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller { //modelo de codeigniter
  
	function __construct()
	{
		parent:: __construct();
		$this->load->model('loginModel');
		$this->load->model('autentificarModel');
	} 
 
	public function index(){
        $this->load->view('login');
	}

	public function validarajax(){
 
     $this->loginModel->validar($_POST["correo_usuario"],$_POST["password_usuario"]);
       
	}

	/*
	public function create($data){
 	if($this->loginModel->validar($_POST["correo_usuario"],$_POST["password_usuario"])==FALSE){
			$data = array('msg' => validation_errors());
			$this->load->view('login',$data);
		}else{  
			 
			$data = array(
				'correo_usuario'=>$_POST["correo_usuario"],
				'password_usuario'=>$_POST["password_usuario"] 
			);  

			if(!$this->loginModel->create($data)){
				$data['msg']='error';
				$this->load->view('login',$data);
			}else{ 
				$data['msg']='exito';
				$this->load->view('login',$data);
			}
 		}  
	}  
	*/

 


 
 
 
 
 
 
  
}
