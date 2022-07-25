<?php

namespace Blog\Dbc;

function dbConnect() {
    $dsn = 'mysql:host=localhost;dbname=blog.app;charset=utf8;';
    $db_user = 'blog_user';
    $db_pass = 'Kenichi_123';
    try{
        $dbh = new \PDO($dsn, $db_user, $db_pass, [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        ]);
    }catch(PDOException $e){
        echo '接続失敗' . $e->getMessage();
        exit();
    };
    
    return $dbh;
};