<?php

namespace Model;

use PDOException;

class User
{

    public static function createNewUser($pdo, $data)
    {
        try {
            $stmt = $pdo->prepare("
                INSERT INTO users (username, email, password)
                VALUES (:username, :email, :password)
            ");

            $stmt->bindParam(':username', $data['username']);
            $stmt->bindParam(':email', $data['email']);
            $stmt->bindParam(':password', $data['password']);

            $stmt->execute();

            // Fetch the inserted user
            $id = $pdo->lastInsertId();

            $stmt = $pdo->prepare("SELECT id, username, email FROM users WHERE id = :id");
            $stmt->execute(['id' => $id]);

            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Log or handle error in production
            echo "Error creating user: " . $e->getMessage();
            return false;
        }
    }
}
