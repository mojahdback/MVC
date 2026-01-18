<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Repositories\RoleRepository;

class AuthService
{
    private UserRepository $userRepo;
    private RoleRepository $roleRepo;

    public function __construct()
    {
        $this->userRepo = new UserRepository();
        $this->roleRepo = new RoleRepository();
    }

 
    public function login(string $email, string $password): ?array
    {
        $user = $this->userRepo->findByEmail($email);

        if (!$user) {
            return null;
        }

        if (!password_verify($password, $user['password'])) {
            return null;
        }

        $_SESSION['user'] = [
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
            'role' => $user['role_name']
        ];

        return $_SESSION['user'];
    }

  
    public function register(array $data)
    {
       
        if (empty($data['name']) || empty($data['email']) || empty($data['password']) || empty($data['role'])) {
            return "Tous les champs sont obligatoires";
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            return "Email invalide";
        }

        if (strlen($data['password']) < 6) {
            return "Le mot de passe doit avoir au moins 6 caractères";
        }

      
        if ($this->userRepo->findByEmail($data['email'])) {
            return "Email déjà utilisé";
        }

      
        $role = $this->roleRepo->findByName($data['role']);
        if (!$role) {
            return "Role invalide";
        }

        $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);

         $this->userRepo->create(
        $data['email'],
        $hashedPassword,
        $role['id']
         );
        return true;
    }
}
