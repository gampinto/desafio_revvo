<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;
use App\Connection\DatabaseConnection;

$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/../.env');

try {
    $dbConnection = DatabaseConnection::open(); 
    echo "Conexão com o banco de dados foi estabelecida com sucesso!";
} catch (Exception $e) {
    echo "Erro ao conectar com o banco de dados: " . $e->getMessage();
}