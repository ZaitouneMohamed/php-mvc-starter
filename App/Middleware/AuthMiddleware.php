<?php

namespace App\Middleware;

use Config\Auth;

class AuthMiddleware
{
    public function handle()
    {
        if (!Auth::check('user')) {
            echo "Access denied. Please log in.";
            // User is not authenticated, redirect to login or show error
            //header('Location: /login');
            //exit();
        } // User is authenticated, proceed
    }
}

