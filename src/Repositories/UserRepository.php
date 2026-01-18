<?php

namespace App\Repositories;

use App\Database;

class UserRepository
{
    private \PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function findByEmail(string $email)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function create(string $email, string $password, string $role)
    {
        $stmt = $this->db->prepare(
            "INSERT INTO users (email, password, role) VALUES (?, ?, ?)"
        );
        return $stmt->execute([$email, $password, $role]);
    }

     public function findById(int $id)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}
