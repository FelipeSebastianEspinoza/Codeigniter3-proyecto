<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_c extends CI_Controller { //modelo de codeigniter
  
	function __construct()
	{
		parent:: __construct();
	}
 
	public function index()
	{
        $this->load->view('login');
	}
 
 
 
 
 
  
}
