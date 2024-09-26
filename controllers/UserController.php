<?php

declare(strict_types=1);

namespace Controller;

use OnlyTask\Session;
use OnlyTask\User;

class UserController
{
    public function show(int $id): void
    {
        $user       = (new User())->getUser($id);

        view('single-user', ['user' => $user]);
        view('profile', ['user' => $user]);
    }

}