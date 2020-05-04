<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reporte extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->model('ReporteModel');
		$this->load->model('EnfermedadProfesionalModel');
	}
  
	function ver()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->model("ReporteModel");
			$data['edificio'] = $this->ReporteModel->getEdificio();
			$data['reporte'] = $this->ReporteModel->getReporte();
			$data['enfermedad'] = $this->EnfermedadProfesionalModel->getEnfermedadProfesional();
			$this->menuReporte($data);
		} else {
			show_404();
		}
	}
	public function menuReporte($data)
	{
		$data = array( 
			'header1' => $this->load->view('headers/headerDatatable'),
			'sidebar' => $this->load->view('layout/sidebar'),
			'nav' => $this->load->view('layout/nav'),
			'tabla' => $this->load->view('layout/reporte/tabla', $data),
			'contenido' => $this->load->view('layout/reporte/ver'),
			'logoutMensaje' => $this->load->view('layout/logoutMensaje'),
			'footer1' => $this->load->view('footers/footerDatatable')
		);
		$this->load->view('dashboard', $data);
	}
	public function success()
	{
		$this->session->set_flashdata('category_success', 'Se ha creado una nuevo reporte con éxito');
		redirect('reporte/ver');
	}
	public function successupdate()
	{
		$this->session->set_flashdata('category_success', 'Se ha actualizado el reporte con éxito');
		redirect('reporte/ver');
	}
	public function successdelete()
	{
		$this->session->set_flashdata('category_success', 'Se ha eliminado el reporte con éxito');
		redirect('reporte/ver');
	}
	function ajax_upload()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			if (!$this->ReporteModel->validarReporte($_POST["persona"])) {
			} else {
					$datos = array(
						'persona' => $_POST['persona'],
						'fecha' => $_POST['fecha'],
						'fechatermino' => $_POST['fechatermino'],
						'persona' => $_POST['persona'],
						'id_edificio' => $_POST['id_edificio'],
						'id_enfermedad' => $_POST['id_enfermedad'],
					);
					$this->db->insert('enfermedades_reportadas', $datos);
			}
		}
	}
	function ajax_upload_sinfecha()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			if (!$this->ReporteModel->validarReporte($_POST["persona"])) {
			} else {
					$datos = array(
						'persona' => $_POST['persona'],
						'fecha' => $_POST['fecha'],
					 
						'persona' => $_POST['persona'],
						'id_edificio' => $_POST['id_edificio'],
						'id_enfermedad' => $_POST['id_enfermedad'],
					);
					$this->db->insert('enfermedades_reportadas', $datos);
			}
		}
	}
	public function editar($id)
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			if ($this->session->userdata('is_logged')) {
 
				$data['reporte'] = $this->ReporteModel->getReporteEspecifico($id);
				$data['edificio'] = $this->ReporteModel->getEdificio();
				$data['enfermedad'] = $this->EnfermedadProfesionalModel->getEnfermedadProfesional();

				$data = array(
					'header1' => $this->load->view('headers/headerDatatable'),
					'sidebar' => $this->load->view('layout/sidebar'),
					'nav' => $this->load->view('layout/nav'),
					'contenido' => $this->load->view('layout/reporte/editar', $data),
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
	public function eliminarReporte()
	{ 
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			$this->db->where('id_enfermedadreportada', $_POST['id_enfermedadreportada']);
			$this->db->delete('enfermedades_reportadas');
		}
	}
	public function modificarReporterajax()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			if ($this->ReporteModel->validarReporte($_POST["persona"] )) {
				$datos = array(
					'persona' => $_POST['persona'],
					'fecha' => $_POST['fecha'],
					'fechatermino' => $_POST['fechatermino'],
					'persona' => $_POST['persona'],
					'id_edificio' => $_POST['id_edificio'],
					'id_enfermedad' => $_POST['id_enfermedad'],
				);
				$this->db->update('enfermedades_reportadas', $datos, array('id_enfermedadadreportada' => $_POST["id_enfermedadreportada"]));
			}
		}
	}
	function modificarajax_upload()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			if (!$this->ReporteModel->validarReporte($_POST["persona"])) {
			} else {
				$datos = array(
					'persona' => $_POST['persona'],
					'fecha' => $_POST['fecha'],
					'fechatermino' => $_POST['fechatermino'],
					'persona' => $_POST['persona'],
					'id_edificio' => $_POST['id_edificio'],
					'id_enfermedad' => $_POST['id_enfermedad'],
				);
	        	 $this->db->update('enfermedades_reportadas', $datos, array('id_enfermedadadreportad' => $_POST["id_enfermedadadreportad"]));
  
			}
		}
	}
}
