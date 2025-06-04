<?php
    require_once 'classes/PostApiService.php';

    $api = new PostApiService();
    $posts = $api->getPosts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Posts Externos</title>
    <style>
        .cards {
            display: flex;
            flex-wrap: wrap;
        }

        .card{
            flex:1;
            min-width: 250px;
            background-color: #fff;
            padding: 20px;
            border-left: 4px solid #004d99;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <h1>Posts Externos (API JSONPlaceHolder)</h1>
    <?php if (empty($posts)): ?>
        <p>Não foi possível carregar os posts da API.</p>
    <?php else: ?>
        <div class="cards">
            <?php foreach($posts as $post): ?>
                <div class="card">
                    <h2><?= htmlspecialchars($post['title']) ?></h2>
                    <p><?= htmlspecialchars($post['body']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</body>
</html>