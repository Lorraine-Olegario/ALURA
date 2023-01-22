<?php

    namespace Alura\Banco\Model;    

    /**
        * Class Endereco
        * @package Alura\Banco\Model
        * @property string $cidade
        * @property string $bairro
        * @property string $rua
        * @property string $numero
    */

    final class Endereco
    {
        use AcessoPropriedades;

        private $cidade;
        private $bairro;
        private $logadouro;
        private $numero;

        public function __construct(string $cidade, string $bairro, string $logadouro, string $numero)
        {
            $this->cidade = $cidade;
            $this->bairro = $bairro;
            $this->logadouro = $logadouro;
            $this->numero = $numero;
        }

        public function recuperaCidade(): string
        {
            return $this->cidade;
        }

        public function recuperaBairro(): string
        {
            return $this->bairro;
        }

        public function recuperaLogradouro(): string
        {
            return $this->logadouro;
        }

        public function recuperaNumero(): string
        {
            return $this->numero;
        }

        public function __toString(): string
        {
            return "{$this->logadouro}, {$this->numero}, {$this->bairro}, {$this->cidade}";
        }

    }