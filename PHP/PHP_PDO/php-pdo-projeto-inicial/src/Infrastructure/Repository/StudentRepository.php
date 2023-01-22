<?php

    namespace Alura\Pdo\Infrastructure\Repository;

    use Alura\Pdo\Domain\Model\Phone;
    use Alura\Pdo\Domain\Model\Student;
    use Alura\Pdo\Domain\Repository\IStudentRepository;
    use DateTimeImmutable;
    use PDO;

    class StudentRepository implements IStudentRepository
    {
        private PDO $connection;

        public function __construct(PDO $connection)
        {
            $this->connection = $connection;
        }

        public function allStudents(): array
        {
           $smpt = $this->connection->query("SELECT * FROM students;");           
           return $this->hydrateStudenList($smpt);
        }

        public function studentBrithAt(\DateTimeImmutable $birthDate): array
        {
            $smpt = $this->connection->query("SELECT * FROM students WHERE brith_date = :brith_date");
            $smpt->bindValue(':brith_date', $birthDate->format('Y-m-d'));
            $smpt->execute();

            return $this->hydrateStudenList($smpt);
        }

        private function hydrateStudenList(\PDOStatement $smpt): array
        {            
            $studentDataList = $smpt->fetchAll(PDO::FETCH_ASSOC);
            $studentList = [];
        
            foreach ($studentDataList as $studentData) {
                $student = new Student(
                    $studentData['id'],
                    $studentData['name'],
                    new DateTimeImmutable($studentData['birth_date']),
                );

                $studentList[] = $student;
            }

            return $studentList;
        }

        public function save(Student $student): bool
        {
            if ($student->getId() === null) {
                return $this->insert($student);
            }

            return $this->update($student);
        }

        private function update(Student $student)
        {
            $updateQuery = "UPDATE students SET name = :name, brith_date = :brith_date WHERE id = :id";
            $smpt = $this->connection->prepare($updateQuery);
            $smpt->bindValue(':name', $student->getName());
            $smpt->bindValue(':name', $student->getBirthDate()->format('Y-m-d'));
            $smpt->bindValue(':id', $student->getId());

            return $smpt->execute();
        }

        private function insert(Student $student)
        {
            $smpt = $this->connection->prepare("INSERT INTO studentsa ( name, birth_date ) VALUES ( :name, :birth_date )");

            $success = $smpt->execute([
                ':name' => $student->getName(),
                ':birth_date' => $student->getBirthDate()->format('Y-m-d'),
            ]);

            if ($success) {
                $student->defineId($this->connection->lastInsertId());                
            }

            return $success;
        }

        public function delete(Student $student): bool
        {
            $smpt = $this->connection->prepare("DELETE FROM students WHERE id = :id");
            $smpt->bindValue(':id', $student->getId(), PDO::PARAM_INT);

            return $smpt->execute();
        }

        public function studentsWithPhones(): array
        {
            $smpt = $this->connection->query("SELECT students.id,
                                                       students.name,
                                                       students.birth_date,
                                                       phones.id AS phone_id,
                                                       phones.area_code,
                                                       phones.number
                                                FROM students
                                                JOIN phones ON students.id = phones.student_id;");

            $result =$smpt->fetchAll(PDO::FETCH_ASSOC);
            $studentList = [];

            foreach ($result as $row) {
                if (!array_key_exists($row['id'], $studentList)) {
                    $studentList[$row['id']] = new Student(
                        $row['id'],
                        $row['name'],
                        new DateTimeImmutable($row['birth_date']),
                    );
                }

                $phone = new Phone(
                    $row['phone_id'],
                    $row['area_code'],
                    $row['number'],
                );
                
                $studentList[$row['id']]->setPhone($phone);
            }

            return $studentList;
        }
    }