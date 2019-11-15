<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Disciplinas_model extends CI_model {

        public function list() {

            $query = $this->db->get('disciplina');
            return $query->result();
        
        }

        public function doInsert($dados=NULL) {

            if (is_array($dados)) {
                $this->db->insert('disciplina', $dados);
            }

        }

        public function getDisciplinaId($id=NULL) {
            
            if ($id) {
                
                $this->db->where('idDisciplina', $id);
                $this->db->limit(1);
                return $this->db->get('disciplina')->row();

            }
        }

        public function doUpdate($dados, $condicao=NULL) {

            if (is_array($dados) && $condicao) {
                $this->db->update('disiciplinas', $dados, $condicao);
            }

        }
    
    }
    
?>