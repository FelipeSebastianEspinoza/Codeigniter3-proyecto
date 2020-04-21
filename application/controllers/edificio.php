<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Edificio extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->model('EdificioModel'); 
	}
	function verEdificio($id)
	{
		if ($this->session->userdata('is_logged')) {
			$this->load->model("edificioModel");
			$edificio = $this->edificioModel->getEdificioEspecifico($id);
			$edificio = array('edificio' => $edificio);
			$this->menuEdificio($edificio);
		} else {
			show_404();
		}
	}
	public function menuEdificio($edificio) 
	{
		$data = array(
			'header1' => $this->load->view('headers/headerDatatable'),
			'sidebar' => $this->load->view('layout/sidebar'),
			'nav' => $this->load->view('layout/nav'),
			'contenido' => $this->load->view('layout/edificio/ver', $edificio),
			'logoutMensaje' => $this->load->view('layout/logoutMensaje'),
			'footer1' => $this->load->view('footers/footerDatatable')
		);
		$this->load->view('dashboard', $data);
	}
	public function editar($id)
	{
		$this->load->database('pdo');
		if ($this->session->userdata('is_logged')) {
			$this->load->model("edificioModel");
			$edificio = $this->edificioModel->getEdificioEspecifico($id);
			$edificio = array('edificio' => $edificio);
			$data = array(
				'header1' => $this->load->view('headers/headerDatatable'),
				'sidebar' => $this->load->view('layout/sidebar'),
				'nav' => $this->load->view('layout/nav'),
				'contenido' => $this->load->view('layout/edificio/editar', $edificio),
				'logoutMensaje' => $this->load->view('layout/logoutMensaje'),
				'footer1' => $this->load->view('footers/footerDatatable')
			);
			$this->load->view('dashboard', $data);
		} else {
			show_404();
		}
	}
	public function modificarEdificioajax()
	{
		$this->load->database('pdo');
		if ($this->EdificioModel->validarEdificio($_POST["nombre_edificio"], $_POST["estado_edificio"])) {
			$datos = array(
				 
				'nombre_edificio' => $_POST['nombre_edificio'],
				'departamento_edificio' => $_POST['departamento_edificio'],
				'estudiantes_edificio' => $_POST['estudiantes_edificio'],
				'docentes_edificio' => $_POST['docentes_edificio'],
				'funcionarios_edificio' => $_POST['funcionarios_edificio'],
				'hacinamiento_edificio' => $_POST['hacinamiento_edificio'],
				'area_edificio' => $_POST['area_edificio'],
				'elementos_edificio' => $_POST['elementos_edificio'],
				'estado_edificio' => $_POST['estado_edificio']
			);
			$this->db->update('Edificio', $datos, array('id_edificio' => $_POST["id_edificio"]));
		}
	}
	function modificarajax_upload()
	{
		$this->load->database('pdo');
		if (!$this->EdificioModel->validarEdificio($_POST["nombre_edificio"], $_POST["estado_edificio"])) {
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
						'nombre_edificio' => $_POST['nombre_edificio'],
						'departamento_edificio' => $_POST['departamento_edificio'],
						'estudiantes_edificio' => $_POST['estudiantes_edificio'],
						'docentes_edificio' => $_POST['docentes_edificio'],
						'funcionarios_edificio' => $_POST['funcionarios_edificio'],
						'hacinamiento_edificio' => $_POST['hacinamiento_edificio'],
						'area_edificio' => $_POST['area_edificio'],
						'imagen_edificio' =>$data['file_name'],
						'elementos_edificio' => $_POST['elementos_edificio'],
						'estado_edificio' => $_POST['estado_edificio']
					);

					$this->db->update('Edificio', $datos, array('id_edificio' => $_POST["id_edificio"]));
				}
			} else {
				$datos = array(
					'nombre_edificio' => $_POST['nombre_edificio'],
					'departamento_edificio' => $_POST['departamento_edificio'],
					'estudiantes_edificio' => $_POST['estudiantes_edificio'],
					'docentes_edificio' => $_POST['docentes_edificio'],
					'funcionarios_edificio' => $_POST['funcionarios_edificio'],
					'hacinamiento_edificio' => $_POST['hacinamiento_edificio'],
					'area_edificio' => $_POST['area_edificio'],
					'elementos_edificio' => $_POST['elementos_edificio'],
					'estado_edificio' => $_POST['estado_edificio']
				);
				$this->db->update('Edificio', $datos, array('id_edificio' => $_POST["id_edificio"]));
			}
		}
	}
	public function success($id)
	{
		$this->session->set_flashdata('category_success', 'Se ha actualizado correctamente');
		$this->verEdificio($id); 
	}
	public function successupdate($id)
	{
		$this->session->set_flashdata('category_success', 'Se ha actualizado correctamente');
		$this->verEdificio($id); 
	}


}
