<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Aluguel</title>
    <link rel="stylesheet" href="../../assets/css/estilo.css">
</head>
<body>
    <?php include_once '../templates/cabecalho.php'; ?>
    <h2>Criar Aluguel</h2>
    <form action="criar.php" method="post">
        <label for="carro_id">Carro:</label>
        <select name="carro_id" id="carro_id" required>
            <option value="">Selecione um carro</option>
            <?php foreach ($carros_disponiveis as $carro): ?>
                <option value="<?= $carro['id'] ?>"><?= $carro['marca'] ?> <?= $carro['modelo'] ?></option>
            <?php endforeach; ?>
        </select>

        <label for="usuario_id">Usuário:</label>
        <select name="usuario_id" id="usuario_id" required>
            <option value="">Selecione um usuário</option>
            <?php foreach ($usuarios_disponiveis as $usuario): ?>
                <option value="<?= $usuario['id'] ?>"><?= $usuario['nome'] ?></option>
            <?php endforeach; ?>
        </select>

        <label for="data_inicio">Data de Início:</label>
        <input type="date" name="data_inicio" id="data_inicio" required>

        <label for="data_fim">Data de Término:</label>
        <input type="date" name="data_fim" id="data_fim" required>

        <button type="submit">Criar Aluguel</button>
    </form>
    <?php include_once '../templates/rodape.php'; ?>
</body>
</html>
