<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Aulas_model extends CI_Model {

        /*public function list() {
            $query = $this->db->get('aula');
            return $query->result();
        }*/

        public function list() {
            $this->db->select('*');
            $this->db->from('disciplina');
            $this->db->join('formacao', 'disciplina.idDisciplina = formacao.idDisciplina');
            $this->db->join('aula', 'aula.idFormacao = formacao.idFormacao');
            
            $query = $this->db->get();
            return $query->result();
        }
    }