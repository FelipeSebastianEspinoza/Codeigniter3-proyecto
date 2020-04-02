<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_c extends CI_Controller { //modelo de codeigniter
  
	function __construct()
	{
		parent:: __construct();
		$this->load->model('usuarios_m');
	}
 
 
  
	public function crear()
	{
	    $this->load->view('headers/header1');
		$this->load->view('usuarios/crearUsuarios');
		$this->load->view('footers/footer1');
	}
 
	public function insertarUsuario()
	{
		if($this->usuarios_m->validarUsuario($_POST["correo_usuario"],$_POST["password_usuario"])==FALSE){
			$valier = array('valier' => validation_errors());
			$this->load->view('headers/header1');
			$this->load->view('usuarios/crearUsuarios',$valier);
			$this->load->view('footers/footer1');
		}else{
		 	$this->usuarios_m->insertUsuario($_POST["correo_usuario"],$_POST["password_usuario"]);
			$this->load->view('forms/formsuccess');
		} 
	}  
 
  
}
