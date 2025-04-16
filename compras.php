<?php
    // Inclui o arquivo que contém a definição da classe Compra (responsável por interagir com o banco de dados)
    require_once 'classes/Compra.php';

    // Verifica se a requisição foi feita via método POST (ou seja, se o formulário foi enviado)
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Cria uma nova instância da classe Compra
        $compra = new Compra();

        // Chama o método adicionarCompra() passando os dados recebidos pelo formulário via POST
        $compra->adicionarCompra(
            $_POST['ativo'],           // Nome ou código do ativo (ex: PETR4, ITUB3, etc.)
            $_POST['quantidade'],      // Quantidade comprada
            $_POST['valor_unitario'],  // Valor de cada unidade do ativo
            $_POST['data_compra']      // Data da compra
        );

        // Exibe uma mensagem de sucesso após a inserção
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
<?php require_once 'header.php'; ?>

    <h1>Cadastrar compras de ativo</h1>

    <!-- Formulário para envio de dados de compra -->
    <!-- O método POST envia os dados de forma segura ao servidor -->
    <form method="POST">
        <label for="ativo">Ativo</label>
        <input type="text" id="ativo" name="ativo" required> <!-- Campo para o nome ou código do ativo -->

        <br>

        <label for="quantidade">Quantidade</label>
        <input type="number" id="quantidade" name="quantidade" required> <!-- Campo para quantidade adquirida -->

        <br>

        <label for="valor_unitario">Valor Unitário</label>
        <input type="number" name="valor_unitario" id="valor_unitario" required> <!-- Campo para valor de cada unidade -->

        <br>

        <label for="data_compra">Data da Compra</label>
        <input type="date" name="data_compra" id="data_compra" required> <!-- Campo para a data da compra -->

        <br>

        <button type="submit">Cadastrar</button> <!-- Botão que envia o formulário -->
    </form>
</body>
</html>
