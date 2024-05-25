<?php
require_once '../config/database.php';
require_once '../modelos/Usuario.php';

$banco = new BancoDados();
$conexao = $banco->getConexao();
$usuario = new Usuario($conexao);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario->nome = $_POST['nome'];
    $usuario->email = $_POST['email'];
    $usuario->senha = $_POST['senha'];

    if ($usuario->registrar()) {
        header('Location: login.php');
        exit();
    } else {
        $erro = "Erro ao registrar. Tente novamente.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
</head>
<body>
    <h2>Registrar</h2>
    <form action="registrar.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required>

        <button type="submit">Registrar</button>
    </form>
    <?php if (isset($erro)): ?>
        <p style="color: red;"><?= $erro ?></p>
    <?php endif; ?>
</body>
</html>
