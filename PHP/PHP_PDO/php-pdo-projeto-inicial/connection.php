<?php

    $pathBank = __DIR__ . '/banco.sqlite';
    $pdo = new PDO('sqlite:' . $pathBank);

    echo 'conection';
    
    $pdo->exec("INSERT INTO phones (area_code, number, student_id) 
                VALUES 
                    ('31', '98596-0254', 7),
                    ('33', '98598-4175', 3);");
    exit();
    
    $createTableSql = '

        CREATE TABLE IF NOT EXISTS students (
            id INTEGER PRIMARY KEY,
            name TEXT,
            birth_date TEXT
        );

        CREATE TABLE IF NOT EXISTS phones (
            id INTEGER PRIMARY KEY,
            area_code TEXT,
            number TEXT,
            student_id INTEGER,
            FOREIGN KEY(student_id) REFERENCES students(id)
        );
    ';

    $pdo->exec($createTableSql);
    echo PHP_EOL.'teste';