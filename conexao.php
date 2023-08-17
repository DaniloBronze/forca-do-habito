<?php

declare(strict_types=1);

function getPdoConnection(): PDO
{
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'crm';

    try {
        $dsn = "mysql:host=$hostname;dbname=$database;charset=utf8mb4";
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo "Erro na conexão: " . $e->getMessage();

        exit();
    }
}

return getPdoConnection();
