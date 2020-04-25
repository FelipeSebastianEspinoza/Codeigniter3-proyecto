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
	public function validarUsuario(string $nombre_usuario, string $apellido_usuario, string $correo_usuario, string $password_usuario, string $passconf)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules(
			'nombre_usuario',
			'nombre',
			'required|trim',
			array('required'  => 'Debes escribir un %s.')
		);
		$this->form_validation->set_rules(
			'apellido_usuario',
			'apellido',
			'required|trim',
			array('required'  => 'Debes escribir un %s.')
		);
		$this->form_validation->set_rules('correo_usuario', 'correo', 'required',        array(
			'required'      => 'Debes escribir un correo %s.'

		));
		$this->form_validation->set_rules(
			'password_usuario',
			'contraseña',
			'required',
			array('required' => 'Debes escribir una %s.')
		);
		$this->form_validation->set_rules(
			'passconf',
			'contraseña',
			'trim|required|matches[password_usuario]',
			array(
				'matches' => 'Las contraseñas no coinciden',
				'required'      => 'Debes escribir un  %s.'

			)
		);


		$this->form_validation->set_error_delimiters('', '');
		if ($this->form_validation->run() == FALSE) {
			$errors = array(
				'nombre_usuario' => form_error('nombre_usuario'),
				'apellido_usuario' => form_error('apellido_usuario'),
				'correo_usuario' => form_error('correo_usuario'),
				'password_usuario' => form_error('password_usuario'),
				'passconf' => form_error('passconf')
			);
			echo json_encode($errors);
			$this->output->set_status_header(400);
		} else {
			return true;
		}
	}
}
