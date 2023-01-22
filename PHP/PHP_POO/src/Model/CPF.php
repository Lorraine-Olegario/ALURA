<?php

    namespace Alura\Banco\Model;
    
    final class CPF
    {
        private $cpf;

        public function __construct(string $cpf)
        {
            $cpf = filter_var($cpf, FILTER_VALIDATE_REGEXP, [
                'options' => [
                    'regexp' => '/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}$/'
                ]
            ]);

            if ($cpf === false) {
                echo 'CPF inválido';
                return;
            }

            $this->cpf = $cpf;
        }

        public function recuperaCpf(): string
        {
            return $this->cpf;
        }

    }