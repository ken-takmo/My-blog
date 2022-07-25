<?php
    require_once('functions.php');
    require_once('dbConnect.php');

    use Blog\Dbc;
    use Blog\Functions;
    $blogData = Functions::getAllBlog();

    // $dbc = new Dbc();
    // var_dump($dbc);
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
           <th>タイトル</th>
           <th>カテゴリー</th> 
           <th>投稿日時</th>
        </tr>
        <?php foreach($blogData as $colum): ?>
        <tr>
            <td><?= Utils::h($colum['title']) ?></td>
            <td><?= Utils::h(Functions::setCategoryName($colum['category'])) ?></td>
            <td><?= ($colum['post_at']) ?></td>
            <td><a href="/detail.php?id=<?= Utils::h($colum['id']) ?>">詳細</a></td>
            <td><a href="/update_form.php?id=<?= Utils::h($colum['id']) ?>">編集</a></td>
            <td><a href="/blog_delete.php?id=<?= Utils::h($colum['id']) ?>">削除</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>