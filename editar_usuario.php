<?php
    require_once 'classes/Usuario.php';

    $usuario = new Usuario();

    if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
        $usuarioSelecionado = $usuario->buscarUsuario($_GET['id']);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usuario->alterarUsuario($_POST['id'], $_POST['nome'], $_POST['email']);
        header('Location: usuarios.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Editar Usuario</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $usuarioSelecionado['id'] ?>">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" required value="<?= $usuarioSelecionado['nome'] ?>">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" required value="<?= $usuarioSelecionado['email'] ?>">
        <button type="submit">Salvar Alterações</button>
    </form>
</body>
</html>