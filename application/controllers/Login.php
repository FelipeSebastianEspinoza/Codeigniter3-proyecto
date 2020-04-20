<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{ //modelo de codeigniter

	function __construct()
	{
		parent::__construct();
		$this->load->model('loginModel');
		$this->load->model('autentificarModel');
	}

	public function index()
	{
		$this->load->view('login');
	}
	public function logout()
	{
		$this->loginModel->logout();
	}

	public function validarajax()
	{
		$this->loginModel->validar($_POST["correo_usuario"], $_POST["password_usuario"]);
	}

	public function validaraUsuarioajax()
	{
		$this->loginModel->validarUsuario($_POST["nombre_usuario"], $_POST["apellido_usuario"], $_POST["correo_usuario"], $_POST["password_usuario"], $_POST["passwordConfirm_usuario"]);
	}

	public function registrarUsuario()
	{
		$this->load->view('usuario/registro');
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
