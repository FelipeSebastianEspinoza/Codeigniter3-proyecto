<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EdificioModel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database('pdo');
	}

	public function getEdificio()
	{
		$sql = $this->db->get('edificio');
		return $sql->result();
	}
	public function getEdificioEspecifico($id)
	{
		$sql = $this->db->get_where('edificio', array('id_edificio' => $id));
		return $sql->result();
	}
}
