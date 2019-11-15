<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Login_model extends CI_model {

        public function login($email=NULL, $senha=NULL) {
            echo '<pre>';
            echo print_r($this->input->post());
            echo '</pre>';

            if($email && $senha){
                $this->db->where(['login' => $email, 'senha' => do_hash($senha)]);
                $this->db->limit(1);
                $query = $this->db->get('alunos');

                if($query->num_rows() == 1) {
                    $this->session->set_flashdata('msg_login', '<div class="alert alert-success alert-dismissible">
                                                                Seja bem vindo ao CaasaIf
                                                             </div>');
                    
                    return $query->row();
                } else {
                    $this->session->set_flashdata('erro_login', '<div class="alert alert-danger alert-dismissible">
                                                                Erro ao logar ao sistema
                                                             </div>');
                    return FALSE;
                }

            } else {
                $this->session->set_flashdata('erro_login', '<div class="alert alert-danger alert-dismissible">
                                                                Erro ao logar ao sistema
                                                             </div>');
                return FALSE;
            }

        }

    }