<?php
require_once 'classes/Ativo.php';
require_once 'classes/Dividendo.php';

function calcularTotalInvestido() {
    $ativo = new Ativo();
    $investimentos = $ativo->calcularPrecoMedio();

    $total = 0;
    foreach ($investimentos as $item) {
        $total += $item['total_valor'];
    }
    return number_format($total, 2, ',', '.');
}

function calcularTotalDividendos() {
    $dividendo = new Dividendo();
    $dividendos = $dividendo->listarDividendos();

    $total = 0;
    foreach ($dividendos as $item) {
        $total += $item['valor'];
    }
    return number_format($total, 2, ',', '.');
}
?>
