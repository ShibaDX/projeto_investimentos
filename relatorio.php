<?php
    require_once 'classes/Ativo.php';
    require_once 'classes/Dividendo.php';

    $ativo = new Ativo();
    $dividendo = new Dividendo();

    $investimentos = $ativo->calcularPrecoMedio();
    $dividendos = $dividendo->calcularDividendosPorAtivo();

    $dadosGrafico = [];

    foreach($investimentos as $item)
    {
        $dadosGrafico[$item['ativo']] = [
            'investido' => $item['total_valor'],
            'dividendos' => 0
        ];
    }

    foreach($dividendos as $item)
    {
        if (isset($dadosGrafico[$item['ativo']])) {
            $dadosGrafico[$item['ativo']]['dividendos'] = $item['total_dividendos'];
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório Investimentos x Dividendos</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php require_once 'header.php'; ?>

    <h1 class="titulo">Relatório de Investimentos X Dividendos</h1>

    <canvas id="graficoInvestimentosDividendos"></canvas>

    <script>
        const dados = <?php echo json_encode($dadosGrafico); ?>;
        const labels = Object.keys(dados);
        console.log(dados);
        console.log(labels);

        const dadosInvestidos = Object.values(dados).map(item => item.investido);
        console.log(dadosInvestidos);
        const dadosDividendos = Object.values(dados).map(item => item.dividendos);

        const ctx = document.getElementById(graficoInvestimentosDividendos)
        .getContext('2d');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Total Investido (R$)',
                        data: dadosInvestidos,
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Dividendos Recebidos (R$)',
                        data: dadosDividendos,
                        backgroundColor: 'rgba(75, 192, 192, 0.5)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                plugin: {
                    legend: {
                        position: 'top'
                    }
                }
            }
        });
    </script>
</body>

</html>