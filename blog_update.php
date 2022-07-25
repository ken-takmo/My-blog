<?php

require_once("dbConnect.php");
use Blog\Dbc;

$blogs = $_POST;
var_dump($blogs);

if(empty($blogs['title'])){
    exit('タイトルを入力してください');
}else if(mb_strlen($blogs['title']) > 191){
    exit('タイトルは191文字以内にしてください');
}
if(empty($blogs['content'])){
    exit('本文を入力してください');
}
if(empty($blogs['category'])){
    exit('カテゴリーを選択してください');
}
if(empty($blogs['publish_status'])){
    exit('公開ステータスを選択してください');
}

$dbh = Dbc::dbConnect();
$dbh->beginTransaction();
$sql = 'UPDATE  
            blog SET title = :title, content = :content, category = :category, publish_status = :publish_status
        WHERE 
            id = :id';
try{
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id', $blogs['id'], PDO::PARAM_INT);
    $stmt->bindValue(':title', $blogs['title'], PDO::PARAM_STR);
    $stmt->bindValue(':content', $blogs['content'], PDO::PARAM_STR);
    $stmt->bindValue(':category', $blogs['category'], PDO::PARAM_INT);
    $stmt->bindValue(':publish_status', $blogs['publish_status'], PDO::PARAM_INT);
    $stmt->execute();
    $dbh->commit();
    echo '更新されました';
} catch(PDOException $e) {
    $dbh->rollBack();
    exit($e);
}
?>
<p><a href="/">戻る</a></p>