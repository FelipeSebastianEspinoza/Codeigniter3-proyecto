<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grifo extends CI_Controller {  
    
	function __construct()
	{
		parent:: __construct();
		$this->load->library(array('session')); 
	} 

	function menuGrifo(){
		 
		$this->load->model("grifoModel");
		$grifos = $this->grifoModel->getGrifo();
     	 $this->load->view('layout/grifo/menuGrifo',array('grifos' =>$grifos)); 
	  //  $this->menuGrifo($grifos);
	 
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
  
}
