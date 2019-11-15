<?php
defined('BASEPATH') OR exit('No direct script access allowed');  
    
    class Alunos extends CI_Controller {
        
        public function __construct() {
            parent::__construct();
            if ( !$this->session->userdata('logado') ) {
                $this->session->set_flashdata('erro_login', '<div class="alert alert-danger alert-dismissible">
                                                                Você precisa realizar login! 
                                                             </div>');
                redirect('login');
            }         
            $this->load->model('alunos_model');
            $this->load->helper('security');
            $this->load->helper('form');
            $this->load->library('form_validation');

            //carregar o helper funcoes_helper
		    $this->load->helper('funcoes_helper', 'funcoes');
        }

        //listar alunos
        public function index() {
            $data['titulo'] = 'Listar alunos';
            $data['tituloConteudo'] = 'Alunos';

		    // carrega dados do banco de dados
		    $data['alunos_model'] = $this->alunos_model->list();

            // carrega a view
            $this->load->view('layout/topo', $data);
            $this->load->view('alunos/list');
            $this->load->view('layout/rodape');

        }

        // novo aluno
        public function add() {

            //echo '<pre>';
                //echo print_r($this->input->post());

            // -> required -> min_length[8]
            $this->form_validation->set_rules('tag', 'TAG', 'required|min_length[8] required|max_length[8]');

            // -> required
            // -> min_length[3]
            $this->form_validation->set_rules('nomeAluno', 'NOME', 'required|min_length[3]');
            $this->form_validation->set_rules('sobrenomeAluno', 'SOBRENOME', 'required|min_length[3]');

            // -> required
            // -> valid_email
            $this->form_validation->set_rules('emailAluno', 'E-MAIL', 'required|valid_email', 
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
            /*$this->form_validation->set_rules('senha2', 'Repita a senha', 'required|matches[senha]',
                array('required'=>'Você deve informar o campo Repita a senha!',
                      'matches'=>'As senhas devem ser iguais!'));*/

            if ($this->form_validation->run() == TRUE) {
                
                // salvar no banco
                $dados['tag'] = $this->input->post('tag');
                $dados['nomeAluno'] = $this->input->post('nomeAluno');
                $dados['sobrenomeAluno'] = $this->input->post('sobrenomeAluno');
                $dados['dataMatricula'] = $this->input->post('dataMatricula');
                $dados['login'] = $this->input->post('emailAluno');
                $dados['senha'] = do_hash($this->input->post('senha'));
                $dados['matricula'] = $this->input->post('matricula');
                $dados['idTurma'] = 1;

                $this->alunos_model->doInsert($dados);

                redirect('alunos', 'refresh');                
                //echo 'Usuário cadastrado com sucesso!';
            }else {
                $data['titulo'] = 'Cadastrar aluno';

                $this->load->view('layout/topo',$data);
                $this->load->view('alunos/add');
                $this->load->view('layout/rodape');
            }

        }

        // Editar alunos
        public function edit( $id=NULL ) {

            if($this->input->post()){
                $teste = $this->input->post();
                $id = $teste['idAluno'];
            }
            if ( !$id ) {
                $this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible">
                                                        Erro, você deve passar um id de aluno
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                                            &times;
                                                        </button>
                                                      </div>');
                redirect('alunos');
            }

            $query = $this->alunos_model->getAlunoId($id);

            if ( !$query ) {
                $this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible">
                                                        Erro, aluno não foi localizado, tente novamente.
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                                            &times;
                                                        </button>
                                                      </div>');
                redirect('alunos');
            }

            // -> required
            // -> min_length[3]
            $this->form_validation->set_rules('nomeAluno', 'NOME', 'required|min_length[3]');
            $this->form_validation->set_rules('sobrenomeAluno', 'SOBRENOME', 'required|min_length[3]');

            // -> required
            // -> valid_email
            $this->form_validation->set_rules('emailAluno', 'E-MAIL', 'required|valid_email', 
                array('valid_email'=>'Você deve passar um e-mail válido!'));

            if ($this->form_validation->run() == TRUE) {
                
                // salvar no banco
                $dados['idAluno'] = $this->input->post('idAluno');
                $dados['tag'] = $this->input->post('idTag');
                $dados['nomeAluno'] = $this->input->post('nomeAluno');
                $dados['sobrenomeAluno'] = $this->input->post('sobrenomeAluno');
                $dados['dataMatricula'] = $this->input->post('dataMatricula');
                $dados['login'] = $this->input->post('emailAluno');
    
                $this->alunos_model->doUpdate($dados, ['idAluno' => $this->input->post('idAluno')]);    
                redirect('alunos', 'refresh');                
                //echo 'Aluno cadastrado com sucesso!';

                //echo '<pre>';
                    //echo print_r($this->input->post());


            }else {
                $data['titulo'] = 'Editar aluno';
                $data['query']  = $query;

                $this->load->view('layout/topo',$data);
                $this->load->view('alunos/edit');
                $this->load->view('layout/rodape');
            }

        }

        // apagar aluno
        public function del( $id=NULL ){

            echo '<pre>';
                echo print_r($this->input->post());
            echo '<pre>';

            if ( !$id ) {
                $this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible">
                                                        Erro, você deve passar um id de aluno
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                                            &times;
                                                        </button>
                                                      </div>');
                redirect('alunos');
            }

            // Verifica se existe cadastro com id passado
            $query = $this->alunos_model->getAlunoId($id);

            if ( !$query ) {
                $this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible">
                                                        Erro, aluno não foi localizado, tente novamente.
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                                            &times;
                                                        </button>
                                                      </div>');
                redirect('alunos');
            }            

            // Verifica se aluno esta logado
            if($query->login == $this->session->userdata('login')){
                $this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible">
                                                        Erro, não é possível apagar aluno logado no sistema.
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                                            &times;
                                                        </button>
                                                      </div>');
                redirect('alunos');
            }

            // Apagar aluno
            if ($this->alunos_model->doDelete(['idAluno' => $id])){
                $this->session->set_flashdata('msg', '<div class="alert alert-success">
                                                            Aluno foi apagado com sucesso!
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                                                &times;
                                                            </button>
                                                        </div>');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible">
                                                        Erro ao apagar aluno.
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                                            &times;
                                                        </button>
                                                      </div>');
            }
            redirect('alunos');
        }
    }
?>