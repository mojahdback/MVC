<?php

namespace App\Controllers;

use App\Services\AuthService;

class AuthController
{
    private AuthService $authService;

    public function __construct()
    {
        $this->authService = new AuthService();
    }

    
    public function home(): void
    {
        echo "<h1>Welcome to TalentHub</h1>";
    }


    public function showLogin(): void
    {
        require __DIR__ . '/../Views/auth/login.php';
    }


    public function login(): void
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = $this->authService->login($email, $password);

        if (!$user) {
            $error = "Email ou mot de passe incorrect";
            require __DIR__ . '/../Views/auth/login.php';
            return;
        }

        
        header('Location: /' . $user['role'] . '/dashboard');
        exit;
    }

    public function showRegister(): void
    {
        require __DIR__ . '/../Views/auth/register.php';
    }


    public function register(): void
    {
        $data = [
            'name' => $_POST['name'] ?? '',
            'email' => $_POST['email'] ?? '',
            'password' => $_POST['password'] ?? '',
            'role' => $_POST['role'] ?? ''
        ];

        $result = $this->authService->register($data);

        if ($result !== true) {
            $error = $result;
            require __DIR__ . '/../Views/auth/register.php';
            return;
        }

        header('Location: /login');
        exit;
    }

   
    public function logout(): void
    {
        session_destroy();
        header('Location: /login');
        exit;
    }
}
