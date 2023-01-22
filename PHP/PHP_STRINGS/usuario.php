<?php

    $email = 'lorraineolegario16@gmail.com';
    $posicaoDoArroba = strpos($email, '@');

    echo substr($email,0,$posicaoDoArroba) . PHP_EOL;
    echo substr($email,$posicaoDoArroba+1) . PHP_EOL;