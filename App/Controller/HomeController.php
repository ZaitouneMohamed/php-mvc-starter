<?php

namespace App\Controller;

use App\Model\Post;

final class HomeController
{
    public function index()
    {
        view('Home', ['title' => 'Welcome to Home Page']);
    }

    public function posts()
    {
        view('MailList', [
            'data' => Post::getAllData()
        ]);
    }
}
