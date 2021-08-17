<?php
//TODO ПРОЧИТАЙ и ПОСМОТРИ видик и статью https://habr.com/ru/post/483202/ и https://www.youtube.com/watch?v=J4Fy6lmLBr0
require_once '../../includes/db.php';
$id = $_POST['id'];
$time = $_POST['time'];
$date = $_POST['date'];
global $pdo;
$response = ['status' => '201', 'error' => null];
//    $sql = "SELECT * FROM patients.patients_record_data WHERE startTime = :startTime AND dateRecord  =:dateRecord";
$stmt = $pdo->prepare('SELECT * FROM record_patient WHERE id =:id AND startTime = :startTime AND dateRecord  =:dateRecord');
$stmt->execute(['id' => $id, 'startTime' => $time, 'dateRecord' => $date]);
$row = $stmt->fetch(PDO::FETCH_LAZY);
if ($row) {
    array_push($response, $row['id'], $row['fullName'], $row['phoneNumber'], $row['dateRecord'],
        $row['attendingDoctor'], $row['startTime'], $row['endTime'], $row['lament']);
    exit(sendResponse());
} else {
    $response = ['status' => '203', 'error' => '01'];
    echo 123;
    exit(sendResponse());
}
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
        return $date;
    }
}

function verificationStartTime($start)
{
    global $response;
    //TODO добавить regex
    $regex = '^([0-1]?[0-9]|2[0-3]):[0-5][0-9]$';
    if (empty($start)) {
        $response['status'] = '203';
        $response['error'] = '05';
        exit(sendResponse());
    } else {
        $response['status'] = '200';
        $response['error'] = '00';
        return $start;
    }
}

function sendResponse()
{
    global $response;
    echo json_encode($response);
}