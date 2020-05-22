<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riesgo extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->model('RiesgoModel');
	}

	function ver()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->model("RiesgoModel");
			$data['riesgo'] = $this->RiesgoModel->getRiesgo();
			$this->menuRiesgo($data);
		} else {
			show_404();
		}
	}

	public function menuRiesgo($data)
	{
		$data = array(
			'loader' => $this->load->view('layout/loader'),
			'header1' => $this->load->view('headers/headerDatatable'),
			'sidebar' => $this->load->view('layout/sidebar'),
			'nav' => $this->load->view('layout/nav'),
			'contenido' => $this->load->view('layout/riesgo/ver', $data),
			'modal' => $this->load->view('layout/riesgo/modal'),
			'script' => $this->load->view('layout/riesgo/script'),
			'logoutMensaje' => $this->load->view('layout/logoutMensaje'),
		);
		$this->load->view('dashboard', $data);
	}

	function registrar()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			if (!$this->RiesgoModel->validarRiesgo($_POST["nombre"])) {
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
							'nombre' => $_POST['nombre'],
							'descripcion' => $_POST['descripcion'],
							'imagen' => $data['file_name']
						);
						$this->db->insert('riesgo', $datos);
					}
				} else {
					$datos = array(
						'nombre' => $_POST['nombre'],
						'descripcion' => $_POST['descripcion'],
						'imagen' => $data['file_name']
					);
					$this->db->insert('riesgo', $datos);
				}
			}
		}
	}

	public function eliminar()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			$this->db->where('id_riesgo', $_POST['id_riesgo']);
			$this->db->delete('riesgo');
		}
	}

	public function editar($id)
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			if ($this->session->userdata('is_logged')) {

				$data['riesgo'] = $this->RiesgoModel->getRiesgoEspecifico($id);
				$data = array(
					'header1' => $this->load->view('headers/headerDatatable'),
					'sidebar' => $this->load->view('layout/sidebar'),
					'nav' => $this->load->view('layout/nav'),
					'contenido' => $this->load->view('layout/riesgo/editar', $data),
					'logoutMensaje' => $this->load->view('layout/logoutMensaje'),
					'footer1' => $this->load->view('footers/footerDatatable')
				);
				$this->load->view('dashboard', $data);
			} else {
				show_404();
			}
		} else {
			show_404();
		}
	}

	function modificar() 
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			if (!$this->RiesgoModel->validarRiesgo($_POST["nombre"])) {
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
							'nombre' => $_POST['nombre'],
							'descripcion' => $_POST['descripcion'],
							'imagen' => $data['file_name']
						);
						$this->db->update('riesgo', $datos, array('id_riesgo' => $_POST["id_riesgo"]));
					}
				} else {
					$datos = array(
						'nombre' => $_POST['nombre'],
						'descripcion' => $_POST['descripcion']
					);
					$this->db->update('riesgo', $datos, array('id_riesgo' => $_POST["id_riesgo"]));
				}
			}
		}
	}

	public function success()
	{
		$this->session->set_flashdata('category_success', 'Se ha creado una nuevo riesgo con éxito');
		redirect('riesgo/ver');
	}
	public function successupdate()
	{
		$this->session->set_flashdata('category_success', 'El riesgo ha sido actualizado con éxito');
		redirect('riesgo/ver');
	}
	public function successdelete()
	{
		$this->session->set_flashdata('category_success', 'El riesgo ha sido eliminado con éxito');
		redirect('riesgo/ver');
	}
}
