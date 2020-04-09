<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Map extends CI_Controller {  
   
	function __construct()
	{
		parent:: __construct();
		$this->load->library(array('session')); 
	} 

	function mapaDiv(){
		$this->load->view('layout/mapa/mapaDiv') ;
	 }
 	function fotoDiv(){
		$this->load->view('layout/mapa/fotoDiv') ; 
	 }
	 function grifoDiv(){
		$this->load->view('layout/mapa/grifoDiv') ;
	 }
 	function fotoGrifoDiv(){
		$this->load->view('layout/mapa/fotoGrifoDiv') ; 
	 }
  
}
