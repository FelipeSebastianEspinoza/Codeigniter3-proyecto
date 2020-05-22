<?php
defined('BASEPATH') or exit('No direct script access allowed');
 
class Grifo extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->model('GrifoModel');
	}
 
	function menuGrifo()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->model("grifoModel");
			$grifos = $this->grifoModel->getGrifo();
			$grifos = array('grifos' => $grifos);
			$this->menuGrifo2($grifos);
		} else {
			show_404();
		}
	}
	public function menuGrifo2($grifos)
	{
		$data = array(
			'header1' => $this->load->view('headers/headerDatatable'),
			'sidebar' => $this->load->view('layout/sidebar'),
			'nav' => $this->load->view('layout/nav'),
			'content' => $this->load->view('layout/grifo/ver', $grifos),
			'modal' => $this->load->view('layout/grifo/modal'),
			'script' => $this->load->view('layout/grifo/script'),
			'logoutMensaje' => $this->load->view('layout/logoutMensaje'),
			'footer1' => $this->load->view('footers/footerDatatable')
		);
		$this->load->view('dashboard', $data);
	}
	public function success()
	{
		$this->session->set_flashdata('category_success', 'Se ha creado un nuevo grifo con éxito');
		redirect('grifo/menuGrifo');
	}
	public function successupdate()
	{
		$this->session->set_flashdata('category_success', 'Se ha actualizado el grifo con éxito');
		redirect('grifo/menuGrifo');
	}
	public function successdelete()
	{
		$this->session->set_flashdata('category_success', 'Se ha eliminado el grifo con éxito');
		redirect('grifo/menuGrifo');
	}
	function crear()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {     
		$this->load->database('pdo');
		if (!$this->GrifoModel->validarGrifo($_POST["nombre_grifo"])) {
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
						'imagen_grifo' => $data['file_name'],
						'nombre_grifo' => $_POST['nombre_grifo'],
						'estado_grifo' => $_POST['estado_grifo'],
						'descripcion_grifo' => $_POST['descripcion_grifo'],
						'comentario_grifo' => $_POST['comentario_grifo'],
						'posy_grifo' => $_POST['form_x'],
						'posx_grifo' => $_POST['form_y'],
						'id_campus' => '1'
						
					);
					$this->db->insert('Grifo', $datos);
 
				}
			} else {
				$datos = array(
					'nombre_grifo' => $_POST['nombre_grifo'],
					'estado_grifo' => $_POST['estado_grifo'],
					'descripcion_grifo' => $_POST['descripcion_grifo'],
					'comentario_grifo' => $_POST['comentario_grifo'],
					'posy_grifo' => $_POST['form_x'],
					'posx_grifo' => $_POST['form_y'],
					'id_campus' => '1'
				);
				$this->db->insert('Grifo', $datos);
			}
		}
	}
	}
	public function editar($id)
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			if ($this->session->userdata('is_logged')) {
				$this->load->model("grifoModel");
				$grifos = $this->grifoModel->getGrifoEspecifico($id);
				$grifos = array('grifos' => $grifos);
				$data = array(
					'header1' => $this->load->view('headers/headerDatatable'),
					'sidebar' => $this->load->view('layout/sidebar'),
					'nav' => $this->load->view('layout/nav'),
					'contenido' => $this->load->view('layout/grifo/editar', $grifos),
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
	public function eliminarGrifo()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');


			$this->db->where('id_grifo', $_POST['id_grifo']);
			$this->db->delete('grifo');
		}
	}
	public function modificarGrifoajax()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			if ($this->GrifoModel->validarGrifo($_POST["nombre_grifo"], $_POST["estado_grifo"])) {
				$datos = array(
					'id_grifo' => $_POST['id_grifo'],
					'nombre_grifo' => $_POST['nombre_grifo'],
					'estado_grifo' => $_POST['estado_grifo'],
					'descripcion_grifo' => $_POST['descripcion_grifo'],
					'comentario_grifo' => $_POST['comentario_grifo'],
					'posy_grifo' => $_POST['form_x'],
					'posx_grifo' => $_POST['form_y'],
					'id_campus' => '1'
				);
				$this->db->update('Grifo', $datos, array('id_grifo' => $datos['id_grifo']));
			}
		}
	}
	function modificarajax_upload()
	{
		if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
			$this->load->database('pdo');
			if (!$this->GrifoModel->validarGrifo($_POST["nombre_grifo"])) {
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
							'id_grifo' => $_POST['id_grifo'],
							'imagen_grifo' => $data['file_name'],
							'nombre_grifo' => $_POST['nombre_grifo'],
							'estado_grifo' => $_POST['estado_grifo'],
							'descripcion_grifo' => $_POST['descripcion_grifo'],
							'comentario_grifo' => $_POST['comentario_grifo'],
							'posy_grifo' => $_POST['form_x'],
							'posx_grifo' => $_POST['form_y'],
							'id_campus' => '1'
						);

						$this->db->update('Grifo', $datos, array('id_grifo' => $datos['id_grifo']));
					}
				} else {
					$datos = array(
						'id_grifo' => $_POST['id_grifo'],
						'nombre_grifo' => $_POST['nombre_grifo'],
						'estado_grifo' => $_POST['estado_grifo'],
						'descripcion_grifo' => $_POST['descripcion_grifo'],
						'comentario_grifo' => $_POST['comentario_grifo'],
						'posy_grifo' => $_POST['form_x'],
						'posx_grifo' => $_POST['form_y'],
						'id_campus' => '1'
					);
					$this->db->update('Grifo', $datos, array('id_grifo' => $datos['id_grifo']));
				}
			}
		}
	}
}
