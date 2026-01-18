<?php

namespace App\Controllers;

class CandidateController
{
    public function dashboard()
    {
        
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }

    
        if ($_SESSION['user']['role'] !== 'candidate') {
            http_response_code(403);
            require __DIR__ . '/../Views/errors/403.php';
            exit;
        }


        require __DIR__ . '/../Views/candidate/dashboard.php';
    }
}
