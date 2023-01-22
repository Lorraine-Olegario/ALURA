<?php

    require_once 'autoload.php';

    use Alura\Banco\Model\CPF;
    use Alura\Banco\Model\Funcionario\EditorVideo;
    use Alura\Banco\Model\Funcionario\Diretor;
    use Alura\Banco\Model\Funcionario\Gerente;
    use Alura\Banco\Model\Funcionario\Desenvolvedor;
    use Alura\Banco\Service\ControladorDeBonificacoes;

    $umFuncionario = new Desenvolvedor(
        'Vinicius Dias',
        new CPF('123.456.789-10'),
        1000
    );

    $umFuncionario->sobeDeNivel();

    $umaFuncionaria = new Gerente(
        'Patricia',
        new CPF('987.654.321-10'),
        3000
    );

    $umDiretor = new Diretor(
        'Ana Paula', new CPF('123.951.789-11'), 5000
    );

    $umEditor = new EditorVideo(
        'João',
        new CPF('456.987.231-11'),
        1500
    );

    $controlador = new ControladorDeBonificacoes();
    $controlador->adicionaBonificacaoDe($umFuncionario);
    $controlador->adicionaBonificacaoDe($umaFuncionaria);
    $controlador->adicionaBonificacaoDe($umDiretor);
    $controlador->adicionaBonificacaoDe($umEditor);

    echo $controlador->recuperaTotal();