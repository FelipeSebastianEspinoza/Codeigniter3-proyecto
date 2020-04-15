<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grifo extends CI_Controller {  
    
	function __construct()
	{
		parent:: __construct();
		$this->load->library(array('session')); 
		$this->load->model('GrifoModel'); 
	} 

	public function crearGrifoajax(){ 
		 
		  
		 $this->GrifoModel->validarGrifo($_POST["nombre_grifo"],$_POST["estado_grifo"]); 
		 
	 
	 
	}

	
	function menuGrifo(){
		$this->load->model("grifoModel");
		$grifos = $this->grifoModel->getGrifo();
		$grifos= array('grifos' =>$grifos); 
	    $this->menuGrifo2($grifos);
	} 
	public function menuGrifo2($grifos){
		$data = array(
			'header1' => $this->load->view('headers/headerDatatable'),
			'sidebar' => $this->load->view('layout/sidebar'), 
			'nav' => $this->load->view('layout/nav'),
			'contenido' => $this->load->view('layout/grifo/menuGrifo',$grifos),
			'logoutMensaje' => $this->load->view('layout/logoutMensaje'),
			'footer1' => $this->load->view('footers/footerDatatable') 
		);
		 
		$this->load->view('dashboard',$data); 
	} 


	public function success(){
		$this->session->set_flashdata('category_success', 'Se ha creado un nuevo grifo con éxito');
		redirect('grifo/menuGrifo');
	}
  
}
