<?php

    require_once 'vendor/autoload.php';

    $pdo = Alura\Pdo\Infrastructure\Persistence\Connection::Connection();

    $sqlDelete = $pdo->prepare("DELETE FROM students WHERE id = :id");
    $sqlDelete->bindValue(':id', 11, PDO::PARAM_INT);

    if ($sqlDelete->execute()) {
        echo 'Student deletado whit sucesss!';
    }