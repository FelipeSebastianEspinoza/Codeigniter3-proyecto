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
			$contenido = "mapa/mapa";
			$script = "layout/mapa/mapaScript";
			$this->cargarTemplate($contenido,$script);  
		}else{
			show_404();
		}
	}
	public function registrarUsuario(){ 
		if($this->session->userdata('is_logged')){
			$contenido = "registrarUsuario";
			$script = "";
			$this->cargarTemplate($contenido,$script);  
		}else{
			show_404();
		} 
	}  
  
	public function cargarTemplate($contenido,$script){
		$data = array(
			'header1' => $this->load->view('headers/header1'),
			'sidebar' => $this->load->view('layout/sidebar'), 
			'nav' => $this->load->view('layout/nav'),
			'contenido' => $this->load->view('layout/'.$contenido), 
			'logoutMensaje' => $this->load->view('layout/logoutMensaje'),
			'footer1' => $this->load->view('footers/footer1') 
		);
		$this->load->view('dashboard',$data); 
	    if($script !=""){ 
			$this->load->view($script); 
        }
			 
	}
  
	public function menuGrifo(){
		$data = array(
			'header1' => $this->load->view('headers/headerDatatable'),
			'sidebar' => $this->load->view('layout/sidebar'), 
			'nav' => $this->load->view('layout/nav'),
			'contenido' => $this->load->view('layout/grifo/menuGrifo'),
			'logoutMensaje' => $this->load->view('layout/logoutMensaje'),
			'footer1' => $this->load->view('footers/footerDatatable') 
		);
		$this->load->view('dashboard',$data); 
 
			 
	} 
 


  
}
