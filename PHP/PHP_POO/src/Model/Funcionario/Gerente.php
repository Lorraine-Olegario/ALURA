<?php

    namespace Alura\Banco\Model\Funcionario;

    use Alura\Banco\Model\Autenticavel;
    use Alura\Banco\Model\Funcionario\Funcionario;

    class Gerente extends Funcionario implements Autenticavel
    {
        public function calculaBonificacao(): float
        {
            return $this->recuperaSalario();
        }

        public function podeAutenticar(string $senha): bool
        {
            return $senha === '56789';
        }
    }