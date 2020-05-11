<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Protocolo extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->model('ProtocoloModel');
	}

	function ver()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$data['protocolo'] = $this->ProtocoloModel->getProtocolo();
			$this->menuProtocolo($data);
		} else {
			show_404();
		}
	}
	public function menuProtocolo($data)
	{
		$data = array(
			'header1' => $this->load->view('headers/headerDatatable'),
			'sidebar' => $this->load->view('layout/sidebar'),
			'nav' => $this->load->view('layout/nav'),
			'tabla' => $this->load->view('layout/protocolo/tabla', $data),
			'contenido' => $this->load->view('layout/protocolo/ver'),
			'logoutMensaje' => $this->load->view('layout/logoutMensaje'),
			'footer1' => $this->load->view('footers/footerDatatable')
		);
		$this->load->view('dashboard', $data);
	}
	public function success()
	{
		$this->session->set_flashdata('category_success', 'Se ha creado un nuevo protocolo con éxito');
		redirect('protocolo/ver');
	}
	public function successupdate()
	{
		$this->session->set_flashdata('category_success', 'Se ha actualizado el protocolo con éxito');
		redirect('protocolo/ver');
	}
	public function successdelete()
	{
		$this->session->set_flashdata('category_success', 'Se ha eliminado el protocolo con éxito');
		redirect('protocolo/ver');
	}
	function ajax_upload()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			if (!$this->ProtocoloModel->validarProtocolo($_POST["nombre"])) {
			} else {
				$datos = array(
					'nombre' => $_POST['nombre'],
					'descripcion' => $_POST['descripcion'],
					'id_campus' => '1'
				);
				$this->db->insert('protocolo', $datos);
			}
		}
	}

	public function editar($id)
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			if ($this->session->userdata('is_logged')) {
				$data['protocolo'] = $this->ProtocoloModel->getProtocoloEspecifico($id);
				$data = array(
					'header1' => $this->load->view('headers/headerDatatable'),
					'sidebar' => $this->load->view('layout/sidebar'),
					'nav' => $this->load->view('layout/nav'),
					'contenido' => $this->load->view('layout/protocolo/editar', $data),
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
	public function eliminarProtocolo()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			$this->db->where('id_protocolo', $_POST['id_protocolo']);
			$this->db->delete('protocolo');
		}
	}
	public function modificarProtocoloajax()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			if ($this->ProtocoloModel->validarProtocolo($_POST["nombre"])) {
				$datos = array(
					'nombre' => $_POST['nombre'],
					'descripcion' => $_POST['descripcion'],
					'id_campus' => '1'
				);
				$this->db->update('protocolo', $datos, array('id_protocolo' => $_POST["id_protocolo"]));
			}
		}
	}











	function verUnidad($id)
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$data['unidad_anexos'] = $this->ProtocoloModel->getUnidadAnexos();
			$data['unidad'] = $this->ProtocoloModel->getUnidad($id);
			$data['id_protocolo'] = $id;
			$this->menuUnidad($data);
		} else {
			show_404();
		}
	}
	public function menuUnidad($data)
	{
		$data = array(
			'header1' => $this->load->view('headers/headerDatatable'),
			'sidebar' => $this->load->view('layout/sidebar'),
			'nav' => $this->load->view('layout/nav'),
			'unidad' => $this->load->view('layout/protocolo/unidad', $data),

			'logoutMensaje' => $this->load->view('layout/logoutMensaje'),
			'footer1' => $this->load->view('footers/footerDatatable')
		);
		$this->load->view('dashboard', $data);
	}

	function Unidadajax_upload()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			if (!$this->ProtocoloModel->validarProtocolo($_POST["nombre"])) {
			} else {
				$datos = array(
					'nombre' => $_POST['nombre'],
					'fecha' => $_POST['fecha'],
					'descripcion' => $_POST['descripcion'],
					'estado' => $_POST['estado'],
					'id_protocolo' => $_POST['id_protocolo']
				);
				$this->db->insert('unidad', $datos);
			}
		}
	}
	public function successUnidad($id)
	{
		$this->session->set_flashdata('category_success', 'Se ha creado una nueva unidad con éxito');
		$this->verUnidad($id);
	}
	public function successdeleteunidad($id)
	{
		$this->session->set_flashdata('category_success', 'Se ha eliminado la unidad con éxito');
		$this->verUnidad($id);
	}
	public function eliminarUnidad()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			$this->db->where('id_unidad', $_POST['id_unidad']);
			$this->db->delete('unidad');
		}
	}

	public function editarUnidad($id)
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');

			$data['unidad'] = $this->ProtocoloModel->getUnidadEspecifico($id);
			$data['archivos'] = $this->ProtocoloModel->getArchivosUnidadEspecifico($id);
			$data = array(
				'header1' => $this->load->view('headers/headerDatatable'),
				'sidebar' => $this->load->view('layout/sidebar'),
				'nav' => $this->load->view('layout/nav'),
				'contenido' => $this->load->view('layout/protocolo/editarUnidad', $data),
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
			if (!$this->ProtocoloModel->validarNombre($_POST["nombre"])) {
			} else {
				$datos = array(
					'nombre' => $_POST['nombre'],
					'fecha' => $_POST['fecha'],
					'descripcion' => $_POST['descripcion'],
					'estado' => $_POST['estado'],
					'id_unidad' => $_POST['id_unidad'] 
					  
				);
				$this->db->update('unidad', $datos, array('id_unidad' => $_POST["id_unidad"]));
			}
		}
	}
 
	public function successhistorialmodificar($id)
	{
		$this->session->set_flashdata('category_success', 'Se ha modificado la unidad con éxito');
		$this->verUnidad($id);
	}
 




	 

	function uploadfilehistorial()
	{
		$this->load->database('pdo');
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			if ($this->ProtocoloModel->validarNArchivo($_POST["narchivo"])) {
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
							'id_unidad' => $_POST['id_unidad']
						);
						$this->db->insert('unidad_anexos', $datos);
					}
				}
			}
		}
	} 

	public function successdeletehistorial($id)
	{
		$this->session->set_flashdata('category_success', 'Se ha eliminado el archivo con éxito');
		$this->verUnidad($id);
	}
	public function eliminarArchivo()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			$this->db->where('id_unidad_anexos', $_POST['id_unidad_anexos']);
			$this->db->delete('unidad_anexos');
		}
	}

 
}
