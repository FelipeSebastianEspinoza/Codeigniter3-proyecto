<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Main extends CI_Controller
{
     //functions  
     function image_upload()
     {
          $data['title'] = "Upload Image using Ajax JQuery in CodeIgniter";
          $this->load->view('image_upload', $data);
     }
     function ajax_upload()
     {
          $this->load->database('pdo');
          if (isset($_FILES["image_file"]["name"])) {
               $config['upload_path'] = './assets/upload';
               $config['allowed_types'] = 'jpg|jpeg|png|gif';
               $this->load->library('upload', $config);
               if (!$this->upload->do_upload('image_file')) {
                    echo $this->upload->display_errors();
               } else {
                    $data = $this->upload->data();
                    $datos = array(
                         'imagen_grifo' => $data['file_name']
                    );
                    $this->db->insert('Grifo', $datos);

                    echo '<img src="' . base_url() . 'assets/upload/' . $data["file_name"] . '"
                     style="display: block; width: 300px; ">';
               }
          }
     }
}
