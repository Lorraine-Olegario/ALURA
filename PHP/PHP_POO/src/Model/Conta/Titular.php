<?php

    namespace Alura\Banco\Model\Conta;

    use Alura\Banco\Model\Autenticavel;
    use Alura\Banco\Model\CPF;
    use Alura\Banco\Model\Endereco;
    use Alura\Banco\Model\Pessoa;

    class Titular extends Pessoa implements Autenticavel
    {
        private $endereco;

        public function __construct(CPF $cpf, string $nome, Endereco $endereco)
        {
            parent::__construct($cpf, $nome);
            $this->endereco = $endereco;          
        }

        public function recuperaEndereco(): Endereco
        {
            return $this->endereco;
        }

        public function podeAutenticar(string $senha): bool
        {
            return $senha === 'abcd';
        }
    }