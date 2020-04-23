<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuario extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->model('usuarioModel');
	}
	function verUsuario()
	{
		if ($this->session->userdata('is_logged')) {
			$id = $this->session->id_usuario;
			$usuario = $this->usuarioModel->getUsuarioEspecifico($id);
			$usuario = array('usuario' => $usuario);
			$this->menuUsuario($usuario);
		} else {
			show_404();
		}
	}
	public function menuUsuario($usuario)
	{

		$data = array(
			'header1' => $this->load->view('headers/headerDatatable'),
			'sidebar' => $this->load->view('layout/sidebar'),
			'nav' => $this->load->view('layout/nav'),
			'contenido' => $this->load->view('usuario/ver', $usuario),
			'logoutMensaje' => $this->load->view('layout/logoutMensaje'),
			'footer1' => $this->load->view('footers/footerDatatable')
		);
		$this->load->view('dashboard', $data);
	}
	public function editar($id)
	{
		$this->load->database('pdo');
		if ($this->session->userdata('is_logged')) {
			$usuario = $this->usuarioModel->getUsuarioEspecifico($id);
			$usuario = array('usuario' => $usuario);
			$data = array(
				'header1' => $this->load->view('headers/headerDatatable'),
				'sidebar' => $this->load->view('layout/sidebar'),
				'nav' => $this->load->view('layout/nav'),
				'contenido' => $this->load->view('usuario/editar', $usuario),
				'logoutMensaje' => $this->load->view('layout/logoutMensaje'),
				'footer1' => $this->load->view('footers/footerDatatable')
			);
			$this->load->view('dashboard', $data);
		} else {
			show_404();
		}
	}
	public function modificarUsuarioajax()
	{
		$this->load->database('pdo');
		if ($this->usuarioModel->validarUsuario($_POST["nombre_usuario"])) {
			$datos = array(
				'nombre_usuario' => $_POST['nombre_usuario'],
				'apellido_usuario' => $_POST['apellido_usuario'],
				'correo_usuario' => $_POST['correo_usuario'],
				'password_usuario' => $_POST['password_usuario']
			);
			$this->db->update('Usuario', $datos, array('id_usuario' => $_POST["id_usuario"]));
		}
	}
	function modificarajax_upload()
	{
		$this->load->database('pdo');
		if (!$this->usuarioModel->validarUsuario($_POST["nombre_usuario"])) {
		} else {
			if (isset($_FILES["image_file"]["name"])) {
				$config['upload_path'] = './assets/upload';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('image_file')) {
					echo $this->upload->display_errors();
				} else {
					$data = $this->upload->data();
					$datos = array(
						'nombre_usuario' => $_POST['nombre_usuario'],
						'apellido_usuario' => $_POST['apellido_usuario'],
						'correo_usuario' => $_POST['correo_usuario'],
						'imagen_usuario' => $data['file_name'],
						'password_usuario' => $_POST['password_usuario']
					);
					$this->db->update('Usuario', $datos, array('id_usuario' => $_POST["id_usuario"]));
				}
			} else {
				$datos = array(
					'nombre_usuario' => $_POST['nombre_usuario'],
					'apellido_usuario' => $_POST['apellido_usuario'],
					'correo_usuario' => $_POST['correo_usuario'],
					'password_usuario' => $_POST['password_usuario']
				);
				$this->db->update('Usuario', $datos, array('id_usuario' => $_POST["id_usuario"]));
			}
		}
	}
	public function success($id)
	{
		$this->session->set_flashdata('category_success', 'Se ha actualizado correctamente');
		$this->verUsuario($id);
	}
	public function successupdate($id)
	{
		$this->session->set_flashdata('category_success', 'Se ha actualizado correctamente');
		$this->verUsuario($id);
	}


	function verUsuarioPrivilegios()
	{ 
		if ($this->session->userdata('is_logged')) {
			$id = $this->session->id_usuario;
			$usuario = $this->usuarioModel->getUsuarioEspecifico($id);
			$usuario = array('usuario' => $usuario);
			$this->menuUsuario($usuario);
		} else {
			show_404();
		}
	}
	public function menuPrivilegios($usuario)
	{ 
	 
		$data = array(
			'header1' => $this->load->view('headers/headerDatatable'),
			'sidebar' => $this->load->view('layout/sidebar'),
			'nav' => $this->load->view('layout/nav'),
			'contenido' => $this->load->view('usuario/ver', $usuario),
			'logoutMensaje' => $this->load->view('layout/logoutMensaje'),
			'footer1' => $this->load->view('footers/footerDatatable')
		);
		$this->load->view('dashboard', $data);
	}
	public function privilegios() 
	{
		$this->load->database('pdo');
		if ($this->session->userdata('is_logged')) {
			$usuario = $this->usuarioModel->getUsuario();
			$usuario = array('usuario' => $usuario);
			$data = array(
				'header1' => $this->load->view('headers/headerDatatable'),
				'sidebar' => $this->load->view('layout/sidebar'),
				'nav' => $this->load->view('layout/nav'),
				'contenido' => $this->load->view('usuario/privilegios', $usuario),
				'logoutMensaje' => $this->load->view('layout/logoutMensaje'),
				'footer1' => $this->load->view('footers/footerDatatable')
			);
			$this->load->view('dashboard', $data);
		} else {
			show_404();
		}
	}




}
