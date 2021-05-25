<?php

/*************************************
 * ----- INIT DATABASE CONNECTION -----
 *************************************/

function init_db()
{
    try {

        $host = $_ENV['DISCODING_DB_HOST'] ?? 'localhost';
        $dbname = $_ENV['DISCODING_DB_NAME'] ?? 'discoding';
        $charset = $_ENV['DISCODING_DB_CHARSET'] ?? 'utf8';
        $user = $_ENV['DISCODING_DB_USER'] ?? 'root';
        $password = $_ENV['DISCODING_DB_PASSWORD'] ?? '';

        $db = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset",
            $user,
            $password,
            [PDO::MYSQL_ATTR_INIT_COMMAND => "SET time_zone = 'Europe/Paris'"]);

    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    return $db;
}
