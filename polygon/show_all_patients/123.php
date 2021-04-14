<?php

require_once '../../includes/db.php';
$date = $_POST['date'];
global $pdo;
$stmt = $pdo->prepare('SELECT * FROM patients.patients_record_data WHERE dateRecord  =:dateRecord');
$stmt->execute(['dateRecord' => $date]);
$out = array();
while ($row = $stmt->fetch()) {
    $out[] = $row;
}
header('Content-Type: application/json');
echo(json_encode($out));
exit();
?>
