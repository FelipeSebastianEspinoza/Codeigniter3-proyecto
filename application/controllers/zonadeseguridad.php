<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ZonaDeSeguridad extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->model('ZonaDeSeguridadModel');
	}
	public function crearZonaDeSeguridadajax()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			if ($this->ZonaDeSeguridadModel->validarZonaDeSeguridad($_POST["nombre"])) {
				$datos = array(
					'nombre' => $_POST['nombre'],
					'id_campus' => '1',
					'descripcion' => $_POST['descripcion'],
					'posy' => $_POST['form_y'],
					'posx' => $_POST['form_x']
				);
				$this->db->insert('zonadeseguridad', $datos);
			}
		}
	}
	function ver()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->model("ZonaDeSeguridadModel");
			$data['edificio'] = $this->ZonaDeSeguridadModel->getEdificio();
			$data['zonadeseguridad'] = $this->ZonaDeSeguridadModel->getZonaDeSeguridad();
			$this->menuZonaDeSeguridad($data);
		} else {
			show_404();
		}
	}
	public function menuZonaDeSeguridad($data)
	{
		$data = array(
			'loader' => $this->load->view('layout/loader'),
			'header1' => $this->load->view('headers/headerDatatable'),
			'sidebar' => $this->load->view('layout/sidebar'),
			'nav' => $this->load->view('layout/nav'),
			'content' => $this->load->view('layout/zonadeseguridad/ver', $data),
			'modal' => $this->load->view('layout/zonadeseguridad/modal'),
			'script' => $this->load->view('layout/zonadeseguridad/script'),
			'logoutMensaje' => $this->load->view('layout/logoutMensaje'),
			'footer1' => $this->load->view('footers/footerDatatable')
		);
		$this->load->view('dashboard', $data);
	}
	public function success()
	{
		$this->session->set_flashdata('category_success', 'Se ha creado una nueva zona con éxito');
		redirect('zonadeseguridad/ver');
	}
	public function successupdate()
	{
		$this->session->set_flashdata('category_success', 'Se ha actualizado la zona de seguridad con éxito');
		redirect('zonadeseguridad/ver');
	}
	public function successdelete()
	{
		$this->session->set_flashdata('category_success', 'Se ha eliminado la zona de seguridad con éxito');
		redirect('zonadeseguridad/ver');
	}
	function ajax_upload()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			if (!$this->ZonaDeSeguridadModel->validarZonaDeSeguridad($_POST["nombre"])) {
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
							'id_campus' => '1',
							'imagen' => $data['file_name'],
							'posy' => $_POST['form_x'],
							'posx' => $_POST['form_y']
						);
						$this->db->insert('zonadeseguridad', $datos);
					}
				} else {
					$datos = array(
						'nombre' => $_POST['nombre'],
						'descripcion' => $_POST['descripcion'],
						'id_campus' => '1',
						'posy' => $_POST['form_x'],
						'posx' => $_POST['form_y']
					);
					$this->db->insert('zonadeseguridad', $datos);
				}
			}
		}
	}
	public function editar($id)
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			if ($this->session->userdata('is_logged')) {
				$this->load->model("zonadeseguridadModel");
				$zonadeseguridad = $this->ZonaDeSeguridadModel->getZonaDeSeguridadEspecifico($id);
				$zonadeseguridad = array('zonadeseguridad' => $zonadeseguridad);
				$edificio = $this->ZonaDeSeguridadModel->getEdificio();
				$edificio = array('edificio' => $edificio);
				$data = array(
					'loader' => $this->load->view('layout/loader'),
					'header1' => $this->load->view('headers/headerDatatable'),
					'sidebar' => $this->load->view('layout/sidebar'),
					'nav' => $this->load->view('layout/nav', $edificio),
					'contenido' => $this->load->view('layout/zonadeseguridad/editar', $zonadeseguridad),
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
	public function eliminarZonaDeSeguridad()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			$this->db->where('id_zonadeseguridad', $_POST['id_zonadeseguridad']);
			$this->db->delete('zonadeseguridad');
		}
	}
	public function modificarZonaDeSeguridadajax()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			if ($this->ZonaDeSeguridadModel->validarZonaDeSeguridad($_POST["nombre"])) {
				$datos = array(
					'nombre' => $_POST['nombre'],
					'descripcion' => $_POST['descripcion'],
					'id_campus' => '1',
					'posy' => $_POST['form_x'],
					'posx' => $_POST['form_y']
				);
				$this->db->update('zonadeseguridad', $datos, array('id_zonadeseguridad' => $_POST["id_zonadeseguridad"]));
			}
		}
	}
	function modificarajax_upload()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			if (!$this->ZonaDeSeguridadModel->validarZonaDeSeguridad($_POST["nombre"])) {
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
							'imagen' => $data['file_name'],
							'id_campus' => '1',
							'posy' => $_POST['form_x'],
							'posx' => $_POST['form_y']
						);
						$this->db->update('zonadeseguridad', $datos, array('id_zonadeseguridad' => $_POST["id_zonadeseguridad"]));
					}
				} else {
					$datos = array(
						'nombre' => $_POST['nombre'],
						'descripcion' => $_POST['descripcion'],
						'id_campus' => '1',
						'posy' => $_POST['form_x'],
						'posx' => $_POST['form_y']
					);
					$this->db->update('zonadeseguridad', $datos, array('id_zonadeseguridad' => $_POST["id_zonadeseguridad"]));
				}
			}
		}
	}
}
