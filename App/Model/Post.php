<?php 

namespace App\Model;

use PDO;

class Post 
{

    public static function getAllData()
    {
        $pdo = $GLOBALS['pdo'];
        $stmt = $pdo->query("SELECT posts.* , users.username as username FROM posts join users on posts.user_id = users.id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}