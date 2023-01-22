<?php
    namespace Alura\Pdo\Domain\Repository;

    use Alura\Pdo\Domain\Model\Student;
    
    interface IStudentRepository
    {
        public function allStudents(): array;
        public function studentsWithPhones(): array;
        public function studentBrithAt(\DateTimeImmutable $birthDate): array;
        public function save(Student $student): bool;
        public function delete(Student $student): bool;
    }