<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EnfermedadProfesionalModel extends CI_Model {   
	function __construct()  
	{
		parent:: __construct();
		$this->load->database('pdo');
	} 
 
	public function getEnfermedadProfesional() 
	{
       $sql = $this->db->get('enfermedadesProfesionales');
       return $sql->result();
	}
	public function getEnfermedadProfesionalEspecifico($id) 
	{
	   $sql = $this->db->get_where('enfermedadesProfesionales', array('id_enfermedad' => $id));
       return $sql->result();
	}
	public function insertarEnfermedadProfesional($datos) 
	{  
		$datos = array(
			'nombre'=>$datos['nombre'],
			'descripcion'=>$datos['descripcion']
		);
		if(!$this->db->insert('EnfermedadesProfesionales',$datos)){
			return false;
		}
		return true; 
	}
	public function validarEnfermedadProfesional(string $nombre)
	{ 
	  $this->load->library('form_validation');   
	  $this->form_validation->set_rules('nombre', 'nombre', 'required|trim',
	  array(
			  'required'      => 'Debes escribir un %s.' 
	  )
      ); 
 

     $this->form_validation->set_error_delimiters('', '');  
	  if ($this->form_validation->run() == FALSE)
	  { 
		 $errors = array(
			 'nombre'=>form_error('nombre') 
			 
		 );
	    echo json_encode($errors);
		$this->output->set_status_header(400);
	  }  
	  else
	  {
		  return true;
	  }
	}


   
}
