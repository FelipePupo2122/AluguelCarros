<?php
class Carro {
    private $conexao;
    private $tabela = "carros";

    public $id;
    public $marca;
    public $modelo;
    public $ano;
    public $preco;

    public function __construct($db) {
        $this->conexao = $db;
    }

    public function listar() {
        $query = "SELECT * FROM " . $this->tabela;
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function criar() {
        $query = "INSERT INTO " . $this->tabela . " SET marca=:marca, modelo=:modelo, ano=:ano, preco=:preco";
        $stmt = $this->conexao->prepare($query);

        $this->marca = htmlspecialchars(strip_tags($this->marca));
        $this->modelo = htmlspecialchars(strip_tags($this->modelo));
        $this->ano = htmlspecialchars(strip_tags($this->ano));
        $this->preco = htmlspecialchars(strip_tags($this->preco));

        $stmt->bindParam(":marca", $this->marca);
        $stmt->bindParam(":modelo", $this->modelo);
        $stmt->bindParam(":ano", $this->ano);
        $stmt->bindParam(":preco", $this->preco);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function atualizar() {
        $query = "UPDATE " . $this->tabela . " SET marca = :marca, modelo = :modelo, ano = :ano, preco = :preco WHERE id = :id";
        $stmt = $this->conexao->prepare($query);

        $this->marca = htmlspecialchars(strip_tags($this->marca));
        $this->modelo = htmlspecialchars(strip_tags($this->modelo));
        $this->ano = htmlspecialchars(strip_tags($this->ano));
        $this->preco = htmlspecialchars(strip_tags($this->preco));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(":marca", $this->marca);
        $stmt->bindParam(":modelo", $this->modelo);
        $stmt->bindParam(":ano", $this->ano);
        $stmt->bindParam(":preco", $this->preco);
        $stmt->bindParam(":id", $this->id);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function deletar() {
        $query = "DELETE FROM " . $this->tabela . " WHERE id = :id";
        $stmt = $this->conexao->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(":id", $this->id);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }
}
?>
