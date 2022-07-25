<?php

require('functions.php');

use Blog\Functions;

$result = Functions::getBlogDetail($_GET['id']);

$id = $result['id'];
$title = $result['title'];
$content = $result['content'];
$category = (int)$result['category'];
$publish_status = (int)$result['publish_status'];
?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>UpdateBlogForm</title>
  </head>
  <body>
    <h1>ブログ更新フォーム</h1>
    <p><a href="/index.php">ブログ一覧</a></p>
    <form action="blog_update.php" method="POST">
        <input type="hidden" name="id" value="<?= $id ?>">
      <p>ブログタイトル</p>
      <input type="text" name="title" value="<?= $title ?>"/>
      <p>ブログ本文</p>
      <textarea name="content" id="content" cols="30" rows="10"><?= $content ?></textarea>
      <br />
      <p>カテゴリー</p>
      <select name="category">
        <option value="1" <?php if($category === 1) echo "selected" ?>>ブログ</option>
        <option value="2" <?php if($category === 2) echo "selected" ?>>プログラミング</option>
        <option value="3" <?php if($category === 3) echo "selected" ?>>その他</option>
      </select>
      <br />
      <input type="radio" name="publish_status" value="1" <?php if($publish_status === 1) echo "checked" ?> />公開
      <input type="radio" name="publish_status" value="2" <?php if($publish_status === 2) echo "checked" ?> />非公開
      <br />
      <input type="submit" value="変更" />
    </form>
  </body>
</html>