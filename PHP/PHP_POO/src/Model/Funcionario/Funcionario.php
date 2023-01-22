<?php

    namespace Alura\Banco\Model\Funcionario;

    use Alura\Banco\Model\CPF;
    use Alura\Banco\Model\Pessoa;
    
    abstract class Funcionario extends Pessoa
    {
        private $salario;

        public function __construct(string $nome, CPF $cpf, float $salario)
        {
            parent::__construct($cpf, $nome);
            $this->salario = $salario;
        }

        public function alteraNome(string $nome): void 
        {
            $this->validaNome($nome);
            $this->nome = $nome;
        }

        public function recuperaSalario(): float
        {
            return $this->salario;
        }

        public function recebeAumento(float $valorAumento): void
        {
            if ($valorAumento < 0) {
                echo 'O aumento deve ser positivo';
                return;
            }
            $this->salario += $valorAumento;
        }

        abstract public function calculaBonificacao(): float;
    }