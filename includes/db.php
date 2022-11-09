<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 08.10.2019
 * Time: 18:43
 */

$host = 'localhost';
$db = 'avior_mk';
$user = 'root';
$pass = 'root';
$charset = 'utf8';


// специальнгая ссылка для подключения к MySQL базе данных
$dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=3307";

// TODO разобраться
$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false
];
$pdo = new PDO($dsn, $user, $pass, $opt);
//Взаимодействие с базой данных. PDO. Часть 1