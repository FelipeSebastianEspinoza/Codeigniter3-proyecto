<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReporteModel extends CI_Model {   
	function __construct()  
	{
		parent:: __construct();
		$this->load->database('pdo');
	} 
 
	public function getReporte() 
	{
       $sql = $this->db->get('enfermedades_reportadas');
       return $sql->result();
	}
	public function getEdificio() 
	{
       $sql = $this->db->get('edificio');
       return $sql->result();
	}
	public function getReporteEspecifico($id) 
	{
	   $sql = $this->db->get_where('enfermedades_reportadas', array('id_enfermedadreportada' => $id));
       return $sql->result();
	}
 
	public function validarReporte(string $persona)
	{ 
	  $this->load->library('form_validation');    
	  $this->form_validation->set_rules('persona', 'persona', 'required|trim',
	  array(
			  'required'      => 'Debes escribir un %s.' 
	  )
      ); 
 
     $this->form_validation->set_error_delimiters('', '');  
	  if ($this->form_validation->run() == FALSE)
	  { 
		 $errors = array(
			 'persona'=>form_error('persona') 	 
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
