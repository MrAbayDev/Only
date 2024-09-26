<?php

declare(strict_types=1);

namespace OnlyTask;

use PDO;

class Auth
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = DB::connect();
    }
    public function login(string $username, string $password): void
    {
        $user = (new User())->getByUsername($username,$password);

        if (!$user & !password_verify($password, $user['password'])) {
            $_SESSION['message']['error'] = "Wrong email or password";
            redirect('/login');
            return;
        }
        $_SESSION['user_id'] = $user['id'];
        redirect('/');
        exit();
    }
}