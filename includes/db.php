<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 08.10.2019
 * Time: 18:43
 */

$host = 'localhost';
$db = 'electronic_journal_kz';
$user = 'root';
$pass = 'root';
$charset = 'utf8';

// специальнгая ссылка для подключения к MySQL базе данных
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// TODO разобраться
$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false
];

try {
    $pdo = new PDO($dsn, $user, $pass, $opt);
} catch (PDOException $e) {
    die($e);
}
//Взаимодействие с базой данных. PDO. Часть 1