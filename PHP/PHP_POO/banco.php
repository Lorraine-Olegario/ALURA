<?php

    require_once 'autoload.php';

    use Alura\Banco\Model\Conta\Titular;
    use Alura\Banco\Model\{CPF, Endereco};
    use Alura\Banco\Model\Conta\ContaCorrente;
    use Alura\Banco\Model\Conta\ContaPoupanca;

    $endereco = new Endereco('Petrópolis', 'um bairro', 'minha rua', '71B');
    $cpf = new CPF('123.456.789-10');
    $vinicius = new Titular($cpf, 'Vinicius Dias', $endereco);
    $primeiraConta = new ContaCorrente($vinicius);
    $primeiraConta->deposita(500);
    $primeiraConta->saca(100);

    echo $primeiraConta->recuperaNomeTitular() . PHP_EOL;
    echo $primeiraConta->recuperaCpfTitular() . PHP_EOL;
    echo $primeiraConta->recuperaSaldo() . PHP_EOL;

    // $patricia = new Titular(new CPF('698.549.548-10'), 'Patricia', $endereco);
    // $segundaConta = new Conta($patricia);
    // var_dump($segundaConta);
