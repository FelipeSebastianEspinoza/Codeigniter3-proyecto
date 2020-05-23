<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Accidente extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->model('AccidenteModel');
    }
    public function ver()
    {
        if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
            $this->load->model("ReporteModel");
            $data['edificio'] = $this->ReporteModel->getEdificio();
            $data['accidente'] = $this->AccidenteModel->getAccidente();
            $this->menuAccidente($data);
        } else {
            show_404();
        }
    }
    public function menuAccidente($data)
    {
        $data = array(
            'loader' => $this->load->view('layout/loader'),
            'header1' => $this->load->view('headers/headerDatatable'),
            'sidebar' => $this->load->view('layout/sidebar'),
            'nav' => $this->load->view('layout/nav'),
            'content' => $this->load->view('layout/accidente/ver', $data),
            'modal' => $this->load->view('layout/accidente/modal'),
            'script' => $this->load->view('layout/accidente/script'),
            'logoutMensaje' => $this->load->view('layout/logoutMensaje'),
            'footer1' => $this->load->view('footers/footerDatatable'),
        
        );
        $this->load->view('dashboard', $data);
    }
    public function ajax_upload()
    {
        if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
            $this->load->database('pdo');
            $this->load->model("ReporteModel");
            if (!$this->ReporteModel->validarReporte($_POST["persona"])) {
            } else {
                $datos = array(
                    'persona' => $_POST['persona'],
                    'fecha' => $_POST['fecha'],
                    'tipo' => $_POST['tipo'],
                    'numero' => $_POST['numero'],
                    'descripcion' => $_POST['descripcion'],
                    'id_edificio' => $_POST['id_edificio'],
                );
                $this->db->insert('accidente', $datos);
            }
        }
    }
    public function success()
    {
        $this->session->set_flashdata('category_success', 'Se ha creado una nuevo reporte de accidente con éxito');
        redirect('accidente/ver');
    }
    public function successdelete()
    {
        $this->session->set_flashdata('category_success', 'Se ha eliminado el reporte de accidente con éxito');
        redirect('accidente/ver');
    }
    public function eliminarAccidente()
    {
        if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
            $this->load->database('pdo');
            $this->db->where('id_accidente', $_POST['id_accidente']);
            $this->db->delete('accidente');
        }
    }
    public function editar($id)
    {
        if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
            $this->load->database('pdo');
            if ($this->session->userdata('is_logged')) {
                $this->load->model("ReporteModel");
                $data['accidente'] = $this->AccidenteModel->getAccidenteEspecifico($id);
                $data['edificio'] = $this->ReporteModel->getEdificio();

                $data = array(
                    'header1' => $this->load->view('headers/headerDatatable'),
                    'sidebar' => $this->load->view('layout/sidebar'),
                    'nav' => $this->load->view('layout/nav'),
                    'contenido' => $this->load->view('layout/accidente/editar', $data),
                    'logoutMensaje' => $this->load->view('layout/logoutMensaje'),
                    'footer1' => $this->load->view('footers/footerDatatable'),
                );
                $this->load->view('dashboard', $data);
            } else {
                show_404();
            }
        } else {
            show_404();
        }
    }
    public function modificarajax_upload()
    {
        if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
            $this->load->database('pdo');
            $this->load->model("ReporteModel");
            if (!$this->ReporteModel->validarReporte($_POST["persona"])) {
            } else {
                $datos = array(
                    'persona' => $_POST['persona'],
                    'fecha' => $_POST['fecha'],
                    'tipo' => $_POST['tipo'],
                    'numero' => $_POST['numero'],
                    'descripcion' => $_POST['descripcion'],
                    'id_edificio' => $_POST['id_edificio'],
                );
                $this->db->update('accidente', $datos, array('id_accidente' => $_POST["id_accidente"]));
            }
        }
    }

    public function eliminar_archivo()
    {
        if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {
            $this->load->database('pdo');

            if ($_POST['archivo'] == 'archivo4') {
                $datos = array(
                    'archivo4' => '',
                );
            } else if ($_POST['archivo'] == 'archivo3') {
                $datos = array(
                    'archivo3' => '',
                );
            } else if ($_POST['archivo'] == 'archivo2') {
                $datos = array(
                    'archivo2' => '',
                );
            } else if ($_POST['archivo'] == 'archivo1') {
                $datos = array(
                    'archivo1' => '',
                );
            }

            $this->db->update('accidente', $datos, array('id_accidente' => $_POST["id_accidente"]));
        }
    }


    function uploadarchivo4()
    {
        $this->load->database('pdo');
        if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {

            if (isset($_FILES["image_file"]["name"])) {
                $config['upload_path'] = './assets/upload';
                $config['allowed_types'] = 'pdf';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image_file')) {
                    echo $this->upload->display_errors();
                } else {
                    $data = $this->upload->data();
                    $datos = array(
                        'archivo4' => $data['file_name']
                    );
                    $this->db->update('accidente', $datos, array('id_accidente' => $_POST["id_accidente"]));
                }
            }
        }
    }
    function uploadarchivo3()
    {
        $this->load->database('pdo');
        if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {

            if (isset($_FILES["image_file"]["name"])) {
                $config['upload_path'] = './assets/upload';
                $config['allowed_types'] = 'pdf';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image_file')) {
                    echo $this->upload->display_errors();
                } else {
                    $data = $this->upload->data();
                    $datos = array(
                        'archivo3' => $data['file_name']
                    );
                    $this->db->update('accidente', $datos, array('id_accidente' => $_POST["id_accidente"]));
                }
            }
        }
    }
    function uploadarchivo2()
    {
        $this->load->database('pdo');
        if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {

            if (isset($_FILES["image_file"]["name"])) {
                $config['upload_path'] = './assets/upload';
                $config['allowed_types'] = 'pdf';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image_file')) {
                    echo $this->upload->display_errors();
                } else {
                    $data = $this->upload->data();
                    $datos = array(
                        'archivo2' => $data['file_name']
                    );
                    $this->db->update('accidente', $datos, array('id_accidente' => $_POST["id_accidente"]));
                }
            }
        }
    }
    function uploadarchivo1()
    {
        $this->load->database('pdo');
        if ($this->session->userdata('is_logged') && $this->session->tipo_usuario != '0') {

            if (isset($_FILES["image_file"]["name"])) {
                $config['upload_path'] = './assets/upload';
                $config['allowed_types'] = 'pdf';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image_file')) {
                    echo $this->upload->display_errors();
                } else {
                    $data = $this->upload->data();
                    $datos = array(
                        'archivo1' => $data['file_name']
                    );
                    $this->db->update('accidente', $datos, array('id_accidente' => $_POST["id_accidente"]));
                }
            }
        }
    }
}
