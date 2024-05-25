<?php
session_start();
require_once '../config/database.php';
require_once '../models/Usuario.php';

$banco = new BancoDados();
$conexao = $banco->getConexao();
$usuario = new Usuario($conexao);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario->email = $_POST['email'];
    $usuario->senha = $_POST['senha'];

    if ($usuario->login()) {
        $_SESSION['usuario_id'] = $usuario->id;
        $_SESSION['usuario_nome'] = $usuario->nome;
        header('Location: perfil.php');
        exit();
    } else {
        $erro = "Email ou senha incorretos.";
    }
}
?>
<?php include_once '../templates/cabecalho.php'; ?>
<h2>Login</h2>
<form action="login.php" method="post">
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>

    <label for="senha">Senha:</label>
    <input type="password" name="senha" id="senha" required>

    <button type="submit">Entrar</button>
</form>
<?php if (isset($erro)): ?>
    <p style="color: red;"><?= $erro ?></p>
<?php endif; ?>
<?php include_once '../templates/rodape.php'; ?>
