<?php
require_once '../../includes/db.php';
$fullName = $_POST['name'];
$lament = $_POST['lament'];
$phoneNumber = $_POST['number'];
$dateRecord = $_POST['dateRecord'];
$doctor = $_POST['doctor'];
$startTime = $_POST['startTime'];
$endTime = $_POST['endTime'];

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
return json_encode('good');