<?php

    $nome1 = 'Lorraine Olegário';
    $nome2 = 'Luiz Olegario';

    #verifica se contem a string retornando booleano
    str_contains($nome2, 'Olegário');

    if (str_contains($nome2, 'Olegário')) {
        echo "$nome2 é da minha familia" . PHP_EOL;
    } else {
        echo "$nome2 não é da minha familia" . PHP_EOL;
    }

    $url = 'https://alura.com.br';

    #verifica se contem a string na primeira palavra retornando booleano
    str_starts_with($url, 'https');
    #verifica se contem a string na ultima palavra retornando booleano
    str_ends_with($url, '.br');

    if (str_starts_with($url, 'https')) {
        echo "É uma URL segura" . PHP_EOL;
    } else {
        echo "Não é uma URL segura" . PHP_EOL;
    }

    if (str_ends_with($url, '.br')) {
        echo "É um domínio do Brasil" . PHP_EOL;
    } else {
        echo "Não é um domínio do Brasil" . PHP_EOL;
    }

