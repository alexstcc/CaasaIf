<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Turmas_model extends CI_Model {

        public function list() {
            $this->db->select('*');
            $this->db->from('disciplina');
            $this->db->join('formacao', 'disciplina.idDisciplina = formacao.idDisciplina');
            $this->db->join('turmas', 'turmas.idTurma = formacao.idTurma');
            
            $query = $this->db->get();
            return $query->result();
        }
    }