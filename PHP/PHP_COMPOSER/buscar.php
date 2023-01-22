<?php

    use Alura\CursoComposer\Buscador;
    use GuzzleHttp\Client;
    use Symfony\Component\DomCrawler\Crawler;

    require './vendor/autoload.php';

    $client = new Client([
        'base_uri' => 'https://investidor10.com.br/',
        'verify' => false //Isso evita a verificação do certificado SSL da Alura.
    ]);
    $crawler = new Crawler();

    $buscador = new Buscador($client,$crawler);
    $cursos = $buscador->buscar('fiis/');

    foreach ($cursos as $curso) {
        echo $curso. PHP_EOL;
    }