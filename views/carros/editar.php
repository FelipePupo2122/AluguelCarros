<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Carro</title>
    <link rel="stylesheet" href="../../assets/css/estilo.css">
</head>
<body>
    <?php include_once '../templates/cabecalho.php'; ?>
    <h2>Editar Carro</h2>
    <form action="editar.php?id=<?= $carro['id'] ?>" method="post">
        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca" value="<?= $carro['marca'] ?>" required>

        <label for="modelo">Modelo:</label>
        <input type="text" id="modelo" name="modelo" value="<?= $carro['modelo'] ?>" required>

        <label for="ano">Ano:</label>
        <input type="number" id="ano" name="ano" value="<?= $carro['ano'] ?>" required>

        <label for="preco">Preço:</label>
        <input type="number" id="preco" name="preco" value="<?= $carro['preco'] ?>" step="0.01" required>

        <button type="submit">Salvar Alterações</button>
    </form>
    <?php include_once '../templates/rodape.php'; ?>
</body>
</html>
