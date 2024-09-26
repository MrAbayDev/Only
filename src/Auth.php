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
//        dd([$username, $password]);
        $user = (new User())->getByUsername($username, $password);
//        dd($user);
        if (!$user) {
            $_SESSION['message']['error'] = "Wrong email or password";
            redirect('/login');
            return;
        }
        redirect('/');
        exit();
    }
}