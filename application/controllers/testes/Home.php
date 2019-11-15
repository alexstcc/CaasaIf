<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
        //Parametros
        $data['titulo']        = 'CAASAIF';
        $data['conteudo']      = 'Controle de Acesso Automatizado em Salas de aula do IFSul';
        $data['titulo_pagina'] = 'Caasaif';
        
        //carrega uma view
        $this->load->view('home_view', $data);
		
    }
    
    public function pagina($pagina=NULL) {

        // topo
        $data['titulo'] = 'Controle de Acesso Automatizado em Salas de Aula em uma Instituição de ensino';

        // conteudo
        $data['conteudo'] = 'Área administrativa';

        // contato
        $data['contato'] = 'axsilva74@gmail.com';

        // rodape
        $data['rodape'] = 'Todos os direitos reservados';

        $this->load->view('layout/topo', $data);

        if ($pagina == 'contato') {
            $this->load->view('site/contato');
        }

        if ($pagina == NULL) {
            $this->load->view('site/conteudo');
        }

        $this->load->view('layout/rodape');
    }

}
