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
		if($this->session->userdata('is_logged')){
			$this->load->model("grifoModel");
			$grifos = $this->grifoModel->getGrifo();
			$grifos= array('grifos' =>$grifos); 
			$this->menuGrifo2($grifos);
		}else{ 
			show_404();
		}
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

	function ajax_upload()  
	{  
        if(!$this->GrifoModel->validarGrifo($_POST["nombre_grifo"],$_POST["estado_grifo"])){
        
		}else{
			
			$this->load->database('pdo');
			if(isset($_FILES["image_file"]["name"]))  
			{  
				 $config['upload_path'] = './assets/upload';  
				 $config['allowed_types'] = 'jpg|jpeg|png|gif';  
				 $this->load->library('upload', $config);  
				 if(!$this->upload->do_upload('image_file'))  
				 {  
					  echo $this->upload->display_errors();  
				 }  
				 else  
				 {
					  $data = $this->upload->data();  
					  $datos = array(
						  'imagen_grifo'=>$data['file_name'],
						  'nombre_grifo'=>$_POST['nombre_grifo'], 
						  'estado_grifo'=>$_POST['estado_grifo'] 
					 );
					 $this->db->insert('Grifo',$datos);
					  
					 

                      /*
					  echo '<img src="'.base_url().'assets/upload/'.$data["file_name"].'"
					  style="display: block; width: 300px; ">';
					  */
					 }  
			}
		}



   
	}



  
}
