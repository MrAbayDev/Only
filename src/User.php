<?php

declare(strict_types=1);

namespace OnlyTask;

use PDO;

class User
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = DB::connect();
    }

    public function createUser(
        string $name,
        string $email,
        string $phone,
        string $password
    ): false|array {
        $query = "INSERT INTO users (name, email, phone, password, created_at)
                  VALUES (:name, :email, :phone, :password, NOW())";
        $stmt  = $this->pdo->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getUser(int $id): bool|array
    {
        $stmt  = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    public function getUsers(): bool|array
    {
        $query = "SELECT * FROM users";
        $stmt  = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getByUsername(string $username)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUser(
        int    $id,
        string $name,
        string $email,
        string $phone,
        string $password
    ): void {
        $query = "UPDATE users SET name = :name, email = :email, phone = :phone, password = :password, updated_at = NOW()
                  WHERE id = :id";
        $stmt  = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
    }

    public function deleteUser(int $id): void
    {
        $query = "DELETE FROM users WHERE id = :id";
        $stmt  = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    public function isUserExists(string $email, string $phone): bool
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE phone = :phone OR email = :email");
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return (bool)$stmt->fetch();
    }

public function logout(): void
    {
        session_destroy();
        header('Location: /');
        exit();
    }
}