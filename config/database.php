<?php
class BancoDados {
    private $host = "localhost";
    private $nome_banco = "aluguel_carros";
    private $usuario = "root";
    private $senha = "";
    public $conexao;

    public function getConexao() {
        $this->conexao = null;

        try {
            $this->conexao = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->nome_banco, $this->usuario, $this->senha);
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conexao->exec("set names utf8");
        } catch(PDOException $exception) {
            echo "Erro de conexão: " . $exception->getMessage();
        }

        return $this->conexao;
    }
}
?>
