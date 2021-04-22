<?php
/*Коды ответа
 * status:200 - хорошо
 * status:203 - информация не авторитетна - не подходит,переделать
 *
 * error:00 - ошибок нету
 *
 * Ошибки, если не проходят по regex
 * error:01 - ошибка,изменить ФИО
 * error:02 - ошибка,изменить номер телефона
 * error:03 - ошибка,изменить дату записи
 * error:04 - ошибка,изменить доктора
 * error:05 - ошибка,изменить время начала
 * error:06 - ошибка,изменить время конца
 * error:07 - ошибка,изменить жалобу
 *
 * Серверные ошибки
 * error:08 - ошибка,дупликат, есть человек,который записан на такое начальное время
 * error:010 - ошибка,неудалось добавить в таблицу
 *
 * Ошибки, если не удалось захешировать
 * error:019 - ошибка, неудалось захешировать ФИО
 * error:029 - ошибка, неудалось захешировать номер-телефона
 * error:039 - ошибка, неудалось захешировать дату записи
 * error:049 - ошибка, неудалось захешировать доктора
 * error:059 - ошибка, неудалось захешировать время начала
 * error:069 - ошибка, неудалось захешировать время конца
 * error:079 - ошибка, неудалось захешировать жалобу
 *
 *
 *
 * */

//подключаемся к базе
require_once '../../includes/db.php';

//Создаем Переменные
//TODO вернуть $fullName = verificationFullName($_POST['name'] ?? null);
//TODO вернуть $phoneNumber = verificationPhoneNumber($_POST['number'] ?? null);
//TODO вернуть $dateRecord = verificationDateRecord($_POST['dateRecord'] ?? null);
//TODO как дороботаешь regex у этих полей, добавляй их в функции как параметр
//TODO вернуть $doctor = $_POST['doctor'];
//TODO вернуть $startTime = $_POST['startTime'];
//TODO вернуть $endTime = $_POST['endTime'];
//TODO вернуть $lament = $_POST['lament'];
$fullName =verificationFullName('Петров Петр Петрович');
$phoneNumber = verificationPhoneNumber('+7(223)121-24-53');
$dateRecord = verificationDateRecord('21.04.2021');
$doctor = '4rthf';
$startTime = '13:00';
$endTime = '14:00';
$lament = 'lament';

//Этот массив будет отправляется ajax
$response = ['status' => 201, 'error' => null];

//Проверка записан кто-либо на это время в этот день
$checkResultDuplicate = checkDuplicatetime($startTime, $dateRecord);
if (!is_null($checkResultDuplicate)) {
    $response['status'] = 400;
    if ($checkResultDuplicate = 'duplicate') {
        $response['status'] = '203';
        $response['error'] = '08';
        print_r($response);
        exit();
        //exit(sendResponse());
    }
}


global $pdo;
$sql = "INSERT INTO patients.patients_record_data(fullName, lament, 
phoneNumber, dateRecord, doctor,startTime,endTime)
VALUES(:fullName, :lament, :phoneNumber, :dateRecord, :doctor,:startTime,:endTime)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    'fullName' => $fullName,
    'lament' => $lament,
    'phoneNumber' => $phoneNumber,
    'dateRecord' => $dateRecord,
    'doctor' => $doctor,
    'startTime' => $startTime,
    'endTime' => $endTime,
]);
$response['status'] = '200';
$response['error'] = '00';
print_r($response);
exit();
//exit(sendResponse());

//Отправляет ответ ajax
function sendResponse()
{
    global $response;
    return json_encode($response);
}

//Проверяем ФИО
function verificationFullName($login)
{
    global $response;
    $regex = '/^[А-ЯA-Z][а-яa-zА-ЯA-Z\-]{0,}\s[А-ЯA-Z][а-яa-zА-ЯA-Z\-]{1,}(\s[А-ЯA-Z][а-яa-zА-ЯA-Z\-]{1,})?$/';
    if (!isset($login) || empty($login)) {
        $response['status'] = '203';
        $response['error'] = '01';
        print_r($response);
        exit();
        //exit(sendResponse());
    } else {
        $response['status'] = '200';
        $response['error'] = '00';
        return dataHashing($login);
    }
}

//Проверяем номер телефона
function verificationPhoneNumber($number)
{
    global $response;
    if (!isset($number) || empty($number) || !preg_match('/^(\+)?(\(\d{2,3}\) ?\d|\d)(([ \-]?\d)|( ?\(\d{2,3}\) ?)){5,12}\d$/', $number)) {
        $response['status'] = '203';
        $response['error'] = '02';
        exit(sendResponse());
    } else {
        $response['status'] = '200';
        $response['error'] = '00';
        return dataHashing($number);
    }
}

//Проверяем дату записи
function verificationDateRecord($date)
{
    global $response;
    if (!isset($date) || empty($date) || !preg_match('/^(0?[1-9]|[12][0-9]|3[01])[.](0?[1-9]|1[012])[.]\d{4}$/', $date)) {
        $response['status'] = '203';
        $response['error'] = '03';
        exit(sendResponse());
    } else {
        $response['status'] = '200';
        $response['error'] = '00';
        return dataHashing($date);
    }
}

//TODO доделать regex для поля
//Проверяем доктора
function verificationDoctor($doctor)
{
    global $response;
    if (!isset($doctor) || empty($doctor) || !preg_match('regex', $doctor)) {
        $response['status'] = '203';
        $response['error'] = '04';
        exit(sendResponse());
    } else {
        $response['status'] = '200';
        $response['error'] = '00';
        return dataHashing($doctor);
    }
}

//TODO доделать regex для поля начальное время
//Проверяем дату начальное время
function verificationStartTime($start)
{
    global $response;
    if (!isset($start) || empty($start) || !preg_match('regex', $start)) {
        $response['status'] = '203';
        $response['error'] = '05';
        exit(sendResponse());
    } else {
        $response['status'] = '200';
        $response['error'] = '00';
        return dataHashing($start);
    }
}

//TODO доделать regex для поля конеченое время
//Проверяем дату конечное время
function verificationEndTime($end)
{
    global $response;
    if (!isset($end) || empty($end) || !preg_match('regex', $end)) {
        $response['status'] = '203';
        $response['error'] = '06';
        exit(sendResponse());
    } else {
        $response['status'] = '200';
        $response['error'] = '00';
        return dataHashing($end);
    }
}

//TODO доделать regex для поля жалоба
//Проверяем жалобу
function verificationLament($lament)
{
    global $response;
    if (!isset($lament) || empty($lament) || !preg_match('regex', $lament)) {
        $response['status'] = '203';
        $response['error'] = '07';
        exit(sendResponse());
    } else {
        $response['status'] = '200';
        $response['error'] = '00';
        return dataHashing($lament);
    }
}

// Хешируем данные
function dataHashing($data)
{
    $data = password_hash($data, PASSWORD_BCRYPT);
    return $data;
}

//Проверка на дубликат записи на данное время
function checkDuplicatetime($time, $date)
{
    global $pdo;
    $sql = 'SELECT startTime,dateRecord FROM patients.patients_record_data WHERE startTime = :startTime AND dateRecord  =:dateRecord';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['startTime' => $time, 'dateRecord' => $date]);
    $result = $stmt->fetchAll();
    if (count($result) == 0) return null;
    if (count($result) == 2) return 'duplicate';
}
