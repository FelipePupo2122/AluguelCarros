<?php
class Usuario {
    private $conexao;
    private $tabela = "usuarios";

    public $id;
    public $nome;
    public $email;
    public $senha;

    public function __construct($db) {
        $this->conexao = $db;
    }

    public function registrar() {
        $query = "INSERT INTO " . $this->tabela . " SET nome=:nome, email=:email, senha=:senha";
        $stmt = $this->conexao->prepare($query);

        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->senha = password_hash(htmlspecialchars(strip_tags($this->senha)), PASSWORD_BCRYPT);

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":senha", $this->senha);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function login() {
        $query = "SELECT * FROM " . $this->tabela . " WHERE email = :email";
        $stmt = $this->conexao->prepare($query);

        $this->email = htmlspecialchars(strip_tags($this->email));

        $stmt->bindParam(":email", $this->email);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if($usuario && password_verify($this->senha, $usuario['senha'])) {
            $this->id = $usuario['id'];
            $this->nome = $usuario['nome'];
            return true;
        }

        return false;
    }
}
?>
