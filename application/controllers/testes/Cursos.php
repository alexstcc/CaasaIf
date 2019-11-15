<?php
    defined("BASEPATH") OR exit('No direct script access allowed');

    class Cursos extends CI_Controller {
        
        public function index($funcao = NULL) {
            /*$this->load->database();
            $this->load->model("cursos_model");
            $cursos = $this->cursos_model->buscaCursos();

            $dados = array("cursos" => $cursos);

            $this->load->helper("url");
            $this->load->helper("form");

            $this->load->view("cursos/index.php", dados);*/
            if ($funcao == 1) {
                $this->listar();
            }
            if ($funcao == 2) {
                $this->adicionar();
            }
            if ($funcao == 3) {
                $this->alterar();
            }
            if ($funcao == NULL) {
                echo "Você deve passar uma função";
            }
        }

        public function insere() {

        }

        // Abaixo as functions exemplos do curso de Codeigniter da Udemy

        private function listar() {
            echo "listar";
        }

        public function adicionar() {
            echo "adicionar";    
        }

        public function alterar() {
            echo "alterar";
        }
 
    }
?>