<?php

use App\Controller\AboutController;
use App\Controller\HomeController;
use App\Middleware\AuthMiddleware;

//use Facades\Route;

require_once './Facades/routes.php';

Route::get('/' , [HomeController::class, 'index']);
Route::get('/about' , [AboutController::class, 'index']);

Route::dispatch();