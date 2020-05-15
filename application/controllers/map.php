<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Map extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('session'));
	}

	function mapaDiv()
	{
		$this->load->model("edificioModel");
		$edificio = $this->edificioModel->getEdificio();
		$edificio = array('edificio' => $edificio);
		$this->load->view('layout/mapa/mapaDiv', $edificio);
	}
	function mapaDivEstado()
	{
		$this->load->model("edificioModel");
		$edificio = $this->edificioModel->getEdificio();
		$edificio = array('edificio' => $edificio);
		$this->load->view('layout/mapa/mapaDivEstado', $edificio);
	}
	function fotoDiv()
	{
		$this->load->view('layout/mapa/fotoDiv');
	}
	function grifoDiv()
	{
		$this->load->model("grifoModel");
		$this->load->model("RedHumedaModel");
		$data['grifos'] = $this->grifoModel->getGrifo();
		$data['redhumeda'] = $this->RedHumedaModel->getRedHumeda();
		$this->load->view('layout/mapa/grifoDiv', $data);
	}
	function zonaDiv()
	{
		$this->load->model("ZonaDeSeguridadModel");
		$data['zona'] = $this->ZonaDeSeguridadModel->getZonaDeSeguridad();
		$this->load->view('layout/mapa/zonaDiv', $data);
	}
	function fotoGrifoDiv()
	{
		$this->load->view('layout/mapa/fotoGrifoDiv');
	}
}
