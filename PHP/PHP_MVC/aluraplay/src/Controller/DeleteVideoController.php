<?php

namespace Alura\Mvc\Controller;
use Alura\Mvc\Repository\VideoRepository;
use Alura\Mvc\Controller\Controller;

class DeleteVideoController implements Controller
{
    private $videoRepository;

    public function __construct(VideoRepository $videoRepository)
    {
        $this->videoRepository = $videoRepository;
    }

    public function processaRequisicao(): void
    {        
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id === null || $id === false) {
            header('Location: /?sucesso=0');
            return;
        }

        $success = $this->videoRepository->remove($id);
        if ($success === false) {
            header('Location: /?sucesso=0');
        } else {
            header('Location: /?sucesso=1');
        }
    }
}