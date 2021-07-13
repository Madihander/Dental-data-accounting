<?php
require_once '../../includes/db.php';
global $pdo;
$date = $_POST['date'] ?? null;
$data = [];
$sql = "SELECT * FROM record_patient WHERE dateRecord  =:dateRecord";
$stmt = $pdo->prepare($sql);
$stmt->execute(['dateRecord' => $date]);
while ($row = $stmt->fetchall()) {
    $data = $row;
    echo json_encode($data);
}