<?php

declare(strict_types=1);

namespace App\Controller;

abstract class AbstractController
{
    public function render(string $viewName): void
    {
        include dirname(__DIR__, 2)."/views/{$viewName}.php";
    }

    public function redirect(string $routeName): void
    {
        header('location: '.$routeName);
    }
}