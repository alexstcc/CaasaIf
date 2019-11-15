<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class StringSecurity extends CI_Controller {
        
        public function index() {

            //$this->load->helper('string');
            //echo random_string('sha1');

            $this->load->helper('security');
            $senha = 'Abc_587';

            echo do_hash($senha); // sha1
            echo '<br />';
            echo do_hash($senha, 'md5');
            
        }

    }
    
    

?>