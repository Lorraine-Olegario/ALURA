<?php

    namespace Alura\Banco\Model\Funcionario;
    use Alura\Banco\Model\Funcionario\Funcionario;

    class Desenvolvedor extends Funcionario
    {
        public function calculaBonificacao(): float
        {
            return 500;
        }

        public function sobeDeNivel(): void
        {
            $this->recebeAumento($this->recuperaSalario() * 0.75);
        }
    }