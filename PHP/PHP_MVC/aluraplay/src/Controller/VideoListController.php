<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Repository\VideoRepository;
use Alura\Mvc\Controller\Controller;

class VideoListController implements Controller
{
    private $videoRepository;

    public function __construct(VideoRepository $videoRepository)
    {
        $this->videoRepository = $videoRepository;
    }

    public function processaRequisicao(): void
    {
        $videoList = $this->videoRepository->all(); 
        require_once __DIR__ . './../../views/video-list.php';
    }
}