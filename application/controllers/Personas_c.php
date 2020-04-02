<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personas_c extends CI_Controller { //modelo de codeigniter
  
	function __construct()
	{
		parent:: __construct();
	 	$this->load->model('personas_m'); //Aqui se cargan las funciones del modelo
	 //	$this->load->library('form_validation'); 
	 //en autoload ya se carga el form
	 //ya no se necesita la validacion ya que se puso en el modelo
	}
 
	public function index()
	{
		$data = $this->personas_m->getPersonas();	
        $this->load->view('personas_v',compact("data"));
	}
 
	public function insertarPersona()
	{
		if($this->personas_m->validarPersona($_POST["nombre_personas"],$_POST["password_personas"])==FALSE){
			$valier = array('valier' => validation_errors());
			$this->load->view('personas_v',$valier);
		}else{
			$this->personas_m->insertPersonas($_POST["nombre_personas"],$_POST["password_personas"]);
			$this->load->view('forms/formsuccess');
		} 
	}  
 
 
 
  
}
