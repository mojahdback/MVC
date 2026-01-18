<?php

namespace App\Repositories;

use App\Database;

class RoleRepository
{
    private \PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

   
    public function findByName(string $roleName): ?array
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM roles WHERE name = :name"
        );
        $stmt->execute(['name' => $roleName]);
        $role = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $role ?: null;
    }

    public function create(string $roleName): bool
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO roles (name) VALUES (:name)"
        );
        return $stmt->execute(['name' => $roleName]);
    }

  
    public function getAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM roles");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
