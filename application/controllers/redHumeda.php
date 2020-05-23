<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RedHumeda extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->model('RedHumedaModel');
	}
	public function crearRedHumedaajax()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			if ($this->RedHumedaModel->validarRedHumeda($_POST["nombre"])) {
				$datos = array(
					'nombre' => $_POST['nombre'],
					'estado' => $_POST['estado'],
					'id_edificio' => $_POST['id_edificio'],
					'ubicacion' => $_POST['ubicacion'],
					'posy' => $_POST['form_y'],
					'posx' => $_POST['form_x']
				);
				$this->db->insert('RedHumeda', $datos);
			}
		}
	}
	function ver()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->model("RedHumedaModel");
			$data['edificio'] = $this->RedHumedaModel->getEdificio();
			$data['redhumeda'] = $this->RedHumedaModel->getRedHumeda();
			$this->menuRedHumeda($data);
		} else {
			show_404();
		}
	}
	public function menuRedHumeda($data)
	{
		$data = array(
			'loader' => $this->load->view('layout/loader'),
			'header1' => $this->load->view('headers/headerDatatable'),
			'sidebar' => $this->load->view('layout/sidebar'),
			'nav' => $this->load->view('layout/nav'),
			'content' => $this->load->view('layout/redhumeda/ver', $data),
			'modal' => $this->load->view('layout/redhumeda/modal'),
			'script' => $this->load->view('layout/redhumeda/script'),
			'logoutMensaje' => $this->load->view('layout/logoutMensaje'),
			'footer1' => $this->load->view('footers/footerDatatable')
		);
		$this->load->view('dashboard', $data);
	}
	public function success()
	{
		$this->session->set_flashdata('category_success', 'Se ha creado una nueva redhúmeda con éxito');
		redirect('redhumeda/ver');
	}
	public function successupdate()
	{
		$this->session->set_flashdata('category_success', 'Se ha actualizado la redhumeda con éxito');
		redirect('redhumeda/ver');
	}
	public function successdelete()
	{
		$this->session->set_flashdata('category_success', 'Se ha eliminado la redhumeda con éxito');
		redirect('redhumeda/ver');
	}
	function ajax_upload()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			if (!$this->RedHumedaModel->validarRedHumeda($_POST["nombre"])) {
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
							'estado' => $_POST['estado'],
							'ubicacion' => $_POST['ubicacion'],
							'imagen' => $data['file_name'],
							'id_edificio' => $_POST['id_edificio'],
							'posy' => $_POST['form_x'],
							'posx' => $_POST['form_y']
						);
						$this->db->insert('redhumeda', $datos);
					}
				} else {
					$datos = array(
						'nombre' => $_POST['nombre'],
						'estado' => $_POST['estado'],
						'ubicacion' => $_POST['ubicacion'],
						'id_edificio' => $_POST['id_edificio'],
						'posy' => $_POST['form_x'],
						'posx' => $_POST['form_y']
					);
					$this->db->insert('redhumeda', $datos);
				}
			}
		}
	}
	public function editar($id)
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			if ($this->session->userdata('is_logged')) {
				$this->load->model("redhumedaModel");
				$redhumeda = $this->redhumedaModel->getRedHumedaEspecifico($id);
				$redhumeda = array('redhumeda' => $redhumeda);
				$edificio = $this->RedHumedaModel->getEdificio();
				$edificio = array('edificio' => $edificio);
				$data = array(
					'header1' => $this->load->view('headers/headerDatatable'),
					'sidebar' => $this->load->view('layout/sidebar'),
					'nav' => $this->load->view('layout/nav', $edificio),
					'contenido' => $this->load->view('layout/redhumeda/editar', $redhumeda),
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
	public function eliminarRedHumeda()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			$this->db->where('id_redhumeda', $_POST['id_redhumeda']);
			$this->db->delete('redhumeda');
		}
	}
	public function modificarRedHumedaajax()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			if ($this->RedHumedaModel->validarRedHumeda($_POST["nombre"])) {
				$datos = array(
					'nombre' => $_POST['nombre'],
					'estado' => $_POST['estado'],
					'ubicacion' => $_POST['ubicacion'],
					'id_edificio' => $_POST['id_edificio'],
					'posy' => $_POST['form_y'],
					'posx' => $_POST['form_x']
				);
				$this->db->update('redhumeda', $datos, array('id_redhumeda' => $_POST["id_redhumeda"]));
			}
		}
	}
	function modificarajax_upload()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			if (!$this->RedHumedaModel->validarRedHumeda($_POST["nombre"])) {
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
							'estado' => $_POST['estado'],
							'ubicacion' => $_POST['ubicacion'],
							'imagen' => $data['file_name'],
							'id_edificio' => $_POST['id_edificio'],
							'posy' => $_POST['form_y'],
							'posx' => $_POST['form_x']
						);
						$this->db->update('redhumeda', $datos, array('id_redhumeda' => $_POST["id_redhumeda"]));
					}
				} else {
					$datos = array(
						'nombre' => $_POST['nombre'],
						'estado' => $_POST['estado'],
						'ubicacion' => $_POST['ubicacion'],
						'id_edificio' => $_POST['id_edificio'],
						'posy' => $_POST['form_y'],
						'posx' => $_POST['form_x']
					);
					$this->db->update('redhumeda', $datos, array('id_redhumeda' => $_POST["id_redhumeda"]));
				}
			}
		}
	}
}
