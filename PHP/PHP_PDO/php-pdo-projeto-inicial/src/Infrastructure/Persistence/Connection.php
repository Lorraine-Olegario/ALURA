<?php

    namespace Alura\Pdo\Infrastructure\Persistence;

    use PDO;

    class Connection
    {
        public static function Connection(): PDO
        {
            $pathBank = __DIR__ . './../../../banco.sqlite';

            $connection = new PDO('sqlite:' . $pathBank);
            // $connection = new PDO('mysql:host=localhost;dbname=banco', 'root', '');

            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        }
    }