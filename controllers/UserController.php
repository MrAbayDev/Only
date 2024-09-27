<?php

declare(strict_types=1);

namespace Controller;

use JetBrains\PhpStorm\NoReturn;
use OnlyTask\Session;
use OnlyTask\User;

class UserController
{
    #[NoReturn] public function show(int $id): void
    {
        $user       = (new User())->getUser($id);

        view('auth/profile', ['user' => $user]);
    }
    public function edit(int $id): void
    {
        $user       = new User();
        $_SESSION['user']['id'] = $id;
        $user->updateUser(
            $id,
            $_POST['name'],
            $_POST['email'],
            $_POST['phone'],
            $_POST['password']
        );
    }
    public function update(int $id): void{

        view('auth/edit-profile', ['user' => (new User())->getUser($id)]);

    }

}