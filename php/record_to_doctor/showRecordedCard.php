<?php
//TODO ПРОЧИТАЙ и ПОСМОТРИ видик и статью https://habr.com/ru/post/483202/ и https://www.youtube.com/watch?v=J4Fy6lmLBr0
require_once '../../includes/db.php';
$time = $_POST['time'];
$date = $_POST['date'];
    global $pdo;
    $response = [];
//    $sql = "SELECT * FROM patients.patients_record_data WHERE startTime = :startTime AND dateRecord  =:dateRecord";
    $stmt = $pdo->prepare('SELECT * FROM patients.patients_record_data WHERE startTime = :startTime AND dateRecord  =:dateRecord');
    $stmt->execute(['startTime' => $time, 'dateRecord' => $date]);
    while ($row = $stmt->fetch()) {
        array_push($response, $row['fullName'], $row['lament'], $row['phoneNumber'], $row['dateRecord'],
            $row['doctor'], $row['startTime'], $row['endTime']);
        echo json_encode($response);
    }