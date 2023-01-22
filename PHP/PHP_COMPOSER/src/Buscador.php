<?php

namespace Alura\CursoComposer;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class Buscador
{
    private $httpClient;
    private $crawler;
    private $selectorHtml;

    public function __construct(Client $httpClient, Crawler $crawler)
    {
        $this->httpClient = $httpClient;
        $this->crawler = $crawler;
    }

    public function seletoresHtml(string $e)
    {
        $this->selectorHtml = $e;
    }

    public function buscar(string $url): array
    {
        try {
            $response = $this->httpClient->request('GET', $url);
            $html = $response->getBody();
            $listElementos = $this->crawler->addHtmlContent($html);

            $elementos = $this->crawler->filter($this->selectorHtml);
            $listElementos = [];

            foreach ($elementos as $elemento) {
                $listElementos [] = $elemento->textContent;
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        return $listElementos;
    }
}
