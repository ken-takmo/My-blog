<?php

require('functions.php');

use Blog\Functions;


$result = Functions::getBlogDetail($_GET['id']);

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
    <h3>タイトル：<?= Utils::h($result['title']) ?></h3>
    <p>投稿日時：<?= Utils::h($result['post_at']) ?></p>
    <p>カテゴリー：<?= Utils::h(Functions::setCategoryName($result['category'])) ?></p>
    <hr>
    <p>本文：<?= Utils::h($result['content'] ?></p>
    <br>
    <p><a href="index.php">ブログ一覧</a></p>
</body>
</html>