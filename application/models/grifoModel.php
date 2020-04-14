<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GrifoModel extends CI_Model {   
	function __construct()  
	{
		parent:: __construct();
		$this->load->database('pdo');
	} 
 
	public function getGrifo() 
	{
       $sql = $this->db->get('grifo');
       return $sql->result();
	}
  
}
?> 