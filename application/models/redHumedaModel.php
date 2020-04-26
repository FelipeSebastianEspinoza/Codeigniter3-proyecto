<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RedHumedaModel extends CI_Model {   
	function __construct()  
	{
		parent:: __construct();
		$this->load->database('pdo');
	} 
 
	public function getRedHumeda() 
	{
       $sql = $this->db->get('redhumeda');
       return $sql->result();
	}
	public function getRedHumedaEspecifico($id) 
	{
	   $sql = $this->db->get_where('redhumeda', array('id_redhumeda' => $id));
       return $sql->result();
	}
	public function insertarRedHumeda($datos) 
	{  
		$datos = array(
			'nombre_redhumeda'=>$datos['nombre_redhumeda'],
			'estado_redhumeda'=>$datos['estado_redhumeda']
		);
		if(!$this->db->insert('redhumeda',$datos)){
			return false;
		}
		return true; 
	}
	public function validarRedHumeda(string $nombre_redhumeda)
	{ 
	  $this->load->library('form_validation');   
	  $this->form_validation->set_rules('nombre_redhumeda', 'nombre', 'required|trim',
	  array(
			  'required'      => 'Debes escribir un %s.' 
	  )
      ); 
 
     $this->form_validation->set_error_delimiters('', '');  
	  if ($this->form_validation->run() == FALSE)
	  { 
		 $errors = array(
			 'nombre_redhumeda'=>form_error('nombre_redhumeda') 
			 
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
