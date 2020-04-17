<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class autentificarModel extends CI_Model {   
	function __construct()  
	{
		parent:: __construct();
		$this->load->database('pdo');
	} 
 
	public function login($correo_usuario, $password_usuario) 
	{
		$data = $this->db->get_where('Usuario', array(
			'correo_usuario'=>$correo_usuario,
			'password_usuario'=>$password_usuario 
		),1);
		if(!$data->result()){
			return false;
		}
		    return $data->row();  
	}

 
	 
	 
}
