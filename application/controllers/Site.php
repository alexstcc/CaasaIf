<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	public function __construct() {

		parent::__construct();

		if ( !$this->session->userdata('logado') ) {
			$this->session->set_flashdata('erro_login', '<div class="alert alert-danger alert-dismissible">
															Você precisa realizar login! 
														 </div>');
			redirect('login');
		}
		// carregar o model Cursos_model.php
		$this->load->model('cursos_model', 'cursos');

		//carregar o helper funcoes_helper
		$this->load->helper('funcoes_helper', 'funcoes');

	}

	public function index() {
		
		// titulo
		$data['titulo'] = 'CaasaIf';

		$this->load->view('layout/topo', $data);
		$this->load->view('site/conteudo');
		$this->load->view('layout/rodape');

	}

	public function cursos() {

		// titulo
		$data['titulo'] = 'Lista de cursos';
		$data['tituloConteudo'] = 'Cursos';

		//carrega dados do banco de dados
		$data['cursos'] = $this->cursos->listarCursos();

		$this->load->view('layout/topo', $data);
		$this->load->view('cursos/index');
		$this->load->view('layout/rodape');

	}

	public function alunos() {

		// titulo
		$data['titulo'] = 'Alunos';

		// carregar o model Alunos_model.php
		$this->load->model('alunos_model', 'alunos');

		// carrega dados do banco de dados
		$data['alunos'] = $this->alunos->listarAlunos();

		// carrega a view
		$this->load->view('layout/topo', $data);
		$this->load->view('alunos/index');
		$this->load->view('layout/rodape');

	}

	public function professores() {
		
		// titulo
		$data['titulo'] = 'Professores';

	}

	public function info($id=NULL) {

		if ($id == NULL) {
			
			echo 'Você precisa informar um id valido.';

		}else {

			$query = $this->cursos->getById($id);

			if ($query) {
				$data['titulo'] = $query->nomeCurso;
				$data['info']   = $query;

				$this->load->view('layout/topo', $data);
				$this->load->view('cursos/info');
				$this->load->view('layout/rodape');	
			}else {
				
				echo 'Você precisa informar um id valido.';
			
			}	
		}
	}

	public function formDisciplinas() {

		$data['titulo'] = 'Disciplinas';

		// Carregar helper form
		$this->load->helper('form');
		
		$this->load->view('layout/topo', $data);
		$this->load->view('formDisciplinas/index');
		$this->load->view('layout/rodape');

	}

	public function formAlunos() {

		$data['titulo'] = 'Alunos';

		// Carregar helper form
		$this->load->helper('form');
		
		//carregamento da library form_validation
        $this->load->library('form_validation');

        // -> required
        // -> min_length[3]
		$this->form_validation->set_rules('nomeAluno', 'NOME', 'required|min_length[3]');
		$this->form_validation->set_rules('sobrenomeAluno', 'SOBRENOME', 'required|min_length[3]');

		// -> required
        // -> valid_email
		$this->form_validation->set_rules('emailAluno', 'E-MAIL', 'required|valid_email', 
			array('valid_email'=>'Você deve passar um e-mail válido!'));

		// -> numeric
		$this->form_validation->set_rules('tag', 'TAG', 'required|numeric', 
			array('numeric'=>'O campo TAG aceita apenas numeros'));

		// -> trim
		// -> required
		// -> min_length[6]
		// -> max_length[8]
		$this->form_validation->set_rules('senha', 'SENHA', 'required|min_length[6]|max_length[8]',
			array('required'=>'Você deve passar uma senha!',
				  'min_length'=>'Senha deve ter no minimo 6 letras ou numeros!',
				  'max_length'=>'Senha deve ter no maxino 8 letras ou numeros!'));

		// -> required
		// -> matches
		$this->form_validation->set_rules('senha2', 'Repita a senha', 'required|matches[senha]',
			array('required'=>'Você deve informar o campo Reppita a senha!',
				  'matches'=>'As senhas devem ser iguais!'));

        if ($this->form_validation->run() == TRUE) {
            echo 'Formulario validado com sucesso!';
        }else {
            $this->load->view('layout/topo', $data);
            $this->load->view('formAlunos/index');
            $this->load->view('layout/rodape');
		}

	}

	public function formUsuarios() {

		$data['titulo'] = 'Usuários';

		// Carregar helper form
		$this->load->helper('form');
		
		//carregamento da library form_validation
        $this->load->library('form_validation');

        // -> required
        // -> min_length[3]
		$this->form_validation->set_rules('nomeUsuario', 'NOME', 'required|min_length[3]');
		$this->form_validation->set_rules('sobrenomeUsuario', 'SOBRENOME', 'required|min_length[3]');

		// -> required
        // -> valid_email
		$this->form_validation->set_rules('emailUsuario', 'E-MAIL', 'required|valid_email', 
			array('valid_email'=>'Você deve passar um e-mail válido!'));

		// -> trim
		// -> required
		// -> min_length[6]
		// -> max_length[8]
		$this->form_validation->set_rules('senha', 'SENHA', 'required|min_length[6]|max_length[8]',
			array('required'=>'Você deve passar uma senha!',
				  'min_length'=>'Senha deve ter no minimo 6 letras ou numeros!',
				  'max_length'=>'Senha deve ter no maxino 8 letras ou numeros!'));

		// -> required
		// -> matches
		$this->form_validation->set_rules('senha2', 'Repita a senha', 'required|matches[senha]',
			array('required'=>'Você deve informar o campo Repita a senha!',
				  'matches'=>'As senhas devem ser iguais!'));

        if ($this->form_validation->run() == TRUE) {
            echo 'Formulario validado com sucesso!';
        }else {
            $this->load->view('layout/topo', $data);
            $this->load->view('formUsuarios/index');
            $this->load->view('layout/rodape');
		}

	}

	public function secao() {

		echo '<h1>Trabalhando com seção</h1>';
		//$_SESSION['chave'] = 'Controle de acesso automatizado em sala de aula';
		//unset($_SESSION['chave']);
		//session_destroy();

		// usando o CI
		//$this->session->set_userdata('aula21', 'Exemplo de sessão no CI');
		//$this->session->unset_userdata('aula21');

		/*$dadosSession = [
			'nome' => 'Alex',
			'email' => 'axsilva74@gmail.com',
			'logado' => TRUE,
		];

		$this->session->set_userdata($dadosSession);*/

		//$this->session->sess_destroy();

		//flash data
		$this->session->set_flashdata('msg', 'Cadastro realizado com sucesso');
	}  
	
	public function mostrar() {

		//echo $_SESSION['chave'];

		echo '<pre>'; 
			print_r($this->session);

		/*$nome = $this->session->userdata('nome');
		echo $nome;*/

	}

	public function flash() {

		echo $this->session->flashdata('msg');

	} 
	/*public function validar() {

        $data['titulo'] = 'Biblioteca Form_validation';

        //carregar helper form
        $this->load->helper('form');

    }

	public function teste1() {
		echo "Teste 01";
	}

	public function teste2($id=NULL) {
		if ($id) {
			echo "Função de teste" . $id;
		}else {
			echo "Você deve passar uma ID";
		}
	}*/
}
