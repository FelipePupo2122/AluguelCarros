<?php
require_once '../config/database.php';
require_once '../modelos/Aluguel.php';

class AluguelController {
    private $conexao;
    private $aluguel;

    public function __construct() {
        $banco = new BancoDados();
        $this->conexao = $banco->getConexao();
        $this->aluguel = new Aluguel($this->conexao);
    }

    public function index() {
        $alugueis = $this->aluguel->listarTodos();
        include_once '../visoes/alugueis/index.php';
    }

    public function criar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->aluguel->carro_id = $_POST['carro_id'];
            $this->aluguel->usuario_id = $_POST['usuario_id'];
            $this->aluguel->data_inicio = $_POST['data_inicio'];
            $this->aluguel->data_fim = $_POST['data_fim'];

            if ($this->aluguel->criar()) {
                header('Location: index.php');
                exit();
            } else {
                echo "Erro ao criar o aluguel.";
            }
        }

        $carros_disponiveis = $this->aluguel->listarCarrosDisponiveis();
        $usuarios_disponiveis = $this->aluguel->listarUsuariosDisponiveis();

        include_once '../visoes/alugueis/criar.php';
    }

    public function mostrar() {
        if (!isset($_GET['id'])) {
            header('Location: index.php');
            exit();
        }

        $this->aluguel->id = $_GET['id'];
        $aluguel = $this->aluguel->buscarPorId();

        include_once '../visoes/alugueis/mostrar.php';
    }

    public function deletar() {
        if (!isset($_GET['id'])) {
            header('Location: index.php');
            exit();
        }

        $this->aluguel->id = $_GET['id'];

        if ($this->aluguel->deletar()) {
            header('Location: index.php');
            exit();
        } else {
            echo "Erro ao deletar o aluguel.";
        }
    }
}
?>
