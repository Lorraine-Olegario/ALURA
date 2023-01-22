<?php

    namespace Alura\Pdo\Domain\Model;

    use DomainException;

    class Student
    {
        private ?int $id;
        private string $name;
        private \DateTimeInterface $birthDate;
        /** @var Phones[] */
        private array $phones = [];

        public function __construct(?int $id, string $name, \DateTimeInterface $birthDate)
        {
            $this->id = $id;
            $this->name = $name;
            $this->birthDate = $birthDate;
        }

        public function defineId(int $id): void
        {
            if (!is_null($this->id)) {
                throw new DomainException('Você só pode definir o ID uma vez');
            }

            $this->id = $id;
        }

        //GET
        public function getId(): ?int
        {
            return $this->id;
        }

        public function getName(): string
        {
            return $this->name;
        }

        public function getBirthDate(): \DateTimeInterface
        {
            return $this->birthDate;
        }

        /** @var Phone[] */
        public function getPhones(): array
        {
            return $this->phones;
        }

        public function age(): int
        {
            return $this->birthDate->diff(new \DateTimeImmutable())->y;
        }

        //SET
        public function setName(string $name): void
        {
            $this->name = $name;
        }

        public function setPhone(Phone $phone): void
        {
            $this->phones[] = $phone;
        }
    }
