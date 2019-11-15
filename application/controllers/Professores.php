<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Professores extends CI_Controller {
    
        public function __construct() {

            parent::__construct();
            if ( !$this->session->userdata('logado') ) {
                $this->session->set_flashdata('erro_login', '<div class="alert alert-danger alert-dismissible">
                                                                Você precisa realizar login! 
                                                             </div>');
                redirect('login');
            }           
            $this->load->model('professores_model');
            $this->load->helper('security');
            $this->load->helper('form');
            $this->load->library('form_validation');

            //carregar o helper funcoes_helper
		    $this->load->helper('funcoes_helper', 'funcoes');

        }

        //listar professores
        public function index() {

            //echo 'Aqui vai ficar a lista de usuarios.';

            $data['titulo'] = 'Listar professores';
            $data['tituloConteudo'] = 'Professores';

            // carrega dados do banco de dados
		    $data['professores_model'] = $this->professores_model->list();

            $this->load->view('layout/topo',$data);
            $this->load->view('professores/list');
            $this->load->view('layout/rodape');

        }

        public function add() {

            //echo '<pre>';
                //echo print_r($this->input->post());

            // -> required
            // -> min_length[3]
            $this->form_validation->set_rules('nomeProfessor', 'NOME', 'required|min_length[3]');
            $this->form_validation->set_rules('sobrenomeProfessor', 'SOBRENOME', 'required|min_length[3]');

            // -> required
            // -> valid_email
            $this->form_validation->set_rules('emailProfessor', 'E-MAIL', 'required|valid_email', 
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
                $dados['nomeProfessor'] = $this->input->post('nomeProfessor');
                $dados['sobrenomeProfessor'] = $this->input->post('sobrenomeProfessor');
                $dados['login'] = $this->input->post('emailProfessor');
                $dados['senha'] = do_hash($this->input->post('senha'));
                $dados['siape'] = $this->input->post('siape');

                $this->professores_model->doInsert($dados);

                redirect('professores', 'refresh');                
                //echo 'Usuário cadastrado com sucesso!';
            }else {
                $data['titulo'] = 'Cadastrar professor';

                $this->load->view('layout/topo',$data);
                $this->load->view('professores/add');
                $this->load->view('layout/rodape');
            }

        }

        public function edit( $id=NULL ) {

            if($this->input->post()){
                $teste = $this->input->post();
                $id = $teste['idProfessor'];
            }
            if ( !$id ) {

                $this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible">
                                                        Erro, você deve passar um id de professor
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                                            &times;
                                                        </button>
                                                      </div>');
                redirect('professores');
            }

            $query = $this->professores_model->getProfessorId($id);

            if ( !$query ) {
                $this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible">
                                                        Erro, professor não foi localizado, tente novamente.
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                                            &times;
                                                        </button>
                                                      </div>');
                redirect('professores');
            }

            // -> required
            // -> min_length[3]
            $this->form_validation->set_rules('nomeProfessor', 'NOME', 'required|min_length[3]');
            $this->form_validation->set_rules('sobrenomeProfessor', 'SOBRENOME', 'required|min_length[3]');

            // -> required
            // -> valid_email
            $this->form_validation->set_rules('emailProfessor', 'E-MAIL', 'required|valid_email', 
                array('valid_email'=>'Você deve passar um e-mail válido!'));

            if ($this->form_validation->run() == TRUE) {
                
                // salvar no banco
                $dados['idProfessor'] = $this->input->post('idProfessor');
                $dados['tag'] = $this->input->post('idTag');
                $dados['nomeProfessor'] = $this->input->post('nomeProfessor');
                $dados['sobrenomeProfessor'] = $this->input->post('sobrenomeProfessor');
                $dados['login'] = $this->input->post('emailProfessor');
    
                $this->professores_model->doUpdate($dados, ['idProfessor' => $this->input->post('idProfessor')]);    
                redirect('Professores', 'refresh');                
                //echo 'Aluno cadastrado com sucesso!';

                //echo '<pre>';
                    //echo print_r($this->input->post());


            }else {

                $data['titulo'] = 'Editar professor';
                $data['query']  = $query;

                $this->load->view('layout/topo',$data);
                $this->load->view('professores/edit');
                $this->load->view('layout/rodape');
            }

        }
    }

?>