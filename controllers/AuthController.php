<?php

declare(strict_types=1);

namespace Controller;

use JetBrains\PhpStorm\NoReturn;
use OnlyTask\Auth;
use OnlyTask\User;

class   AuthController
{
    public function check_captcha($token): bool
    {
        $ch = curl_init();
        $args = http_build_query([
            "secret" => $_ENV["SMARTCAPTCHA_SERVER_KEY"],
            "token" => $token,
            "ip" =>$_SERVER['REMOTE_ADDR'],
        ]);
        curl_setopt($ch, CURLOPT_URL, "https://smartcaptcha.yandexcloud.net/validate?$args");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 1);

        $server_output = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpcode !== 200) {
            echo "Allow access due to an error: code=$httpcode; message=$server_output\n";
            return true;
        }
        $resp = json_decode($server_output);
        return $resp->status === "ok";
    }
    public function login(): void
    {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $user = (new User())->getByUsername($username);

//        // Foydalanuvchi ma'lumotlarini tekshirish uchun quyidagi qatorni qo'shing:
//        var_dump($user);
//        exit();

        if (!$user || !password_verify($password, $user['password'])) {
            $_SESSION['message']['error'] = "Wrong email or password";
            redirect('/login');
            return;
        }

        $_SESSION['user_id'] = $user['id'];
        redirect('/');
        exit();
    }

    public function register(): void
    {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if($password !== $confirm_password) {
            $error = 'Пароли не совпадают';
        } else {
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            if ((new User())->isUserExists($name, $phone)) {
                echo "user already exists";
            } else {
                (new User())->createUser($name, $email, $phone, $hashed_password);
                header("Location: /");
                exit();
            }
        }
    }

    public function showUserInfo():void{
        $userGender = (new User())->getUser();
        view('auth/create-user', ['userGender' => $userGender]);
    }

}