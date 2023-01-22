<?php   

    namespace Alura\Banco\Service;

    use Alura\Banco\Model\Autenticavel;

    class Autenticador
    {
        public function tentaLogin(Autenticavel $autenticavel, string $senha): void
        {
            if ($autenticavel->podeAutenticar($senha)) {
                echo 'Login realizado com sucesso!';
            } else {
                echo 'Senha Inválida';
            }
        }
    }