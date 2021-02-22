<?php
require_once '../includes/db.php';
$surname = $_POST['surname'] ?? null;
$diagnosis = $_POST['diagnosis'] ?? null;
$job = $_POST['job'] ?? null;


$sql= 'INSERT INTO `electronic_journal.kz`.daily_intake( surname, diagnosis, job) 
      VALUES ( :surname, :diagnosis , :job)';
$stmt=$pdo->prepare($sql);
$stmt->execute([
   'surname'=>$surname,
   'diagnosis'=>$diagnosis,
   'job'=>$job,
]);
