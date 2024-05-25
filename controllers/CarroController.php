<?php
require_once '../config/database.php';
require_once '../modelos/Carro.php';

class CarroController {
    private $conexao;
    private $carro;

    public function __construct() {
        $banco = new BancoDados();
        $this->conexao = $banco->getConexao();
        $this->carro = new Carro($this->conexao);
    }

    public function index() {
        $carros = $this->carro->listarTodos();
        include_once '../visoes/carros/index.php';
    }

    public function criar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->carro->marca = $_POST['marca'];
            $this->carro->modelo = $_POST['modelo'];
            $this->carro->ano = $_POST['ano'];
            $this->carro->preco = $_POST['preco'];

            if ($this->carro->criar()) {
                header('Location: index.php');
                exit();
            } else {
                echo "Erro ao criar o carro.";
            }
        }
        include_once '../visoes/carros/criar.php';
    }

    public function editar() {
        if (!isset($_GET['id'])) {
            header('Location: index.php');
            exit();
        }

        $this->carro->id = $_GET['id'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->carro->marca = $_POST['marca'];
            $this->carro->modelo = $_POST['modelo'];
            $this->carro->ano = $_POST['ano'];
            $this->carro->preco = $_POST['preco'];

            if ($this->carro->atualizar()) {
                header('Location: index.php');
                exit();
            } else {
                echo "Erro ao atualizar o carro.";
            }
        }

        $carro = $this->carro->buscarPorId();

        include_once '../visoes/carros/editar.php';
    }

    public function deletar() {
        if (!isset($_GET['id'])) {
            header('Location: index.php');
            exit();
        }

        $this->carro->id = $_GET['id'];

        if ($this->carro->deletar()) {
            header('Location: index.php');
            exit();
        } else {
            echo "Erro ao deletar o carro.";
        }
    }
}
?>
