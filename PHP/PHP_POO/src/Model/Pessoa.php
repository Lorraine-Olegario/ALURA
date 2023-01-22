<?php

    namespace Alura\Banco\Model;

    abstract class Pessoa
    {
        use AcessoPropriedades;

        private $cpf;
        protected $nome;

        public function __construct(CPF $cpf, string $nome)
        {
            $this->cpf = $cpf;
            $this->validaNome($nome);
            $this->nome = $nome;            
        }

        public function recuperaCpf(): string
        {
            return $this->cpf->recuperaCpf();
        }

        public function recuperaNome(): string
        {
            return $this->nome;
        }

        protected function validaNome(string $nome): void
        {
            if (strlen($nome)  < 5) {
                echo 'Informe Nome Completo';
                exit();
            }
        }
    }