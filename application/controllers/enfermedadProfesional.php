<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EnfermedadProfesional extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->model('EnfermedadProfesionalModel');
	}
 
	function ver()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$data['enfermedadProfesional'] = $this->EnfermedadProfesionalModel->getEnfermedadProfesional();
			$this->menuEnfermedadProfesional($data);
		} else {
			show_404();
		}
	}
	public function menuEnfermedadProfesional($data)
	{
		$data = array(
			'loader' => $this->load->view('layout/loader'),
			'header1' => $this->load->view('headers/headerDatatable'),
			'sidebar' => $this->load->view('layout/sidebar'),
			'nav' => $this->load->view('layout/nav'),
			'tabla' => $this->load->view('layout/enfermedadProfesional/tabla', $data),
			'contenido' => $this->load->view('layout/enfermedadProfesional/ver'),
			'logoutMensaje' => $this->load->view('layout/logoutMensaje'),
			'footer1' => $this->load->view('footers/footerDatatable')
		);
		$this->load->view('dashboard', $data);
	}
	public function success()
	{
		$this->session->set_flashdata('category_success', 'Se ha creado una nueva enfermedad profesional con éxito');
		redirect('enfermedadProfesional/ver');
	}
	public function successupdate()
	{
		$this->session->set_flashdata('category_success', 'Se ha actualizado la enfermedad profesional con éxito');
		redirect('enfermedadProfesional/ver');
	}
	public function successdelete()
	{
		$this->session->set_flashdata('category_success', 'Se ha eliminado la enfermedad profesional con éxito');
		redirect('enfermedadProfesional/ver');
	}
	function ajax_upload()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			if (!$this->EnfermedadProfesionalModel->validarEnfermedadProfesional($_POST["nombre"])) {
			} else {
				$datos = array(
					'nombre' => $_POST['nombre'],
					'descripcion' => $_POST['descripcion']
				);
				$this->db->insert('enfermedadesprofesionales', $datos);
			}
		}
	}
	public function editar($id)
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			if ($this->session->userdata('is_logged')) {
				$enfermedadProfesional = $this->EnfermedadProfesionalModel->getEnfermedadProfesionalEspecifico($id);
				$enfermedadProfesional = array('enfermedadProfesional' => $enfermedadProfesional);

				$data = array(
					'header1' => $this->load->view('headers/headerDatatable'),
					'sidebar' => $this->load->view('layout/sidebar'),
					'nav' => $this->load->view('layout/nav'),
					'contenido' => $this->load->view('layout/enfermedadProfesional/editar', $enfermedadProfesional),
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
	public function eliminarEnfermedadProfesional()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			$this->db->where('id_enfermedad', $_POST['id_enfermedad']);
			$this->db->delete('enfermedadesprofesionales');
		}
	}
 
	function modificarajax_upload()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			if ($this->EnfermedadProfesionalModel->validarEnfermedadProfesional($_POST["nombre"])) {
				$datos = array(
					'nombre' => $_POST['nombre'],
					'descripcion' => $_POST['descripcion']
				);
				$this->db->update('enfermedadesprofesionales', $datos, array('id_enfermedad' => $_POST["id_enfermedad"]));
			}
		}
	}
}
