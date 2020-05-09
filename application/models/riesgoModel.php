<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RiesgoModel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database('pdo');
	}

	public function getRiesgo()
	{
		$sql = $this->db->get('riesgo');
		return $sql->result();
	}

	public function getRiesgoEspecifico($id)
	{
		$sql = $this->db->get_where('riesgo', array('id_riesgo' => $id));
		return $sql->result();
	}

	public function validarRiesgo(string $nombre)
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
