<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExtintorModel extends CI_Model {   
	function __construct()  
	{
		parent:: __construct();
		$this->load->database('pdo');
	} 
 
	public function getExtintor() 
	{
       $sql = $this->db->get('extintor');
       return $sql->result();
	}
	public function getEdificio() 
	{
       $sql = $this->db->get('edificio');
       return $sql->result();
	}
	public function getExtintorEspecifico($id) 
	{
	   $sql = $this->db->get_where('extintor', array('id_extintor' => $id));
       return $sql->result();
	}
	public function insertarExtintor($datos) 
	{  
		$datos = array(
			'nombre'=>$datos['nombre'],
			'estado'=>$datos['estado']
		);
		if(!$this->db->insert('extintor',$datos)){
			return false;
		}
		return true; 
	}
	public function validarExtintor(string $nombre)
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
