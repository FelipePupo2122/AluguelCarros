<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Aluguel</title>
    <link rel="stylesheet" href="../../assets/css/estilo.css">
</head>
<body>
    <?php include_once '../templates/cabecalho.php'; ?>
    <h2>Detalhes do Aluguel</h2>
    <table>
        <tr>
            <th>ID:</th>
            <td><?= $aluguel['id'] ?></td>
        </tr>
        <tr>
            <th>Carro:</th>
            <td><?= $aluguel['marca'] ?> <?= $aluguel['modelo'] ?></td>
        </tr>
        <tr>
            <th>Usuário:</th>
            <td><?= $aluguel['nome'] ?></td>
        </tr>
        <tr>
            <th>Data de Início:</th>
            <td><?= $aluguel['data_inicio'] ?></td>
        </tr>
        <tr>
            <th>Data de Término:</th>
            <td><?= $aluguel['data_fim'] ?></td>
        </tr>
    </table>
    <a href="index.php">Voltar para Lista de Aluguéis</a>
    <?php include_once '../templates/rodape.php'; ?>
</body>
</html>
