<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Controller {   
	function __construct()
	{
		parent:: __construct();
		$this->load->database('pdo');
		$this->load->model('autentificarModel');
	} 
 
	public function insertarUsuario($datos)
	{
		$datos = array(
			'correo_usuario'=>$datos['correo_usuario'],
			'password_usuario'=>$datos['password_usuario']
		);
		if(!$this->db->insert('Usuario',$datos)){
			return false;
		}
		return true; 
	}

 
	public function validar(string $correo_usuario, string $password_usuario)
	{
 
      $this->load->library('form_validation');  //se ve en la documentacion las validaciones posibles
	  $this->form_validation->set_rules('correo_usuario', 'Email', 'required|trim',
	  array(
			  'required'      => 'Debes escribir un %s.' 
	  )
      );  
	  $this->form_validation->set_rules('password_usuario', 'Password', 'required|trim',
	  array(
			  'required'      => 'Debes escribir una constraseña.',		 
	  )
      );  
     $this->form_validation->set_error_delimiters('', '');  
	  if ($this->form_validation->run() == FALSE)
	  { 
		 $errors = array(
			 'correo_usuario'=>form_error('correo_usuario'),
			 'password_usuario'=>form_error('password_usuario') 
		 );
		 echo json_encode($errors);
		 $this->output->set_status_header(400);
	  }  
	  else
	  {
		  $correo_usuario = $this->input->post('correo_usuario');
		  $password_usuario = $this->input->post('password_usuario'); 
		  if(!$res = $this->autentificarModel->login($correo_usuario, $password_usuario)){ 
		   echo json_encode(array('msg'=>'Verifique sus credenciales'));
		   $this->output->set_status_header(401);
		   exit;
		  }else{
			echo json_encode(array('msg'=>'funcionó'));
		  }
		  
	 











		  /*
		$data = array(
			'correo_usuario'=>$correo_usuario,
			'password_usuario'=>$password_usuario 
		);
		echo json_encode($data); // esto es porque esta esperando el data, sino se manda tira error
		//$this->db->insert('Usuario',$data);
	//	$this->insertarUsuario($data); 
	*/
	  }
	}



 
	
	 
}
?> 