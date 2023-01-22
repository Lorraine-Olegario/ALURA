<?php

    use Alura\Pdo\Domain\Model\Student;
    use Alura\Pdo\Infrastructure\Persistence\Connection;
    use Alura\Pdo\Infrastructure\Repository\StudentRepository;

    require_once 'vendor/autoload.php';

    $pdo = Connection::Connection();
    $repository = new StudentRepository($pdo);
    $studentList = $repository->allStudents();
    var_dump($studentList);
    exit();

    /*fetch*/
    $result = $pdo->query("SELECT * FROM students WHERE id = '1';");
    while ($studentData = $result->fetch(PDO::FETCH_ASSOC)) {
        $student = new Student(
            $studentData['id'],
            $studentData['name'],
            new DateTimeImmutable($studentData['birth_date']),
        );

        echo $student->age() . PHP_EOL;
    }
    exit();

    /*fetchAll*/
    $result = $pdo->query("SELECT * FROM students;");
    $studentDataList = $result->fetchAll(PDO::FETCH_ASSOC);
    $studentList = [];

    foreach ($studentDataList as $studentData) {
        $studentList[] = new Student(
            $studentData['id'],
            $studentData['name'],
            new DateTimeImmutable($studentData['birth_date']),
        );
    }

    var_dump($studentList);
    exit();

    /*fetchColumn*/
    $result = $pdo->query("SELECT * FROM students;");
    var_dump($result->fetchColumn(1));
    exit();

    #codigo instrutor
    #PDO::FETCH_CLASS => cria uma instância da classe porem o nome do banco de dados tem que ser identicos ao nome dos atributos na classe, ou ele cria um novo atributo;
    #PDO::FETCH_CLASS => A classe não pode ter parâmetros no construtor
    // $statement = $pdo->query('SELECT * FROM students;');
    // $studentList = $statement->fetchAll(PDO::FETCH_CLASS, Student::class);

    // var_dump($studentList);