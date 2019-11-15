<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Alunos_model extends CI_model {

        // Listar todos alunos
        public function list() {
            $query = $this->db->get('alunos');
            return $query->result();        
        }

        // Função para cadastrar aluno
        public function doInsert($dados=NULL) {
            if (is_array($dados)) {
                $this->db->insert('alunos', $dados);
            }
        }

        // Função para buscar um aluno pela sua Id
        public function getAlunoId($id=NULL) {            
            if ($id) {                
                $this->db->where('idAluno', $id);
                $this->db->limit(1);
                return $this->db->get('alunos')->row();
            }
        }

        // Função para atualizar aluno
        public function doUpdate($dados, $condicao=NULL) {
            if (is_array($dados) && $condicao) {
                $this->db->update('alunos', $dados, $condicao);
            }
        }
        
        // Função para apagar aluno
        public function doDelete($condicao=NULL){
            if ($condicao) {
                $this->db->delete('alunos', $condicao);
                return true;    
            } else {
                return false;
            }            
        }
        
    }
    
?>