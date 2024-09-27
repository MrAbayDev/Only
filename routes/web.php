<?php


declare(strict_types=1);

use Controller\AuthController;
use Controller\UserController;
use OnlyTask\Router;

Router::get('/', fn() => loadController('home'));

Router::get('/login', fn() => view('auth/login'));
Router::post('/login', fn() => (new AuthController())->login());

Router::get('/register', fn()=> view('auth/register'), 'guest');
Router::post('/register', fn()=> (new AuthController())->register());

Router::get('/profile/{id}', fn() => view('auth/profile'));

Router::get('/update/{id}', fn(int $id) => (new UserController())->update($id));
Router::patch('/update/{id}', fn(int $id) => (new UserController())->edit($id));
