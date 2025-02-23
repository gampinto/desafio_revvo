<?php

use App\Controller\CourseController;

function mountRoute(string $controllerName, string $methodName): array
{
    return [
        'controller' => $controllerName,
        'method' => $methodName.'Action',
    ];
}

return [
    '/' => mountRoute(CourseController::class, 'index'),
];
