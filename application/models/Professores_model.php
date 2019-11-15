<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Professores_model extends CI_model {

        public function list() {

            $query = $this->db->get('professor');
            return $query->result();
        
        }

        public function doInsert($dados=NULL) {

            if (is_array($dados)) {
                $this->db->insert('professor', $dados);
            }

        }

        public function getProfessorId($id=NULL) {
            
            if ($id) {
                
                $this->db->where('idProfessor', $id);
                $this->db->limit(1);
                return $this->db->get('professor')->row();

            }
        }

        public function doUpdate($dados, $condicao=NULL) {

            if (is_array($dados) && $condicao) {
                $this->db->update('professor', $dados, $condicao);
            }

        }
    
    }
    
?>