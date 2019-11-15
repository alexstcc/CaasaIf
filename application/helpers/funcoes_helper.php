<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    function formataDataBr($data=NULL) {

        /*
            Formato do banco => 2019-04-23
            Formato Brasil   => 23/04/2017
        */

        if ($data) {
            
            // Separa a data em 3 partes 
            $data_funcao = explode("-", $data);

            /*
                $data_funcao[0] = 2019;
                $data_funcao[1] = 04;
                $data_funcao[2] = 23;
            */

            // Retorno da data no padrao dia/mes/ano
            return $data_funcao[2] .'/'. $data_funcao[1] .'/'. $data_funcao[0];

        }
    }

?>