<?php

declare(strict_types=1);


function dd($args)
{
    echo "<pre>";
    print_r($args);
    echo "</pre>";
    die();
}



function basePath(string $path): string
{
    return __DIR__.$path;
}

function loadView(string $path, array|null $args = null, bool $loadFromPublic = true): void
{
    $file = "/resources/views/pages/$path.php";


    $filePath = basePath($file);

    if (!file_exists($filePath)) {
        echo "Required view not found: $filePath";
        return;
    }

    if (is_array($args)) {
        extract($args);
    }
    require $filePath;
}

function loadPartials(string $path, array|null $args = null, bool $loadFromPublic = true): void
{
    if (is_array($args)) {
        extract($args);
    }

    $file = "/resources/views/partials/$path.php";


    require basePath($file);
}
function view(string $path, array $args = null): void
{
       $file = "/resources/views/pages/$path.php";

    $filePath = basePath($file);

    if (!file_exists($filePath)) {
        echo "Required view not found: $filePath";
        return;
    }

    if (is_array($args)) {
        extract($args);
    }
    require $filePath;
}

function loadController(string $path, array|null $args = null): void
{
    if (is_array($args)) {
        extract($args);
    }
    require basePath('/controllers/'.$path.'.php');
}

function redirect(string $url): void
{
    header("Location: $url");
    exit();
}