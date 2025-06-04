<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['cep'])) {
    $url = "https://viacep.com.br/ws/" . $_GET['cep'] . "/json/";

    $dados = json_decode(file_get_contents($url), true);

    //var_dump($dados);

    $cep = $dados["cep"];
    $logradouro = $dados["logradouro"];
    $complemento = $dados["complemento"];
    $bairro = $dados["bairro"];
    $cidade = $dados["localidade"];
    $uf = $dados["uf"];
    $regiao = $dados["regiao"];
    $ddd = $dados["ddd"];
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Endereço</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1 style="text-align: center;">Buscador de CEP</h1>
    <form method="GET">
        <label for="cep">CEP</label>
        <input type="text" name="cep" value="<?php echo (isset($_GET['cep']) ? $cep : "") ?>">
        <button>Buscar CEP</button>
    </form>
    <?php if (isset($_GET['cep'])): ?>
        <form>
            <label for="logradouro">Logradouro</label>
            <input type="text" value="<?= $logradouro ?>">

            <label for="complemento">Complemento</label>
            <input type="text" value="<?= $complemento ?>">

            <label for="bairro">Bairro</label>
            <input type="text" value="<?= $bairro ?>">

            <label for="cidade">Cidade</label>
            <input type="text" value="<?= $cidade ?>">

            <label for="uf">UF</label>
            <input type="text" value="<?= $uf ?>">

            <label for="regiao">Região</label>
            <input type="text" value="<?= $regiao ?>">

            <label for="ddd">DDD</label>
            <input type="text" value="<?= $ddd ?>">
        </form>
    <?php endif ?>
</body>

</html>