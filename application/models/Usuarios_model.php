<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Usuarios_model extends CI_Model {

        public function list() {
            $query = $this->db->get('usuarios');
            return $query->result();
        }

        public function doInsert($dados=NULL) {

            if (is_array($dados)) {
                $this->db->insert('usuarios', $dados);
            }

        }

        public function getUsuarioId($id=NULL) {
            
            if ($id) {
                
                $this->db->where('idUsuario', $id);
                $this->db->limit(1);
                return $this->db->get('usuarios')->row();

            }
        }

        public function doUpdate($dados, $condicao=NULL) {

            if (is_array($dados) && $condicao) {
                $this->db->update('usuarios', $dados, $condicao);
            }

        }

        // Função para apagar usuario
        public function doDelete($condicao=NULL){
            if ($condicao) {
                $this->db->delete('usuarios', $condicao);
                return true;    
            } else {
                return false;
            }            
        }

    }


?>