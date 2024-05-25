<?php
require_once '../config/database.php';
require_once '../modelos/Usuario.php';

class UsuarioControlador {
    private $conexao;
    private $usuario;

    public function __construct() {
        $banco = new BancoDados();
        $this->conexao = $banco->getConexao();
        $this->usuario = new Usuario($this->conexao);
    }

    public function index() {
        $usuarios = $this->usuario->listarTodos(); 
       
        if ($usuarios) {         
            include_once '../visoes/usuarios/listar.php';
        } else {
            echo "Nenhum usuário encontrado.";
        }
    }
    

    public function registrar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->usuario->nome = $_POST['nome'];
            $this->usuario->email = $_POST['email'];
            $this->usuario->senha = $_POST['senha'];

            if ($this->usuario->registrar()) {
                header('Location: login.php');
                exit();
            } else {
                echo "Erro ao registrar o usuário.";
            }
        }

        include_once '../visoes/usuarios/registrar.php';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->usuario->email = $_POST['email'];
            $this->usuario->senha = $_POST['senha'];

            if ($this->usuario->login()) {
                session_start();
                $_SESSION['usuario_id'] = $this->usuario->id;
                $_SESSION['usuario_nome'] = $this->usuario->nome;
                header('Location: perfil.php');
                exit();
            } else {
                $erro = "Email ou senha incorretos.";
            }
        }

        include_once '../visoes/usuarios/login.php';
    }

    public function perfil() {
        session_start();
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: login.php');
            exit();
        }

        $id = $_SESSION['usuario_id'];
        $this->usuario->id = $id;
        $dados_usuario = $this->usuario->obterDadosUsuario();

        include_once '../visoes/usuarios/perfil.php';
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header('Location: login.php');
        exit();
    }
}
?>
