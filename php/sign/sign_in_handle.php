<?php
//Подключение к базе данных
require_once '../../includes/db.php';
session_start();
//Записываем отправленные данных от ajax в переменные и проверяем на всякие бяки
$login = $_POST['login'];
$pass = $_POST['pass'];
//Массив, который будет ответом для ajax
$response = ['status' => '201', 'error' => null];

global $pdo;
// запрос выбрать из таблицы user_mk login и pass, который одинаковы по значению с пришедшими данными
$stmt = $pdo->prepare('SELECT login,pass,fullName FROM user_mk WHERE login =:login AND pass =:pass');
$stmt->execute(['login' => $login, 'pass' => $pass]);
$user = $stmt->fetch();
// Если данные найдены стартуем ссесию и отправляем положительный ответ
if ($user) {
    $_SESSION['user'] = [
        'login' => $login,
        'fullName' => $user['fullName']
    ];
    $_SESSION['login'] = $login;
    $response = ['status' => '200', 'error' => '00'];
    exit(sendResponse());
} else {
    $response = ['status' => '203', 'error' => '03'];
    exit(sendResponse());
}

//Убирает бики из отправленных данных
function clean($value)
{
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);

    return $value;
}

//Проверяет на пустоту
function verifyLogin($login)
{
    clean($login);
    if (!($login) || empty($login)) {
        $response = ['status' => '203', 'error' => '01'];
        exit(sendResponse());
    } else {
        return $login;
    }
}

//Проверяет на пустоту
function verifyPass($pass)
{
    clean($pass);
    if (!($pass) || empty($pass)) {
        $response = ['status' => '203', 'error' => '01'];
        exit(sendResponse());
    } else {
        return $pass;
    }
}

//Отправляет ответ ajax
function sendResponse()
{
    global $response;
    echo json_encode($response);
}