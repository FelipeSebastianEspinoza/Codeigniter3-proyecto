<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personas_m extends CI_Controller { //modelo de codeigniter
    
	function __construct()
	{
		parent:: __construct();
	}

	public function getPersonas()
	{
	    $this->load->database('pdo');
	    return $this->db->query("SELECT * FROM personas")->result();
	}
 
	public function insertPersonas(string $nombre_personas,string $password_personas)
	{
		$this->load->database('pdo');
		$data = array(
			'nombre_personas' => $nombre_personas,
			'password_personas' => $password_personas
	    );
	    $this->db->insert('personas', $data);
	}

	public function validarPersona()
	{
      $this->load->library('form_validation');  //se ve en la documentacion las validaciones posibles
	  $this->form_validation->set_rules('nombre_personas','Username','required|max_length[10]');
	  $this->form_validation->set_rules('password_personas','Password','required');
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