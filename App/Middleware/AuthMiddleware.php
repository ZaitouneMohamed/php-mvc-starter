<?php

namespace App\Middleware;

use Facades\Auth;

class AuthMiddleware
{
    public function handle()
    {
        if (!Auth::check('user')) {
            echo "Access denied. Please log in. <br />";
            // User is not authenticated, redirect to login or show error
            //header('Location: /login');
            //exit();
        } // User is authenticated, proceed
    }
}

