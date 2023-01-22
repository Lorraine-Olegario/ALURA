<?php

    require_once 'autoload.php';

    use Alura\Banco\Model\Endereco;
    use Alura\Banco\Model\CPF;
    use Alura\Banco\Model\Funcionario\Desenvolvedor;

    $umEndereco = new Endereco(
        'Petrópolis',
        'bairro qualquer',
        'Minha rua',
        '71b'
    );
    $outroEndereco = new Endereco(
        'Rio',
        'Centro',
        'Uma rua aí',
        '50'
    );

    echo $umEndereco->bairro . PHP_EOL;
    echo $umEndereco->numero . PHP_EOL;
    echo $umEndereco->numero = '14B' . PHP_EOL;

    $desenvolvedor = new Desenvolvedor(
        'Vinicius',
        new CPF('123.456.789-10'),
        2000
    );
    
    $desenvolvedor->nome;

    echo 'Lorraine';
    exit();