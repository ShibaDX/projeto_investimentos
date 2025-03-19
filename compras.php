<?php
    require_once 'classes/Compra.php'; // importa o arquivo Compra.php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') { // verifica se o método da requisição é POST, ou seja, o código dentro do if só é executado quando o formulário for enviado

        $compra = new Compra(); // cria um objeto da classe Compra

        $compra->adicionarCompra($_POST['ativo'], $_POST['quantidade'], $_POST['valor_unitario'], $_POST['data_compra']); // chama o método adicionarCompra() da classe Compra, passando os valores que foram enviados pelo formulário HTML
        echo "Compra adicionada com sucesso!";
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Compras</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Cadastrar compras de ativo</h1>

    <form method="POST">
        <label for="ativo">Ativo</label>
        <input type="text" id="ativo" name="ativo" required>
        <br>
        <label for="quantidade">Quantidade</label>
        <input type="number" id="quantidade" name="quantidade" required>
        <br>
        <label for="valor_unitario">Valor Unitário</label>
        <input type="number" name="valor_unitario" id="valor_unitario" required>
        <br>
        <label for="data_compra">Data da Compra</label>
        <input type="date" name="data_compra" id="data_compra" required>
        <br>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>