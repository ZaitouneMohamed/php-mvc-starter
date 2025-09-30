<?php

use App\Controller\AboutController;
use App\Controller\HomeController;
use App\Controller\PostController;
use App\Middleware\AuthMiddleware;

//use Facades\Route;

require_once './Facades/routes.php';

Route::get('/' , [HomeController::class, 'index'])->middleware(AuthMiddleware::class);
Route::get('/about' , [AboutController::class, 'index']);

Route::get('/posts' , [PostController::class, 'index'])->middleware(AuthMiddleware::class);

Route::dispatch();