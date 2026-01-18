<?php

namespace App;

use App\Controllers\AuthController;
use App\Controllers\CandidateController;
use App\Controllers\RecruiterController;
use App\Controllers\AdminController;


class Router 
{
    private array $routes = [];
    public function __construct(){
        $this->registerRoutes();
    }

    public function registerRoutes(): void
    {
        $this->add('GET', '/', AuthController::class, 'home');
        $this->add('GET', '/login', AuthController::class, 'showLogin');
        $this->add('POST', '/login', AuthController::class, 'login');
        $this->add('GET', '/register', AuthController::class, 'showRegister');
        $this->add('POST', '/register', AuthController::class, 'register');
        $this->add('GET', '/logout', AuthController::class, 'logout');

        $this->add('GET', '/candidate/dashboard', CandidateController::class, 'dashboard', 'candidate');
        $this->add('GET', '/recruiter/dashboard', RecruiterController::class, 'dashboard', 'recruiter');
        $this->add('GET', '/admin/dashboard', AdminController::class, 'dashboard', 'admin');
    }

     public function add(
        string $method,
        string $path,
        string $controller,
        string $action,
        ?string $role = null
    ): void {
        $this->routes[$method][$path] = [
            'controller' => $controller,
            'action' => $action,
            'role' => $role
        ];
    }

      public function dispatch(): void
    {
        $path = $_SERVER['PATH_INFO'] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];

        if (!isset($this->routes[$method][$path])) {
            http_response_code(404);
            echo "404 - Page not found";
            return;
        }

        $route = $this->routes[$method][$path];

    
        if ($route['role'] !== null) {
            $this->checkAuthorization($route['role']);
        }

        $controller = new $route['controller']();
        $action = $route['action'];

        $controller->$action();
    }

     private function checkAuthorization(string $requiredRole): void
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }

        if ($_SESSION['user']['role'] !== $requiredRole) {
            http_response_code(403);
            require __DIR__ . '/Views/errors/403.php';
            exit;
        }
    }
}