<?php

    use Alura\Pdo\Domain\Model\Student;

    require_once 'vendor/autoload.php';

    $pdo = Alura\Pdo\Infrastructure\Persistence\Connection::Connection();

    $student = new Student(null, 'Luiz Algusto', new \DateTimeImmutable('14-11-2019'));

    $sqlInsert = "INSERT INTO students(name, birth_date) VALUES (:name,?)";
    $smtp = $pdo->prepare($sqlInsert);
    $smtp->bindValue(':name', $student->name());
    $smtp->bindValue(2, $student->birthDate()->format('Y-m-d'));
    
    if ($smtp->execute()) {
        echo 'Aluno incluído';
    }
