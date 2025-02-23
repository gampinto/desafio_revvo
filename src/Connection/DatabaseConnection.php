<?php

declare(strict_types=1);

namespace App\Connection;

use PDO;
use PDOException;
use Exception;

final class DatabaseConnection
{
    public static function open(): PDO
    {
        if (!isset($_ENV['DATABASE_HOST'], $_ENV['DATABASE_NAME'], $_ENV['DATABASE_USER'], $_ENV['DATABASE_PASSWORD'])) {
            throw new Exception('As variáveis de ambiente do banco de dados não foram carregadas corretamente.');
        }

        $dsn = "mysql:host={$_ENV['DATABASE_HOST']};dbname={$_ENV['DATABASE_NAME']};charset=utf8mb4";

        try {
            $connection = new PDO($dsn, $_ENV['DATABASE_USER'], $_ENV['DATABASE_PASSWORD']);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        
        } catch (PDOException $exception) {
            error_log('Erro de conexão: ' . $exception->getMessage());

            throw new Exception('Falha ao conectar ao banco de dados.');
        }
    }
}
