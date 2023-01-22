#!/usr/bin/env php
<?php

use Alura\CursoComposer\Buscador;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

require './vendor/autoload.php';

$client = new Client([
    'base_uri' => 'https://investidor10.com.br/',
    'verify' => false //Isso evita a verificação do certificado SSL.
]);
$crawler = new Crawler();

$buscador = new Buscador($client,$crawler);
$buscador->seletoresHtml('h2.ticker-name');
$elementos = $buscador->buscar('fiis/');

foreach ($elementos as $elemento) {
    echo $elemento. PHP_EOL;
}
