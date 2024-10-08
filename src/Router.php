<?php

declare(strict_types=1);

namespace OnlyTask;
class Router
{
    protected object|null $updates;

    public function __construct()
    {
        $this->updates = json_decode(file_get_contents('php://input'));
    }
    public function sendResponse($data): void
    {
        header("Content-Type: application/json; charset=UTF-8");

        echo json_encode($data);
    }

    public function getUpdates()
    {
        return $this->updates;
    }

    public static function get($path, $callback, string|null $middleware = null): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if ($path === parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) {
                $callback();
                exit();
            }
        }
    }

    public static function post($path, $callback): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['REQUEST_URI'] === $path) {
            $callback();
            exit();
        }
    }

    public static function patch($path, $callback, string|null $middleware = null): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(isset($_POST['_method'])) {
                if (strtolower($_POST['_method']) === 'patch') {
                    if ((new self())->getResourceId()) {
                        $path = str_replace('{id}', (string)(new self())->getResourceId(), $path);
                        if ($path === parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) {
                            $callback((new self())->getResourceId());
                            exit();
                        }
                    }
                }
            }
        }
    }
    public static function errorResponse(int $code, $message = 'Error bad request'): void
    {
        http_response_code($code);
        if ($code == 404) {
            loadView('404');
        }
//        echo json_encode(['ok' => false, 'code' => $code, 'message' => $message]);
        exit();
    }
}