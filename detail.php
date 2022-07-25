<?php

require('functions.php');

use Blog\Func;

$result = Func\getBlogDetail($_GET['id']);

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ブログ詳細</title>
</head>
<body>
    <h2>ブログ詳細</h2>
    <h3>タイトル：<?= $result['title'] ?></h3>
    <p>投稿日時：<?= $result['post_at'] ?></p>
    <p>カテゴリー：<?= Func\setCategoryName($result['category']) ?></p>
    <hr>
    <p>本文：<?= $result['content'] ?></p>
    <br>
    <p><a href="index.php">ブログ一覧</a></p>
</body>
</html>