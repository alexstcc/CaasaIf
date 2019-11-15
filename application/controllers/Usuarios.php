<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Usuarios extends CI_Controller {

        public function __construct() {
            parent::__construct();
            if ( !$this->session->userdata('logado') ) {
                $this->session->set_flashdata('erro_login', '<div class="alert alert-danger alert-dismissible">
                                                                Você precisa realizar login! 
                                                             </div>');
                redirect('login');
            }           
            $this->load->model('usuarios_model');
            $this->load->helper('security');
            $this->load->helper('form');
            $this->load->library('form_validation');

            //carregar o helper funcoes_helper
		    $this->load->helper('funcoes_helper', 'funcoes');
        }
        
        //listar usuarios
        public function index() {
            $data['titulo'] = 'Listar usuários';
            $data['tituloConteudo'] = 'Usuários';

            // carrega dados do banco de dados
		    $data['usuarios_model'] = $this->usuarios_model->list();

            $this->load->view('layout/topo',$data);
            $this->load->view('usuarios/list');
            $this->load->view('layout/rodape');
        }

        // novo usuário
        public function add() {

            //echo '<pre>';
                //echo print_r($this->input->post());

            // -> required
            // -> min_length[3]
            $this->form_validation->set_rules('nomeUsuario', 'NOME', 'required|min_length[3]');
            $this->form_validation->set_rules('sobrenomeUsuario', 'SOBRENOME', 'required|min_length[3]');

            // -> required
            // -> valid_email
            $this->form_validation->set_rules('emailUsuario', 'E-MAIL', 'required|valid_email', 
                array('valid_email'=>'Você deve passar um e-mail válido!'));

            // -> trim
            // -> required
            // -> min_length[6]
            // -> max_length[8]
            $this->form_validation->set_rules('senha', 'SENHA', 'required|min_length[6]|max_length[8]',
                array('required'=>'Você deve passar uma senha!',
                    'min_length'=>'Senha deve ter no minimo 6 letras ou numeros!',
                    'max_length'=>'Senha deve ter no maxino 8 letras ou numeros!'));

            // -> required
            // -> matches
            $this->form_validation->set_rules('senha2', 'Repita a senha', 'required|matches[senha]',
                array('required'=>'Você deve informar o campo Repita a senha!',
                      'matches'=>'As senhas devem ser iguais!'));

            if ($this->form_validation->run() == TRUE) {
                
                // salvar no banco
                $dados['nomeUsuario'] = $this->input->post('nomeUsuario');
                $dados['sobrenomeUsuario'] = $this->input->post('sobrenomeUsuario');
                $dados['login'] = $this->input->post('emailUsuario');
                $dados['senha'] = do_hash($this->input->post('senha'));
                $dados['ativo'] = 1;

                $this->usuarios_model->doInsert($dados);

                redirect('usuarios', 'refresh');                
                //echo 'Usuário cadastrado com sucesso!';
            }else {
                $data['titulo'] = 'Cadastrar usuário';

                $this->load->view('layout/topo',$data);
                $this->load->view('usuarios/add');
                $this->load->view('layout/rodape');
            }

        }

        // Editar usuário
        public function edit( $id=NULL ) {

            if($this->input->post()){
                $teste = $this->input->post();
                $id = $teste['idUsuario'];
            }
            if ( !$id ) {
                $this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible">
                                                        Erro, você deve passar um id de usuário
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                                            &times;
                                                        </button>
                                                      </div>');
                redirect('usuarios');
            }

            $query = $this->usuarios_model->getUsuarioId($id);

            if ( !$query ) {
                $this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible">
                                                        Erro, usuario não foi localizado, tente novamente.
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                                            &times;
                                                        </button>
                                                      </div>');
                redirect('usuarios');
            }

            // -> required
            // -> min_length[3]
            $this->form_validation->set_rules('nomeUsuario', 'NOME', 'required|min_length[3]');
            $this->form_validation->set_rules('sobrenomeUsuario', 'SOBRENOME', 'required|min_length[3]');

            // -> required
            // -> valid_email
            $this->form_validation->set_rules('emailUsuario', 'E-MAIL', 'required|valid_email', 
                array('valid_email'=>'Você deve passar um e-mail válido!'));

            if ($this->form_validation->run() == TRUE) {
                
                // salvar no banco
                $dados['idUsuario'] = $this->input->post('idUsuario');
                $dados['nomeUsuario'] = $this->input->post('nomeUsuario');
                $dados['sobrenomeUsuario'] = $this->input->post('sobrenomeUsuario');
                $dados['login'] = $this->input->post('emailUsuario');
                $dados['cpf'] = $this->input->post('cpf');
    
                $this->usuarios_model->doUpdate($dados, ['idUsuario' => $this->input->post('idUsuario')]);    
                redirect('usuarios', 'refresh');                
                //echo 'Usuário cadastrado com sucesso!';

                //echo '<pre>';
                    //echo print_r($this->input->post());


            }else {

                $data['titulo'] = 'Editar usuário';
                $data['query']  = $query;

                $this->load->view('layout/topo',$data);
                $this->load->view('usuarios/edit');
                $this->load->view('layout/rodape');
            }
            
        }

        // apagar usuário
        public function del( $id=NULL ){

            echo '<pre>';
                echo print_r($this->input->post());
            echo '<pre>';

            if ( !$id ) {
                $this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible">
                                                        Erro, você deve passar um id de usuário
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                                            &times;
                                                        </button>
                                                      </div>');
                redirect('usuarios');
            }

            // Verifica se existe cadastro com id passado
            $query = $this->usuarios_model->getUsuarioId($id);

            if ( !$query ) {
                $this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible">
                                                        Erro, usuário não foi localizado, tente novamente.
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                                            &times;
                                                        </button>
                                                      </div>');
                redirect('usuarios');
            }            

            // Verifica se usuario esta logado
            if($query->login == $this->session->userdata('nome')){
                $this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible">
                                                        Erro, não é possível apagar usuário logado no sistema.
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                                            &times;
                                                        </button>
                                                      </div>');
                redirect('usuarios');
            }

            // Apagar usuario
            if ($this->usuarios_model->doDelete(['idUsuario' => $id])){
                $this->session->set_flashdata('msg', '<div class="alert alert-success">
                                                            Usuário foi apagado com sucesso!
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                                                &times;
                                                            </button>
                                                        </div>');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible">
                                                        Erro ao apagar usuário.
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                                            &times;
                                                        </button>
                                                      </div>');
            }
            redirect('usuarios');
        }

    }
    
?>