<?php
    require_once 'classes/Usuario.php';

    $usuario = new Usuario();

    if($_SERVER['REQUEST_METHOD'] === "POST"){
        if(isset($_POST['excluir'])){
            //fazer a exclusao
            $usuario->excluirUsuario($_POST['id']);
        }
    }

    $usuarios = $usuario->listarUsuarios();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Usuários</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Gerenciar Usuários</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Ações</th>
        </tr>
        <?php foreach($usuarios as $usuario): ?>
            <tr>
                <td><?= $usuario['id'] ?></td>
                <td><?= $usuario['nome'] ?></td>
                <td><?= $usuario['email'] ?></td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
                        <button type="submit" name="excluir">Excluir</button>
                    </form>
                    <form method="GET" action="editar_usuario.php">
                        <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
                        <button type="submit">Editar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</body>
</html>