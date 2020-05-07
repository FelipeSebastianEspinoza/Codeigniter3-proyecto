<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReporteModel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
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
	public function getHistorialReporte($id)
	{
		$sql = $this->db->get_where('historialyarchivos', array('id_enfermedadreportada' => $id));
		return $sql->result();
	}
	public function getArchivosHistorialReporte()
	{
		$sql = $this->db->get('archivoshistorial');
		return $sql->result();
	}
	public function getHistorialEspecifico($id)
	{
		$sql = $this->db->get_where('historialyarchivos', array('id_historialyarchivos' => $id));
		return $sql->result();
	}
	
	public function validarReporte(string $persona)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules(
			'persona',
			'persona',
			'required|trim',
			array(
				'required'      => 'Debes escribir un %s.'
			)
		);

		$this->form_validation->set_error_delimiters('', '');
		if ($this->form_validation->run() == FALSE) {
			$errors = array(
				'persona' => form_error('persona')
			);
			echo json_encode($errors);
			$this->output->set_status_header(400);
		} else {
			return true;
		}
	}
	public function validarTitulo(string $titulo)
	{ 
		$this->load->library('form_validation');
		$this->form_validation->set_rules(
			'titulo',
			'titulo',
			'required|trim',
			array(
				'required'      => 'Debes escribir un %s.'
			)
		);

		$this->form_validation->set_error_delimiters('', '');
		if ($this->form_validation->run() == FALSE) {
			$errors = array(
				'titulo' => form_error('titulo')
			);
			echo json_encode($errors);
			$this->output->set_status_header(400);
		} else {
			return true;
		}
	}
	public function validarNArchivo(string $narchivo)
	{ 
		$this->load->library('form_validation');
		$this->form_validation->set_rules(
			'narchivo',
			'nombre del archivo',
			'required|trim',
			array(
				'required'      => 'Debes escribir un %s.'
			)
		);

		$this->form_validation->set_error_delimiters('', '');
		if ($this->form_validation->run() == FALSE) {
			$errors = array(
				'narchivo' => form_error('narchivo')
			);
			echo json_encode($errors);
			$this->output->set_status_header(400);
		} else {
			return true;
		}
	}

	public function getArchivosHistorialEspecifico($id)
	{   
		$sql = $this->db->get_where('archivoshistorial', array('id_historialyarchivos' => $id));
		return $sql->result();
	}







}
