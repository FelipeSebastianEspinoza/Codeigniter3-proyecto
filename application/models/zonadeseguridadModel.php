<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ZonaDeSeguridadModel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database('pdo');
	}

	public function getZonaDeSeguridad()
	{
		$sql = $this->db->get('zonadeseguridad');
		return $sql->result();
	}
	public function getEdificio()
	{
		$sql = $this->db->get('edificio');
		return $sql->result();
	}
	public function getZonaDeSeguridadEspecifico($id)
	{
		$sql = $this->db->get_where('zonadeseguridad', array('id_zonadeseguridad' => $id));
		return $sql->result();
	}
	public function insertarZonaDeSeguridad($datos)
	{
		$datos = array(
			'nombre' => $datos['nombre'] 
			 
		);
		if (!$this->db->insert('zonadeseguridad', $datos)) {
			return false;
		}
		return true;
	}
	public function validarZonaDeSeguridad(string $nombre)
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
}
