<?php

    require_once 'vendor/autoload.php';

    $pathBank = __DIR__ . '/banco.sqlite';
    $pdo = new PDO('sqlite:' . $pathBank);

    echo 'conection'.PHP_EOL;
    echo 'teste'.PHP_EOL;
    
    $pdo->exec("INSERT INTO phones 
                                (area_code, number, students_id) 
                            VALUES 
                                ('31', '98586-9901' 6),
                                ('33', '98985-4125' 1),
                                ('32', '98992-4564' 4),
                                ('31', '98983-1264' 1),
                                ('31', '98974-7464' 8),
                                ('31', '98965-5665' 3)");

    
    echo 'passou';