<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EdificioModel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database('pdo');
	}

	public function getEdificio()
	{
		$sql = $this->db->get('edificio');
		return $sql->result();
	}
	public function getEdificioEspecifico($id)
	{
		$sql = $this->db->get_where('edificio', array('id_edificio' => $id));
		return $sql->result();
	}
	public function validarEdificio(string $nombre_grifo, string $estado_grifo)
	{ 
	  $this->load->library('form_validation');   
	  $this->form_validation->set_rules('nombre_edificio', 'nombre', 'required|trim',
	  array(
			  'required'      => 'Debes escribir un %s.' 
	  )
      ); 
	  $this->form_validation->set_rules('estado_edificio', 'estado', 'required|trim',
	  array(
			  'required'      => 'Debes escribir un %s.' 
	  )
      ); 

     $this->form_validation->set_error_delimiters('', '');  
	  if ($this->form_validation->run() == FALSE)
	  { 
		 $errors = array(
			 'nombre_edificio'=>form_error('nombre_edificio'),
			 'estado_edificio'=>form_error('estado_edificio')
		 );
	    echo json_encode($errors);
		$this->output->set_status_header(400);
	  }  
	  else
	  {
		  return true;
	  }
	}
	public function getRedHumeda($id)
	{
		$sql = $this->db->get_where('redhumeda', array('id_edificio' => $id));
		return $sql->result();
	}
}
