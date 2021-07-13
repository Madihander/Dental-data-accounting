<?php
require_once '../../includes/db.php';
$id = $_POST['id'];

global $pdo;
$response = [];
//    $sql = "SELECT * FROM patients.patients_record_data WHERE startTime = :startTime AND dateRecord  =:dateRecord";
$stmt = $pdo->prepare('DELETE FROM record_patient WHERE id =:id');
$stmt->execute(['id' => $id]);
array_push($response, 'good');
echo json_encode($response);
