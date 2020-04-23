<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UsuarioModel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database('pdo');
	}
	public function getUsuario()
	{
		$sql = $this->db->get('usuario');
		return $sql->result();
	}
	public function getUsuarioEspecifico($id)
	{
		$sql = $this->db->get_where('usuario', array('id_usuario' => $id));
		return $sql->result();
	}
	public function validarUsuario(string $nombre_usuario)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules(
			'nombre_usuario',
			'nombre',
			'required|trim',
			array(
				'required'      => 'Debes escribir un %s.'
			)
		);


		$this->form_validation->set_error_delimiters('', '');
		if ($this->form_validation->run() == FALSE) {
			$errors = array(
				'nombre_usuario' => form_error('nombre_usuario')
			);
			echo json_encode($errors);
			$this->output->set_status_header(400);
		} else {
			return true;
		}
	}
}
