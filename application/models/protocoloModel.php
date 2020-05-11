<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProtocoloModel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database('pdo');
	}

	public function getProtocolo()
	{
		$sql = $this->db->get('protocolo');
		return $sql->result();
	}

	public function getProtocoloEspecifico($id)
	{
		$sql = $this->db->get_where('protocolo', array('id_protocolo' => $id));
		return $sql->result();
	}
	public function validarProtocolo(string $nombre)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules(
			'nombre',
			'nombre',
			'required|trim',
			array(
				'required'      => 'Debes escribir un %s.'
			)
		);

		$this->form_validation->set_error_delimiters('', '');
		if ($this->form_validation->run() == FALSE) {
			$errors = array(
				'nombre' => form_error('nombre')
			);
			echo json_encode($errors);
			$this->output->set_status_header(400);
		} else {
			return true;
		}
	}


	public function getUnidad($id)
	{
		$sql = $this->db->get_where('unidad', array('id_protocolo' => $id));
		return $sql->result();
	}





	public function getUnidadAnexos()
	{
		$sql = $this->db->get('unidad_anexos');
		return $sql->result();
	}
	public function getUnidadEspecifico($id)
	{
		$sql = $this->db->get_where('unidad', array('id_unidad' => $id));
		return $sql->result();
	}

 
	public function validarNombre(string $nombre)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules(
			'nombre', 
			'nombre',
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

	public function getArchivosUnidadEspecifico($id)
	{
		$sql = $this->db->get_where('unidad_anexos', array('id_unidad' => $id));
		return $sql->result();
	}
}
