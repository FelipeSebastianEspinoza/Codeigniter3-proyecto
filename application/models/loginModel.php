<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Controller {   
	function __construct()
	{
		parent:: __construct();
		$this->load->database('pdo');
		$this->load->model('autentificarModel');
		$this->load->library('session'); 
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
		  }
			$data = array(
				'correo_usuario' => $res->correo_usuario,
				'nombre_usuario' => $res->nombre_usuario,
				'tipo_usuario' => $res->tipo_usuario, 
				'imagen_usuario' => $res->imagen_usuario, 
				'is_logged' => TRUE,
			);
			$this->session->set_userdata($data);
			$this->session->set_flashdata('msg','Bienvenido '.$data['correo_usuario']); //flashdata desaparece al recargar
			echo json_encode(array('url'=>base_url('dashboard')));
	  }
	}
  
	public function logout(){
		$vars = array('correo_usuario','tipo','is_logged');
		$this->session->unset_userdata($vars);
		session_destroy();
	    $this->load->view('login');
		
	}

	public function validarUsuario(string $nombre_usuario, string $apellido_usuario, string $correo_usuario, string $password_usuario, string $passwordConfirm_usuario)
	{
	  $this->load->library('form_validation');   
	  $this->form_validation->set_rules('nombre_usuario', 'nombre', 'required|trim',
	  array(
			  'required'      => 'Debes escribir un %s.' 
	  )
      ); 
	  $this->form_validation->set_rules('apellido_usuario', 'apellido', 'required|trim',
	  array(
			  'required'      => 'Debes escribir un %s.' 
	  )
      ); 
	  $this->form_validation->set_rules('correo_usuario', 'correo', 'required|trim|is_unique[usuario.correo_usuario]',
	  array(
			  'required'      => 'Debes escribir un %s.',
			  'is_unique'     => 'Este %s ya se ecuentra registrado.' 
			   
	  )
      );  
	  $this->form_validation->set_rules('password_usuario', 'contraseña', 'required|trim',
	  array(
			  'required'      => 'Debes escribir una %s.'  
	  )
	  );
	  $this->form_validation->set_rules('passwordConfirm_usuario', 'contraseña', 'trim|required|matches[password_usuario]',
	  array(
			  'required'      => 'Debes escribir una %s.',
			  'matches'      => 'Las %ss deben coincidir.'   
	  )
	  );
     $this->form_validation->set_error_delimiters('', '');  
	  if ($this->form_validation->run() == FALSE)
	  { 
		 $errors = array(
			 'nombre_usuario'=>form_error('nombre_usuario'),
			 'apellido_usuario'=>form_error('apellido_usuario'),
			 'correo_usuario'=>form_error('correo_usuario'), 
			 'password_usuario'=>form_error('password_usuario'), 
			 'passwordConfirm_usuario'=>form_error('passwordConfirm_usuario'), 
		 );
	    echo json_encode($errors);
		$this->output->set_status_header(400);
	  }  
	  else
	  {
	   	  $nombre_usuario = $this->input->post('nombre_usuario'); 
		  $apellido_usuario = $this->input->post('apellido_usuario'); 
		  $correo_usuario = $this->input->post('correo_usuario');
		  $password_usuario = $this->input->post('password_usuario'); 
 
 
			$data = array(
				'nombre_usuario' =>  $nombre_usuario,
				'apellido_usuario' =>  $apellido_usuario,
				'correo_usuario' => $correo_usuario, 	
				'password_usuario' => $password_usuario, 		
			);
			 $this->db->insert('Usuario',$data); 
			 
		 
			 $this->session->set_userdata($data);
			 $this->session->set_flashdata('msg','Bienvenido '.$data['correo_usuario']); //flashdata desaparece al recargar
			 echo json_encode(array('url'=>base_url('dashboard')));
	  }
	}




  	 
}
?> 