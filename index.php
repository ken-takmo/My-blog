<?php
    require_once('functions.php');
    use Blog\Func;
    $blogData = Func\getAllBlog();
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>
<body>
    <h2>ブログ一覧</h2>
    <p><a href="/form.html">ブログ投稿</a></p>
    <table>
        <tr>
           <th>No</th>
           <th>タイトル</th>
           <th>カテゴリー</th> 
        </tr>
        <?php foreach($blogData as $colum): ?>
        <tr>
            <td><?= $colum['id'] ?></td>
            <td><?= $colum['title'] ?></td>
            <td><?= Func\setCategoryName($colum['category']) ?></td>
            <td><a href="/detail.php?id=<?= $colum['id'] ?>">詳細</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>