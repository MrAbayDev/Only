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
#[NoReturn] public function login(): void
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Yandex smart captcha
        $smartCaptchaToken = $_POST['smart-token']?? null;
        if(!$this->check_captcha($smartCaptchaToken)) {
            $error = 'Проверка капчи не удалась!';
            die($error);
        }
            (new Auth())->login($username, $password);
            header('Location: /');
            exit();
    }

    public function register(): void
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        if($password !== $confirm_password)
        {
            $error = 'Пароли не совпадают';
        }else {
            if ((new User())->isUserExists($name, $phone)) {
                echo "user already exists";
            } else {
                (new User())->createUser($name, $email, $phone, $password);
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