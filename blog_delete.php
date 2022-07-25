<?php

require_once("dbConnect.php");
use Blog\Dbc;

$blogs = $_GET['id'];

$dbh = Dbc::dbConnect();
$dbh->beginTransaction();
$sql = 'DELETE  FROM blog WHERE id = :id';
try{
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id', (int)$blogs, PDO::PARAM_INT);
    $stmt->execute();
    $dbh->commit();
    echo '削除されました';
} catch(PDOException $e) {
    $dbh->rollBack();
    exit($e);
}
?>
<p><a href="/">戻る</a></p>