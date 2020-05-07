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
					'id_enfermedad' => $_POST['id_enfermedad']
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
			if ($this->ReporteModel->validarReporte($_POST["persona"])) {
				$datos = array(
					'persona' => $_POST['persona'],
					'fecha' => $_POST['fecha'],
					'fechatermino' => $_POST['fechatermino'],
					'persona' => $_POST['persona'],
					'id_edificio' => $_POST['id_edificio'],
					'id_enfermedad' => $_POST['id_enfermedad'],
				);
				$this->db->update('enfermedades_reportadas', $datos, array('id_enfermedadreportada' => $_POST["id_enfermedadreportada"]));
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
				$this->db->update('enfermedades_reportadas', $datos, array('id_enfermedadadreportada' => $_POST["id_enfermedadadreportada"]));
			}
		}
	}




	function verHistorial($id)
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->model("ReporteModel");
			$data['historial'] = $this->ReporteModel->getHistorialReporte($id);
			$data['archivoshistorial'] = $this->ReporteModel->getArchivosHistorialReporte();
			$data['id_enfermedadreportada'] = $id;
			$this->menuHistorial($data);
		} else {
			show_404();
		}
	}
	public function menuHistorial($data)
	{
		$data = array(
			'header1' => $this->load->view('headers/headerDatatable'),
			'sidebar' => $this->load->view('layout/sidebar'),
			'nav' => $this->load->view('layout/nav'),
			'historial' => $this->load->view('layout/reporte/historial', $data),

			'logoutMensaje' => $this->load->view('layout/logoutMensaje'),
			'footer1' => $this->load->view('footers/footerDatatable')
		);
		$this->load->view('dashboard', $data);
	}

	function historialajax_upload()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			if (!$this->ReporteModel->validarTitulo($_POST["titulo"])) {
			} else {
				$datos = array(
					'titulo' => $_POST['titulo'],
					'fecha' => $_POST['fecha'],
					'descripcion' => $_POST['descripcion'],
					'id_enfermedadreportada' => $_POST['id_enfermedadreportada']
				);
				$this->db->insert('historialyarchivos', $datos);
			}
		}
	}
	public function successhistorial($id)
	{
		$this->session->set_flashdata('category_success', 'Se ha creado un nuevo historial con éxito');
		$this->verHistorial($id);
	}


	public function editarHistorial($id)
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');

			$data['historial'] = $this->ReporteModel->getHistorialEspecifico($id);
			$data['archivos'] = $this->ReporteModel->getArchivosHistorialEspecifico($id);
			$data = array(
				'header1' => $this->load->view('headers/headerDatatable'),
				'sidebar' => $this->load->view('layout/sidebar'),
				'nav' => $this->load->view('layout/nav'),
				'contenido' => $this->load->view('layout/reporte/editarHistorial', $data),
				'logoutMensaje' => $this->load->view('layout/logoutMensaje'),
				'footer1' => $this->load->view('footers/footerDatatable')
			);
			$this->load->view('dashboard', $data);
		} else {
			show_404();
		}
	}

	function modificarhistorialajax_upload()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			if (!$this->ReporteModel->validarTitulo($_POST["titulo"])) {
			} else {
				$datos = array(
					'titulo' => $_POST['titulo'],
					'fecha' => $_POST['fecha'],
					'descripcion' => $_POST['descripcion'],
					'id_historialyarchivos' => $_POST['id_historialyarchivos'],
					'id_enfermedadreportada' => $_POST['id_enfermedadreportada']
				);
				$this->db->update('historialyarchivos', $datos, array('id_historialyarchivos' => $_POST["id_historialyarchivos"]));
			}
		}
	}
	public function successhistorialmodificar($id)
	{
		$this->session->set_flashdata('category_success', 'Se ha modificado el historial con éxito');
		$this->verHistorial($id);
	}
	public function eliminarHistorial()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			$this->db->where('id_historialyarchivos', $_POST['id_historialyarchivos']);
			$this->db->delete('historialyarchivos');
		}
	}
	public function successdeletehistorial($id)
	{
		$this->session->set_flashdata('category_success', 'Se ha eliminado el historial con éxito');
		$this->verHistorial($id);
	}


 
	function uploadfilehistorial()
	{
		$this->load->database('pdo');
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			if ($this->ReporteModel->validarNArchivo($_POST["narchivo"])) {
				if (isset($_FILES["image_file"]["name"])) {
					$config['upload_path'] = './assets/upload';
					$config['allowed_types'] = 'jpg|jpeg|png|gif';
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('image_file')) {
						echo $this->upload->display_errors();
					} else {
						$data = $this->upload->data();
						$datos = array(
							'nombre' => $_POST['narchivo'],
							'archivo' => $data['file_name'],
							'id_historialyarchivos' => $_POST['id_historialyarchivos']
						);
						$this->db->insert('archivoshistorial', $datos);
					}
				}
			}
		}
	}


	public function eliminarArchivo()
	{ 
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			$this->db->where('id_archivohistorial', $_POST['id_archivohistorial']);
			$this->db->delete('archivoshistorial');
		}
	}






}
