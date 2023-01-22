<?php

    use Alura\Pdo\Domain\Model\Student;
    use Alura\Pdo\Infrastructure\Persistence\Connection;
    use Alura\Pdo\Infrastructure\Repository\StudentRepository;

    require_once 'vendor/autoload.php';

    $connection = Connection::Connection();
    $studentRepository = new StudentRepository($connection);

    $connection->beginTransaction();

    try {
        $aStudent1 = new Student(
            null,
            'Manuela Sabrina Sônia Rocha',
            new DateTimeImmutable('1991-01-16')
        );
        $studentRepository->save($aStudent1);

        ///////////////////
        $aStudent2 = new Student(
            null,
            'Alice Elisa Ferreira',
            new DateTimeimmutable('1972-02-15')
        );
        $studentRepository->save($aStudent2); 

        $connection->commit();

    } catch (\PDOException $e) {
        echo $e->getMessage() . PHP_EOL;
        echo $e->errorInfo[2];
        $connection->rollBack();
    }
    