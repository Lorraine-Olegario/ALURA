<?php

    namespace Alura\Banco\Model\Funcionario;
    use Alura\Banco\Model\Funcionario\Funcionario;

    class EditorVideo extends Funcionario
    {
        public function calculaBonificacao(): float
        {
            return 600;
        }
    }