<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Historial extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->model('HistorialModel');
	}
	function verSeremi()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$data['historial'] = $this->HistorialModel->getHistorialSeremi();
			$data['historial_anexos'] = $this->HistorialModel->getHistorialAnexos();
			$data['tipo'] = 'seremi';
			$this->menu($data);
		} else {
			show_404();
		}
	}
	function verMutual()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$data['historial'] = $this->HistorialModel->getHistorialMutual();
			$data['historial_anexos'] = $this->HistorialModel->getHistorialAnexos();
			$data['tipo'] = 'mutual';
			$this->menu($data);
		} else {
			show_404();
		}
	}
	public function menu($data)
	{
		$data = array(
			'header1' => $this->load->view('headers/headerDatatable'),
			'sidebar' => $this->load->view('layout/sidebar'),
			'nav' => $this->load->view('layout/nav'),
			'historial' => $this->load->view('layout/historial/ver', $data),
			'logoutMensaje' => $this->load->view('layout/logoutMensaje'),
			'footer1' => $this->load->view('footers/footerDatatable')
		);
		$this->load->view('dashboard', $data);
	}
	function ajax_upload()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			if (!$this->HistorialModel->validarTitulo($_POST["titulo"])) {
			} else {
				$datos = array(
					'titulo' => $_POST['titulo'],
					'fecha' => $_POST['fecha'],
					'descripcion' => $_POST['descripcion'],
					'estado' => $_POST['estado'],
					'tipo' => $_POST['tipo'],
					'id_campus' => '1'
				);
				$this->db->insert('historial', $datos);
			}
		}
	}
	public function eliminarHistorial()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			$this->db->where('id_historial', $_POST['id_historial']);
			$this->db->delete('historial');
		}
	}
	public function successseremi()
	{
		$this->session->set_flashdata('category_success', 'Se ha creado un nuevo historial con éxito');
		$this->verSeremi();
	}
	public function successmutual()
	{
		$this->session->set_flashdata('category_success', 'Se ha creado un nuevo historial con éxito');
		$this->verMutual();
	}
	public function successdeleteseremi()
	{
		$this->session->set_flashdata('category_success', 'Se ha eliminado el historial con éxito');
		$this->verSeremi();
	}
	public function successdeletemutual()
	{
		$this->session->set_flashdata('category_success', 'Se ha eliminado el historial con éxito');
		$this->verMutual();
	}
	public function editar($id)
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			$data['historial'] = $this->HistorialModel->getHistorialAmbos($id);
			$data['historial_anexos'] = $this->HistorialModel->getHistorialAnexos();
			$data = array(
				'header1' => $this->load->view('headers/headerDatatable'),
				'sidebar' => $this->load->view('layout/sidebar'),
				'nav' => $this->load->view('layout/nav'),
				'contenido' => $this->load->view('layout/historial/editar', $data),
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
			if (!$this->HistorialModel->validarTitulo($_POST["titulo"])) {
			} else {
				$datos = array(
					'titulo' => $_POST['titulo'],
					'fecha' => $_POST['fecha'],
					'descripcion' => $_POST['descripcion'],
					'estado' => $_POST['estado'],
					'id_historial' => $_POST['id_historial']
				);
				$this->db->update('historial', $datos, array('id_historial' => $_POST["id_historial"]));
			}
		}
	}
	public function successhistorialmodificarseremi()
	{
		$this->session->set_flashdata('category_success', 'Se ha modificado el historial con éxito');
		$this->verSeremi();
	}
	public function successhistorialmodificarmutual()
	{
		$this->session->set_flashdata('category_success', 'Se ha modificado el historial con éxito');
		$this->verMutual();
	}
	public function successdeletearchivoseremi()
	{
		$this->session->set_flashdata('category_success', 'Se ha eliminado el historial con éxito');
		$this->verSeremi();
	}
	public function successdeletearchivomutual()
	{
		$this->session->set_flashdata('category_success', 'Se ha eliminado el historial con éxito');
		$this->verMutual();
	}

	function uploadfilehistorial()
	{
		$this->load->database('pdo');
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			if ($this->HistorialModel->validarNArchivo($_POST["narchivo"])) {
				if (isset($_FILES["image_file"]["name"])) {
					$config['upload_path'] = './assets/upload';
					$config['allowed_types'] = 'pdf|csv|jpg|jpeg|png|gif';

					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('image_file')) {
						echo $this->upload->display_errors();
					} else {
						$data = $this->upload->data();
						$datos = array(
							'nombre' => $_POST['narchivo'],
							'archivo' => $data['file_name'],
							'id_historial' => $_POST['id_historial']
						);
						$this->db->insert('historial_anexos', $datos);
					}
				}
			}
		}
	}
	public function eliminarArchivo()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo'); 
			$this->db->where('id_anexos', $_POST['id_anexos']);
			$this->db->delete('historial_anexos');
		}
	}
}
