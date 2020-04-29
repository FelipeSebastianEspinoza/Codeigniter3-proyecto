<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Extintor extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->model('ExtintorModel');
	}
 
	function ver()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->model("ExtintorModel");
			$data['edificio'] = $this->ExtintorModel->getEdificio();
			$data['extintor'] = $this->ExtintorModel->getExtintor();
			$this->menuExtintor($data);
		} else {
			show_404();
		}
	}
	public function menuExtintor($data)
	{
		$data = array(
			'header1' => $this->load->view('headers/headerDatatable'),
			'sidebar' => $this->load->view('layout/sidebar'),
			'nav' => $this->load->view('layout/nav'),
			'tabla' => $this->load->view('layout/extintor/tabla', $data),
			'contenido' => $this->load->view('layout/extintor/ver'),
			'logoutMensaje' => $this->load->view('layout/logoutMensaje'),
			'footer1' => $this->load->view('footers/footerDatatable')
		);
		$this->load->view('dashboard', $data);
	}
	public function success()
	{
		$this->session->set_flashdata('category_success', 'Se ha creado una nuevo extintor con éxito');
		redirect('extintor/ver');
	}
	public function successupdate()
	{
		$this->session->set_flashdata('category_success', 'Se ha actualizado la extintor con éxito');
		redirect('extintor/ver');
	}
	public function successdelete()
	{
		$this->session->set_flashdata('category_success', 'Se ha eliminado la extintor con éxito');
		redirect('extintor/ver');
	}
	function ajax_upload()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			if (!$this->ExtintorModel->validarExtintor($_POST["nombre"])) {
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
							'fechacarga' => $_POST['fechacarga'],
							'fechavenc' => $_POST['fechavenc'],
							'ubicacion' => $_POST['ubicacion'],
							'estado' => $_POST['estado'],
							'imagen' => $data['file_name'],
							'comentario' => $_POST['comentario'],
							'id_edificio' => $_POST['id_edificio']  
						);
						$this->db->insert('extintor', $datos);
					}
				} else {
					$datos = array(
						'nombre' => $_POST['nombre'],
						'fechacarga' => $_POST['fechacarga'],
						'fechavenc' => $_POST['fechavenc'],
						'ubicacion' => $_POST['ubicacion'],
						'estado' => $_POST['estado'],	 
						'comentario' => $_POST['comentario'],
						'id_edificio' => $_POST['id_edificio']  
					);
					$this->db->insert('extintor', $datos);
				}
			}
		}
	}
	public function editar($id)
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			if ($this->session->userdata('is_logged')) {
				$this->load->model("extintorModel");
				$extintor = $this->ExtintorModel->getExtintorEspecifico($id);
				$extintor = array('extintor' => $extintor);
				$edificio = $this->ExtintorModel->getEdificio();
				$edificio = array('edificio' => $edificio);
				$data = array(
					'header1' => $this->load->view('headers/headerDatatable'),
					'sidebar' => $this->load->view('layout/sidebar'),
					'nav' => $this->load->view('layout/nav', $edificio),
					'contenido' => $this->load->view('layout/extintor/editar', $extintor),
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
	public function eliminarExtintor()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			$this->db->where('id_extintor', $_POST['id_extintor']);
			$this->db->delete('extintor');
		}
	}
	public function modificarExtintorajax()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			if ($this->ExtintorModel->validarExtintor($_POST["nombre"] )) {
				$datos = array(
					'nombre' => $_POST['nombre'],
					'fechacarga' => $_POST['fechacarga'],
					'fechavenc' => $_POST['fechavenc'],
					'ubicacion' => $_POST['ubicacion'],
					'estado' => $_POST['estado'], 
					'comentario' => $_POST['comentario'],
					'id_edificio' => $_POST['id_edificio']  
				);
				$this->db->update('extintor', $datos, array('id_extintor' => $_POST["id_extintor"]));
			}
		}
	}
	function modificarajax_upload()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			if (!$this->ExtintorModel->validarExtintor($_POST["nombre"])) {
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
							'fechacarga' => $_POST['fechacarga'],
							'fechavenc' => $_POST['fechavenc'],
							'ubicacion' => $_POST['ubicacion'],
							'estado' => $_POST['estado'],
							'imagen' => $data['file_name'],
							'comentario' => $_POST['comentario'],
							'id_edificio' => $_POST['id_edificio']  
						);
						$this->db->update('extintor', $datos, array('id_extintor' => $_POST["id_extintor"]));
					}
				} else {
					$datos = array(
						'nombre' => $_POST['nombre'],
						'fechacarga' => $_POST['fechacarga'],
						'fechavenc' => $_POST['fechavenc'],
						'ubicacion' => $_POST['ubicacion'],
						'estado' => $_POST['estado'],				 
						'comentario' => $_POST['comentario'],
						'id_edificio' => $_POST['id_edificio']  
					);
					$this->db->update('extintor', $datos, array('id_extintor' => $_POST["id_extintor"]));
				}
			}
		}
	}
}
