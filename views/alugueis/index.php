<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Aluguéis</title>
    <link rel="stylesheet" href="../../assets/css/estilo.css">
</head>
<body>
    <?php include_once '../templates/cabecalho.php'; ?>
    <h2>Lista de Aluguéis</h2>
    <a href="criar.php">Criar Novo Aluguel</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Carro</th>
                <th>Usuário</th>
                <th>Data de Início</th>
                <th>Data de Término</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alugueis as $aluguel): ?>
                <tr>
                    <td><?= $aluguel['id'] ?></td>
                    <td><?= $aluguel['marca'] ?> <?= $aluguel['modelo'] ?></td>
                    <td><?= $aluguel['nome'] ?></td>
                    <td><?= $aluguel['data_inicio'] ?></td>
                    <td><?= $aluguel['data_fim'] ?></td>
                    <td>
                        <a href="mostrar.php?id=<?= $aluguel['id'] ?>">Mostrar</a>
                        <a href="editar.php?id=<?= $aluguel['id'] ?>">Editar</a>
                        <a href="deletar.php?id=<?= $aluguel['id'] ?>">Deletar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php include_once '../templates/rodape.php'; ?>
</body>
</html>
