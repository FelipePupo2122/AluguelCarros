<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Carro</title>
    <link rel="stylesheet" href="../../assets/css/estilo.css">
</head>
<body>
    <?php include_once '../templates/cabecalho.php'; ?>
    <h2>Detalhes do Carro</h2>
    <table>
        <tr>
            <th>ID:</th>
            <td><?= $carro['id'] ?></td>
        </tr>
        <tr>
            <th>Marca:</th>
            <td><?= $carro['marca'] ?></td>
        </tr>
        <tr>
            <th>Modelo:</th>
            <td><?= $carro['modelo'] ?></td>
        </tr>
        <tr>
            <th>Ano:</th>
            <td><?= $carro['ano'] ?></td>
        </tr>
        <tr>
            <th>Preço:</th>
            <td>R$ <?= number_format($carro['preco'], 2, ',', '.') ?></td>
        </tr>
    </table>
    <a href="index.php">Voltar para Lista de Carros</a>
    <?php include_once '../templates/rodape.php'; ?>
</body>
</html>
