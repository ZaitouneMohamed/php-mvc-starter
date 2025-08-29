<?php 

namespace Model;

use PDO;

class Mail
{

    public static function getAllMails($pdo)
    {
        $stmt = $pdo->query("SELECT * FROM mails");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getMailById($pdo, $id)
    {
        $stmt = $pdo->prepare("SELECT * FROM mails WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}