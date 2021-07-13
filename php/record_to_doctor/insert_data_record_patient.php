<?php
//TODO В данный момент я отказываюсь от хеширования пароль,
// так что надо будет создать свою шифр,который можно будет расшифровать

//TODO https://habr.com/ru/post/146901/
//Это где-то в будущем,надо будет сделать, потому что рынок самой программы только страны СНГ,наверное даже РК и РФ

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
 * error:07 - ошибка, время начала = время конца
 * error:08 - ошибка, время начала > время конца
 * error:09 - ошибка,изменить жалобу
 *
 * Серверные ошибки
 * error:010 - ошибка,дупликат, есть человек,который записан на такое начальное время
 * error:011 - ошибка,неудалось добавить в таблицу
 * error:012 - ошибка,неудалось найти в таблице запись
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

$fullName = verificationFullName($_POST['name'] ?? null);
$phoneNumber = verificationPhoneNumber($_POST['number'] ?? null);
$dateRecord = verificationDateRecord($_POST['dateRecord'] ?? null);
$doctor = verificationDoctor($_POST['doctor']);
$startTime = verificationStartTime($_POST['startTime']);
$endTime = verificationEndTime($_POST['endTime']);
$lament = verificationLament($_POST['lament']);


//Этот массив будет отправляется ajax
$response = ['status' => '201', 'error' => null, 'id' => null];
$data = [];
//Проверка записан кто-либо на это время в этот день
$checkResultDuplicate = checkDuplicatetime($startTime, $dateRecord);
if (!is_null($checkResultDuplicate)) {
    $response['status'] = 400;
    if ($checkResultDuplicate = 'duplicate') {
        $response = ['status' => '203', 'error' => '010'];
        exit(sendResponse());
    }
}
//Пока что не требуется
//dataHashing($fullName, $phoneNumber);
verificationTime($startTime, $endTime);

global $pdo;
$sql = "INSERT INTO record_patient(fullName,phoneNumber, dateRecord, attendingDoctor,startTime,endTime,lament)
        VALUES(:fullName,:phoneNumber, :dateRecord, :attendingDoctor,:startTime,:endTime,:lament)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    'fullName' => $fullName,
    'phoneNumber' => $phoneNumber,
    'dateRecord' => $dateRecord,
    'attendingDoctor' => $doctor,
    'startTime' => $startTime,
    'endTime' => $endTime,
    'lament' => $lament,
]);
$stmt = $pdo->prepare('SELECT id FROM record_patient WHERE fullName =:fullName AND dateRecord =:dateRecord
                                AND startTime =:startTime AND endTime =:endTime');
$stmt->execute([
    'fullName' => $fullName,
    'dateRecord' => $dateRecord,
    'startTime' => $startTime,
    'endTime' => $endTime,
]);
$row = $stmt->fetch(PDO::FETCH_LAZY);
if ($row) {
    $id = $row['id'];
    $response = ['status' => '200', 'error' => '00', 'id' => $id];
    exit(sendResponse());
} else {
    $response = ['status' => '200', 'error' => '011'];
    exit(sendResponse());
}

//Отправляет ответ ajax
function sendResponse()
{
    global $response;
    echo json_encode($response);
}

//Проверяем ФИО
function verificationFullName($login)
{
    global $response;
    $regex = '/[а-яА-ЯЁё]+\s+[а-яА-ЯЁё]+\s+[а-яА-ЯЁё]+/ m';
    if (!isset($login) || empty($login) || !preg_match($regex, $login)) {
        $response = ['status' => '203', 'error' => '01'];
        exit(sendResponse());
    } else {
        $response = ['status' => '200', 'error' => '00'];
        return $login;
    }
}

//Проверяем номер телефона
function verificationPhoneNumber($number)
{
    global $response;
    $regex = '/^(\+)?(\(\d{2,3}\) ?\d|\d)(([ \-]?\d)|( ?\(\d{2,3}\) ?)){5,12}\d$/';
    if (!isset($number) || empty($number) || !preg_match($regex, $number)) {
        $response = ['status' => '203', 'error' => '02'];
        exit(sendResponse());
    } else {
        $response = ['status' => '200', 'error' => '00'];
        return $number;
    }
}

//Проверяем дату записи
function verificationDateRecord($date)
{
    global $response;
    $regex = '/^(0?[1-9]|[12][0-9]|3[01])[.](0?[1-9]|1[012])[.]\d{4}$/';
    if (!isset($date) || empty($date) || !preg_match($regex, $date)) {
        $response = ['status' => '203', 'error' => '03'];
        exit(sendResponse());
    } else {
        $response = ['status' => '200', 'error' => '00'];
        return $date;
    }
}

//Проверяем доктора
function verificationDoctor($doctor)
{
    global $response;
    //$regex = '/[а-яА-ЯЁё]+\s+[а-яА-ЯЁё]+\s+[а-яА-ЯЁё]+/ m';
    if (!isset($doctor) || empty($doctor) /*|| !preg_match($regex, $doctor)*/) {
        $response = ['status' => '203', 'error' => '04'];
        exit(sendResponse());
    } else {
        $response = ['status' => '200', 'error' => '00'];
        return $doctor;
    }
}

//Проверяем дату начальное время
function verificationStartTime($start)
{
    global $response;
    $regex = '/^([0-1]?[0-9]|2[0-3]):[0-5][0-9]$/';
    if (!isset($start) || empty($start) || !preg_match($regex, $start)) {
        $response = ['status' => '203', 'error' => '05'];
        exit(sendResponse());
    } else {
        $response = ['status' => '200', 'error' => '00'];
        return $start;
    }
}

//Проверяем дату конечное время
function verificationEndTime($end)
{
    global $response;
    $regex = '/^([0-1]?[0-9]|2[0-3]):[0-5][0-9]$/';
    if (!isset($end) || empty($end) || !preg_match($regex, $end)) {
        $response = ['status' => '203', 'error' => '06'];
        exit(sendResponse());
    } else {
        $response = ['status' => '200', 'error' => '00'];
        return $end;
    }
}

//Проверяем жалобу
function verificationLament($lament)
{
    global $response;
    if (!isset($lament) || empty($lament)) {
        $response = ['status' => '203', 'error' => '09'];
        exit(sendResponse());
    } else {
        $response = ['status' => '200', 'error' => '00'];
        return $lament;
    }
}

// Хешируем данные
/* Не требуется.
function dataHashing($fullName, $phoneNumber)
{
    global $data;
    $fullName = password_hash($fullName, PASSWORD_BCRYPT);
    $phoneNumber = password_hash($phoneNumber, PASSWORD_BCRYPT);
    array_push($data, $fullName, $phoneNumber);
    return $data;
}
*/
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

function verificationTime($startTime, $endTime)
{
    global $response;
    if (strcmp($startTime, $endTime) === 0) {
        $response = ['status' => '203', 'error' => '07'];
        exit(sendResponse());
    } elseif ($startTime > $endTime) {
        $response = ['status' => '203', 'error' => '08'];
        exit(sendResponse());
    } else {
        $response = ['status' => '200', 'error' => '00'];
        return true;
    }
}

