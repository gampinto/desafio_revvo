<?php

use DI\ContainerBuilder;
use Symfony\Component\Dotenv\Dotenv;

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once dirname(__DIR__) . '/vendor/autoload.php';

$routes = include dirname(__DIR__) . '/config/routes.php';

(new Dotenv())->load(dirname(__DIR__) . '/.env');

$url = explode('?', $_SERVER['REQUEST_URI'])[0];

if (!isset($routes[$url])) {
    http_response_code(404);
    echo "Página não encontrada!";
    exit;
}

$controller = $routes[$url]['controller'];
$method = $routes[$url]['method'];

$builder = new ContainerBuilder();
$builder->addDefinitions(dirname(__DIR__) . '/config/config-di.php');
$container = $builder->build();

$controller = $container->get($controller);

if (!method_exists($controller, $method)) {
    http_response_code(500);
    echo "Método não encontrado!";
    exit;
}

$controller->$method();
