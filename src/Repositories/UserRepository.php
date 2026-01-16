<?php

require_once __DIR__ . '/../Database.php';

class UserRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function findByEmail(string $email)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(string $email, string $password, string $role)
    {
        $stmt = $this->db->prepare(
            "INSERT INTO users (email, password, role) VALUES (?, ?, ?)"
        );
        return $stmt->execute([$email, $password, $role]);
    }
}
