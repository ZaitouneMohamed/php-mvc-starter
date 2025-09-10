<?php


namespace App\Controller;

use Config\ValidationException;
use App\Model\User;

final class AuthController
{
    public static function login()
    {
        view('login');
    }

    public static function register()
    {
        view('register');
    }

    // 
    public static function loginAuth() {}

    public static function registerAuth()
    {
        $validator = new ValidationException();
        $validator->required('email', $_POST['email'] ?? '');
        $validator->email('email', $_POST['email'] ?? '');
        $validator->required('username', $_POST['username'] ?? '');
        $validator->minLength('username', $_POST['username'] ?? '', 3);
        $validator->maxLength('username', $_POST['username'] ?? '', 20);
        $validator->required('password', $_POST['password'] ?? '');
        $validator->minLength('password', $_POST['password'] ?? '', 6);
        if ($validator->hasErrors()) {
            view('register', [
                'errors' => $validator->getErrors(),
                'old' => $_POST,
            ]);
            return;
        }
        $user = User::createNewUser($GLOBALS['pdo'], [
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
        ]);

        if ($user) {
            Auth($user, 3600, 'user');
            header('Location: /');
            exit;
        } else {
            echo "Registration failed.";
        }
    }
}
