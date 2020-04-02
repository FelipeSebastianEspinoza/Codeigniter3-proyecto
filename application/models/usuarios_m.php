<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_m extends CI_Controller { //modelo de codeigniter
    
	function __construct()
	{
		parent:: __construct();
	}

	public function insertUsuario(string $correo_usuario,string $password_usuario)
	{
		$this->load->database('pdo');
		$data = array(
			'correo_usuario' => $correo_usuario,
			'password_usuario' => $password_usuario
	    );
	    $this->db->insert('usuario', $data);
	}

	public function validarUsuario()
	{
      $this->load->library('form_validation');  //se ve en la documentacion las validaciones posibles
	  $this->form_validation->set_rules('correo_usuario', 'Email', 'required');
	  $this->form_validation->set_rules('password_usuario','Password','required');
	  
	  if ($this->form_validation->run() == FALSE)
	  { 
		return FALSE; 	 
	  } 
	  else
	  {
		return TRUE; 	 
	  }
	}
}
?> 