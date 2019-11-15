<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Presencas extends CI_Controller {
    
        public function __construct() {
            parent::__construct();
            if ( !$this->session->userdata('logado') ) {
                $this->session->set_flashdata('erro_login', '<div class="alert alert-danger alert-dismissible">
                                                                Você precisa realizar login! 
                                                             </div>');
                redirect('login');
            }          
            $this->load->model('presencas_model');
            $this->load->helper('security');
            $this->load->helper('form');
            $this->load->library('form_validation');

            //carregar o helper funcoes_helper
		    $this->load->helper('funcoes_helper', 'funcoes');
        }

        //listar presenças
        public function index() {
            $data['titulo'] = 'Listar presenças';
            $data['tituloConteudo'] = 'Presenças';

            // carrega dados do banco de dados
            $data['presencas_model'] = $this->presencas_model->list();

            $this->load->view('layout/topo',$data);
            $this->load->view('presencas/list');
            $this->load->view('layout/rodape');
        }

    }

?>