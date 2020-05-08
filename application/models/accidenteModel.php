<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AccidenteModel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database('pdo');
	}

	public function getAccidente()
	{
		$sql = $this->db->get('accidente');
		return $sql->result();
	}

	public function getAccidenteEspecifico($id)
	{
		$sql = $this->db->get_where('accidente', array('id_accidente' => $id));
		return $sql->result();
	}

 
}
