<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Disciplinas extends CI_Controller {
    
        public function __construct() {

            parent::__construct();
            if ( !$this->session->userdata('logado') ) {
                $this->session->set_flashdata('erro_login', '<div class="alert alert-danger alert-dismissible">
                                                                Você precisa realizar login! 
                                                             </div>');
                redirect('login');
            }          
            $this->load->model('disciplinas_model');
            $this->load->helper('security');
            $this->load->helper('form');
            $this->load->library('form_validation');

        }

        //listar professores
        public function index() {

            //echo 'Aqui vai ficar a lista de usuarios.';

            $data['titulo'] = 'Listar disciplinas';
            $data['tituloConteudo'] = 'Disciplinas';

            // carrega dados do banco de dados
		    $data['disciplinas_model'] = $this->disciplinas_model->list();

            $this->load->view('layout/topo',$data);
            $this->load->view('disciplinas/list');
            $this->load->view('layout/rodape');

        }

        public function add() {

            // -> required
            // -> min_length[3]
            $this->form_validation->set_rules('nomeDisciplina', 'NOME', 'required|min_length[3]');

            // -> required
            $this->form_validation->set_rules('semestreCurso', 'PERIODO', 'required|min_length[3]', 
                array('required|min_length[3]'));

            if ($this->form_validation->run() == TRUE) {
                
                // salvar no banco
                $dados['nomeDisciplina'] = $this->input->post('nomeDisciplina');
                $dados['semestreCurso'] = $this->input->post('semestreCurso');
                $dados['idCurso'] = 1;
                $dados['dataInicioPeriodo'] = $this->input->post('dataInicioPeriodo');
                $dados['dataFimPeriodo'] = $this->input->post('dataFimPeriodo');
                

                $this->disciplinas_model->doInsert($dados);

                redirect('disciplinas', 'refresh');                
                //echo 'Usuário cadastrado com sucesso!';
            }else {
                $data['titulo'] = 'Cadastrar dispciplina';

                $this->load->view('layout/topo',$data);
                $this->load->view('disciplinas/add');
                $this->load->view('layout/rodape');
            }

        }

        public function edit() {



        }
    }

?>