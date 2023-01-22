<?php

    require_once 'autoload.php';

    use Alura\Banco\Model\Conta\Titular;
    use Alura\Banco\Model\CPF;
    use Alura\Banco\Model\Endereco;
    use Alura\Banco\Model\Funcionario\Diretor;
    use Alura\Banco\Model\Funcionario\Gerente;
    use Alura\Banco\Service\Autenticador;

    require_once 'autoload.php';

    $autenticador = new Autenticador();
    $umDiretor = new Diretor(
        'João da Silva',
        new CPF('123.456.789-10'),
        10000
    );

    $autenticador->tentaLogin($umDiretor, '1234');