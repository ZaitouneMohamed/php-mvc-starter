<?php 

use Controller\AboutController;
use Controller\AuthController;
use Controller\HomeController;
use Controller\MailController;

require_once __DIR__ . '/config/routes.php';


Route::init();

// Auth routes start
Route::get('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register']);
//
Route::post('/register-auth', [AuthController::class, 'registerAuth']);

// Auth routes end

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'index'])->middleware('AuthMiddleware');
Route::get('/mail/list', [MailController::class, 'index']);
Route::get('/mail/details', [MailController::class, 'show']);
Route::get('/mail/create', [MailController::class, 'create']);
Route::post('/mail/store', [MailController::class, 'store']);

