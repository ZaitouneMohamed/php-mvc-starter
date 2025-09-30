<?php 

namespace App\Controller;

use App\Model\Post;

final class PostController 
{
    public function index()
    {
        var_dump(Post::all());
        view('postsList', [
            'data' => Post::all()
        ]);
    }
}