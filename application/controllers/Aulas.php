<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Aulas extends CI_Controller {

        public function __construct() {
            parent::__construct();
            if ( !$this->session->userdata('logado') ) {
                $this->session->set_flashdata('erro_login', '<div class="alert alert-danger alert-dismissible">
                                                                Você precisa realizar login! 
                                                             </div>');
                redirect('login');
            }           
            $this->load->model('aulas_model');
            $this->load->helper('security');
            $this->load->helper('form');
            $this->load->library('form_validation');

            //carregar o helper funcoes_helper
		    $this->load->helper('funcoes_helper', 'funcoes');
        }
        
        //listar usuarios
        public function index() {
            //echo 'Aqui vai ficar a lista de usuarios.';

            $data['titulo'] = 'Listar aulas';
            $data['tituloConteudo'] = 'Aulas';

            // carrega dados do banco de dados
		    $data['aulas_model'] = $this->aulas_model->list();

            $this->load->view('layout/topo',$data);
            $this->load->view('aulas/list');
            $this->load->view('layout/rodape');
        }
    }