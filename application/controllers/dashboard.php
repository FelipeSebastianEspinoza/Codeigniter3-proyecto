<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {  
   
	function __construct()
	{
		parent:: __construct();
		$this->load->library(array('session')); 
	} 

	public function index(){
		if($this->session->userdata('is_logged')){
			$contenido = "mapa";
			$this->cargarTemplate($contenido);  
		}else{
			show_404();
		}
	}
 
	public function cargarTemplate($contenido){
			$data = array(
				'header1' => $this->load->view('headers/header1'  ),
				'sidebar' => $this->load->view('layout/sidebar'), 
				'nav' => $this->load->view('layout/nav'),
		    	'contenido' => $this->load->view('layout/'.$contenido), 
				'logoutMensaje' => $this->load->view('layout/logoutMensaje'),
				'footer1' => $this->load->view('footers/footer1')  
			);
			$this->load->view('dashboard',$data); 
	}
	



  
}
