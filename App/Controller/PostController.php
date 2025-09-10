<?php 

namespace App\Controller;

use App\Model\Post;

final class PostController 
{
    public function index()
    {
        view('postsList', [
            'data' => Post::getAllData()
        ]);
    }
}