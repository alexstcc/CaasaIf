<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Cursos_model extends CI_Model {

        public function listarCursos() {

            //$this->db->where('idCurso', 1);
            $this->db->order_by('nomeCurso', 'desc');
            $query = $this->db->get('cursos');
            return $query->result();

        }

        public function getById($id=NULL) {

            if ($id) {

                $this->db->select('cursos.*, disciplina.nomeDisciplina');
                $this->db->from('cursos');
                $this->db->join('disciplina', 'cursos.idCurso = disciplina.idCurso','left');                
                $this->db->where('cursos.idCurso', $id);
                $this->db->limit(1);
                $query = $this->db->get();
                return $query->row();
                    
            }
                

        }

    }
?>