<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Carros</title>
    <link rel="stylesheet" href="../../assets/css/estilo.css">
</head>
<body>
    <?php include_once '../templates/cabecalho.php'; ?>
    <h2>Lista de Carros</h2>
    <a href="criar.php">Criar Novo Carro</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Ano</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($carros as $carro): ?>
                <tr>
                    <td><?= $carro['id'] ?></td>
                    <td><?= $carro['marca'] ?></td>
                    <td><?= $carro['modelo'] ?></td>
                    <td><?= $carro['ano'] ?></td>
                    <td>R$ <?= number_format($carro['preco'], 2, ',', '.') ?></td>
                    <td>
                        <a href="mostrar.php?id=<?= $carro['id'] ?>">Mostrar</a>
                        <a href="editar.php?id=<?= $carro['id'] ?>">Editar</a>
                        <a href="deletar.php?id=<?= $carro['id'] ?>">Deletar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php include_once '../templates/rodape.php'; ?>
</body>
</html>
