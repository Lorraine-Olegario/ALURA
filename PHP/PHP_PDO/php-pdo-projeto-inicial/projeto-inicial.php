<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$student = new Student(
    null,
    'Lorraine Olegário',
    new \DateTimeImmutable('2001-02-17')
);

echo $student->age();
