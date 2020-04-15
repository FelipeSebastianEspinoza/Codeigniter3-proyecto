<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GrifoModel extends CI_Model {   
	function __construct()  
	{
		parent:: __construct();
		$this->load->database('pdo');
	} 
 
	public function getGrifo() 
	{
       $sql = $this->db->get('grifo');
       return $sql->result();
	}
	public function insertarGrifo($datos) 
	{
		$datos = array(
			'nombre_grifo'=>$datos['nombre_grifo'],
			'estado_grifo'=>$datos['estado_grifo']
		);
		if(!$this->db->insert('Grifo',$datos)){
			return false;
		}
		return true; 
	}
	public function validarGrifo(string $nombre_grifo, string $estado_grifo)
	{ 
	  $this->load->library('form_validation');   
	  $this->form_validation->set_rules('nombre_grifo', 'nombre', 'required|trim',
	  array(
			  'required'      => 'Debes escribir un %s.' 
	  )
      ); 
	  $this->form_validation->set_rules('estado_grifo', 'estado', 'required|trim',
	  array(
			  'required'      => 'Debes escribir un %s.' 
	  )
      ); 

     $this->form_validation->set_error_delimiters('', '');  
	  if ($this->form_validation->run() == FALSE)
	  { 
		 $errors = array(
			 'nombre_grifo'=>form_error('nombre_grifo'),
			 'estado_grifo'=>form_error('estado_grifo')
		 );
	    echo json_encode($errors);
		$this->output->set_status_header(400);
	  }  
	  else
	  {
	   	  $nombre_grifo = $this->input->post('nombre_grifo'); 
		  $estado_grifo = $this->input->post('estado_grifo'); 

			$data = array(
				'nombre_grifo' =>  $nombre_grifo,
				'estado_grifo' =>  $estado_grifo	
			);
			 if(!$this->insertarGrifo($data)){
				echo json_encode('Error');
			 }else{
				echo json_encode('Éxito');  
			 }   
 
	  }
	}


  
}
?> 