<?php

    namespace Alura\Banco\Model;

    trait AcessoPropriedades
    {
        public function __get(string $nomeAtributo)
        {
            $metodo = 'recupera' . ucfirst($nomeAtributo);
            return $this->$metodo();
        }

        public function __set(string $nomeAtributo, string $value)
        {
            return $this->$nomeAtributo = $value;
        }
    }