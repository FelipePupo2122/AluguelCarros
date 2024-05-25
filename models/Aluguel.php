<?php
class Aluguel {
    private $conexao;
    private $tabela = "alugueis";

    public $id;
    public $id_carro;
    public $id_usuario;
    public $data_inicio;
    public $data_fim;

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
        $query = "INSERT INTO " . $this->tabela . " SET id_carro=:id_carro, id_usuario=:id_usuario, data_inicio=:data_inicio, data_fim=:data_fim";
        $stmt = $this->conexao->prepare($query);

        $this->id_carro = htmlspecialchars(strip_tags($this->id_carro));
        $this->id_usuario = htmlspecialchars(strip_tags($this->id_usuario));
        $this->data_inicio = htmlspecialchars(strip_tags($this->data_inicio));
        $this->data_fim = htmlspecialchars(strip_tags($this->data_fim));

        $stmt->bindParam(":id_carro", $this->id_carro);
        $stmt->bindParam(":id_usuario", $this->id_usuario);
        $stmt->bindParam(":data_inicio", $this->data_inicio);
        $stmt->bindParam(":data_fim", $this->data_fim);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function atualizar() {
        $query = "UPDATE " . $this->tabela . " SET id_carro = :id_carro, id_usuario = :id_usuario, data_inicio = :data_inicio, data_fim = :data_fim WHERE id = :id";
        $stmt = $this->conexao->prepare($query);

        $this->id_carro = htmlspecialchars(strip_tags($this->id_carro));
        $this->id_usuario = htmlspecialchars(strip_tags($this->id_usuario));
        $this->data_inicio = htmlspecialchars(strip_tags($this->data_inicio));
        $this->data_fim = htmlspecialchars(strip_tags($this->data_fim));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(":id_carro", $this->id_carro);
        $stmt->bindParam(":id_usuario", $this->id_usuario);
        $stmt->bindParam(":data_inicio", $this->data_inicio);
        $stmt->bindParam(":data_fim", $this->data_fim);
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
