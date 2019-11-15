<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->library('form_validation');
        $this->load->helper('security');
    }

    public function index() {
        
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required');
        $this->form_validation->set_rules('senha', 'Senha', 'trim|required');

        if ( $this->form_validation->run() == TRUE) {
            $email = $this->input->post('email');
            $senha = $this->input->post('senha');
            $login = $this->login_model->login($email, $senha);       

            if( $login ) {
                $dadosAcesso = [
                    'logado' => TRUE,
                    'nome'   => $login->nome,
                    'email'  => $login->email
                ];

                $this->session->set_userdata($dadosAcesso);

                if ( $this->session->userdata('logado') ) {

                    redirect('/alunos');

                    echo '<pre>';
                        echo var_dump($this->input->post());
                    echo '</pre>';
                }else {
                    $this->session->set_flashdata('erro_login', '<div class="alert alert-danger alert-dismissible">
                                                                    Erro ao tentar logar no sistema
                                                                 </div>');
                    redirect('login');
                }
            }           
            
            redirect('login');
            
        } else {
            $data['titulo'] = 'Login de acesso';
            $data['tituloLogin'] = 'Caasaif';
            $this->load->view('login/view_login',$data);
        }
    }

    public function sair() {
        $this->session->sess_destroy();
        redirect('login');
    }

}
