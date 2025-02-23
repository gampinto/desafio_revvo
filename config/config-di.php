<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controller\CourseController;
use DI\Container;
use function DI\autowire;

return [
    CourseController::class => autowire(CourseController::class),
];