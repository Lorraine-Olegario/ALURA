<?php

namespace Alura\CursoComposer;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class Buscador
{
    private $httpClient;
    private $crawler;

    public function __construct(Client $httpClient, Crawler $crawler)
    {
        $this->httpClient = $httpClient;
        $this->crawler = $crawler;
    }

    public function buscar(string $url): array
    {
        try {
            $response = $this->httpClient->request('GET', $url);
            $html = $response->getBody();
            $cursos = $this->crawler->addHtmlContent($html);

            $elementosCursos = $this->crawler->filter('h2.ticker-name');
            $cursos = [];

            foreach ($elementosCursos as $curso) {
                $cursos [] = $curso->textContent;
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        return $cursos;
    }
}
