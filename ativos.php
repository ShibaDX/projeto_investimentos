<?php
    // Inclui o arquivo que contém a classe Ativo, responsável por operações com ativos no banco de dados
    require_once 'classes/Ativo.php';

    // Cria uma instância da classe Ativo
    $ativo = new Ativo();

    // Chama o método calcularPrecoMedio(), que retorna uma lista com os ativos e seus respectivos preços médios
    $relatorio = $ativo->calcularPrecoMedio();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Ativos - Preço Médio</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php require_once 'header.php'; ?>

    <h1>Relatório de Ativos - Preço Médio</h1>

    <!-- Tabela que exibe os dados dos ativos -->
    <table border="1">
        <tr>
            <td>Ativo</td> <!-- Nome ou código do ativo (ex: PETR4) -->
            <td>Total Comprado</td> <!-- Soma das quantidades compradas do ativo -->
            <td>Preço Médio</td> <!-- Valor médio pago por unidade do ativo -->
        </tr>

        <!-- Percorre o array de ativos e exibe cada linha de dados -->
        <?php foreach($relatorio as $linha): ?>
            <tr>
                <td><?= $linha['ativo'] ?></td> <!-- Exibe o nome/código do ativo -->
                <td><?= $linha['total_quantidade'] ?></td> <!-- Exibe a quantidade total comprada -->
                <td><?= number_format($linha['preco_medio'], 2, ',', '.') ?></td> <!-- Formata e exibe o preço médio com 2 casas decimais no formato brasileiro -->
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>
