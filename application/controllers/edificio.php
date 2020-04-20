<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Edificio extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->model('edificioModel');
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
}
