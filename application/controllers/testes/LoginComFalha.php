<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {

        parent::__construct();            
        $this->load->model('login_model');
        $this->load->helper('security');
        $this->load->helper('form');
        $this->load->library('form_validation');

        //carregar o helper funcoes_helper
        $this->load->helper('funcoes_helper', 'funcoes');

    }

    /*public function index() {

        if ($this->input->post() == TRUE) {

            $email = $this->input->post('email');
            $senha = $this->input->post('senha');

            $login = $this->login_model->login($email, $senha);

            if ( $login ) {
                $dadosAcesso = [
                    'logado' => TRUE,
                    'nome'   => $login->nome,
                    'email'  => $login->email
                ];

            $this->session->set_userdata($dadosAcesso);

            if ( $this->session->userdata('logado') == TRUE) {
                        redirect('principal');
            } else {
                $this->session->set_flashdata('erro_login', 'Erro ao tentar logar no sistema');
                redirect('login');
            }
        }   
        
        redirect('login');
    } else {
        $data['titulo'] = 'Login';
        $data['tituloLogin'] = 'Caasaif';
        $this->load->view('login/index', $data);                    
    }

}*/ 
    
    public function index() {

        $this->form_validation->set_rules('email', 'E-mail', 'trim|require|valid_mail');
        $this->form_validation->set_rules('senha', 'Senha', 'trim|require');

        if ($this->form_validation->run() == TRUE) {
            
            //echo do_hash($this->input->post('senha'));

            //echo '<pre>';
                //echo print_r($this->input->post());

        } else {
            // titulo
            $data['titulo'] = 'Login';
            $data['tituloLogin'] = 'Caasaif';

            $this->load->view('login/view_login', $data);   
        }

    }

    // A validação e os dados estão sendo tratados pela função enviar //
    public function enviar() {

        if($this->input->post()){

            $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
            if ($this->form_validation->run() == TRUE) {
                
                $email = $this->input->post('email');
                $senha = do_hash($this->input->post('senha'));
                $login = $this->login_model->login($email, $senha);

                print_r($login);
                exit;
                
                if( $login ) {

                    $dadosAcesso = [
                        'logado' => TRUE,
                        'nome'   => $login->nome,
                        'email'  => $login->email
                    ];

                } 

                $this->session->set_userdata($dadosAcesso);

                if ($this->session->userdata('logado') == TRUE) {
                    redirect('principal');
                } else {
                    $this->session->set_flashdata('erro_login', 'Erro ao tentar logar no sistema');
                }
            
            }            
            
            //echo do_hash($this->input->post('senha'));            
            //echo '<pre>';
                //print_r($this->input->post());

        }
    }  
}

?>
