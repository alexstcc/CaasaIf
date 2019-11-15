<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Presencas_model extends CI_Model {

        public function list() {
            $query = $this->db->get('frequencia');
            return $query->result();
        }
    }