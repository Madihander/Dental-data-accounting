<?php
require_once '../../includes/db.php';
$fullName = $_POST['fullName'];
$date = $_POST['date'];
$time = $_POST['time'];

global $pdo;
$response = [];
//    $sql = "SELECT * FROM patients.patients_record_data WHERE startTime = :startTime AND dateRecord  =:dateRecord";
$stmt = $pdo->prepare('DELETE FROM patients.patients_record_data WHERE fullName=:fullName AND startTime =:startTime AND dateRecord  =:dateRecord');
$stmt->execute(['fullName'=>$fullName,'startTime' => $time, 'dateRecord' => $date]);
array_push($response,'good');
echo json_encode($response);
