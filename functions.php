<?php

namespace Blog;

require_once('dbConnect.php');
require_once('Utils.php');

use Blog\Dbc;

// $dbc = new Dbc();
// var_dump($dbc);
class Functions 
{   

    public static function setCategoryName($category) {
        switch($category){
            case 1:
                return "ブログ";
                break;
            case 2:
                return "プログラミング";
                break;
            case 3:
                return "その他";
                break;
        }
    }
    
    public static function getAllBlog() {
    
        $dbh = Dbc::dbConnect();
        $sql = 'SELECT * FROM blog';
        $stmt = $dbh->query($sql);
        $result = $stmt->fetchall(\PDO::FETCH_ASSOC);
    
        return $result;
    }
    
    public static function getBlogDetail($id) {
        if(empty($id)) {
            exit('IDが不正です');
        }
    
        $dbh = Dbc::dbConnect();
        $stmt = $dbh->prepare('SELECT * FROM blog WHERE id = :id');
        $stmt->bindValue(':id', (int)$id, \PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        
        if(!$result) {
            exit('その投稿はありません');
        }
        return $result;
    }

}