<?php

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use App\Router;
use App\Controllers\AuthController;
use App\Controllers\CandidateController;
use App\Controllers\RecruiterController;
use App\Controllers\AdminController;

$router = new Router();

// Public routes
$router->add('GET', '/', AuthController::class, 'login');
$router->add('GET', '/login', AuthController::class, 'login');
$router->add('POST', '/login', AuthController::class, 'login');
$router->add('GET', '/register', AuthController::class, 'register');
$router->add('POST', '/register', AuthController::class, 'register');
$router->add('GET', '/logout', AuthController::class, 'logout');

// Protected routes
$router->add('GET', '/candidate/dashboard', CandidateController::class, 'dashboard', 'candidate');
$router->add('GET', '/recruiter/dashboard', RecruiterController::class, 'dashboard', 'recruiter');
$router->add('GET', '/admin/dashboard', AdminController::class, 'dashboard', 'admin');

// Dispatch
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$router->dispatch(
    $uri,
    $_SERVER['REQUEST_METHOD']
);
