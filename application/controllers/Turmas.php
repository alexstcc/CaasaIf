<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Turmas extends CI_Controller {

        public function __construct() {

            parent::__construct();
            if ( !$this->session->userdata('logado') ) {
                $this->session->set_flashdata('erro_login', '<div class="alert alert-danger alert-dismissible">
                                                                Você precisa realizar login! 
                                                             </div>');
                redirect('login');
            }           
            $this->load->model('turmas_model');
            $this->load->helper('security');
            $this->load->helper('form');
            $this->load->library('form_validation');

            //carregar o helper funcoes_helper
		    $this->load->helper('funcoes_helper', 'funcoes');

        }

        //listar usuarios
        public function index() {
            //echo 'Aqui vai ficar a lista de turmas.';

            $data['titulo'] = 'Listar turmas';
            $data['tituloConteudo'] = 'Turmas';

            // carrega dados do banco de dados
		    $data['turmas_model'] = $this->turmas_model->list();

            $this->load->view('layout/topo',$data);
            $this->load->view('turmas/list');
            $this->load->view('layout/rodape');
        }
    }
?>