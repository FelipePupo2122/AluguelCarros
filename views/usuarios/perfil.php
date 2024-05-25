<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
</head>
<body>
    <h2>Perfil do Usuário</h2>
    <p>Bem-vindo, <?= $_SESSION['usuario_nome'] ?>!</p>
    <p><a href="logout.php">Sair</a></p>
</body>
</html>
