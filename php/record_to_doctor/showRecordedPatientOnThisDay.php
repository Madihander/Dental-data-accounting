<?php
require_once '../../includes/db.php';
global $pdo;
echo 123;
//$sql = "SELECT * FROM patients.patients_record_data WHERE startTime = :startTime AND dateRecord  =:dateRecord";
$stmt = $pdo->query('SELECT * FROM patients.patients_record_data');
$row = $stmt->fetchAll();
var_dump($row);