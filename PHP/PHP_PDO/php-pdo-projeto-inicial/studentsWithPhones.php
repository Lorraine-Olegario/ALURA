<?php

    use Alura\Pdo\Infrastructure\Persistence\Connection;
    use Alura\Pdo\Infrastructure\Repository\StudentRepository;

    require_once 'vendor/autoload.php';

    $pdo = Connection::Connection();
    $repository = new StudentRepository($pdo);

    /** @var \Alura\Pdo\Domain\Model\Student[]  $studentList */
    $studentList = $repository->studentsWithPhones();

    var_dump($studentList);
    exit();