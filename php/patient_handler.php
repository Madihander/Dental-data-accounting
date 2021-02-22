<?php
require_once '../includes/db.php';




$diagnosis = $_POST["diagnosis"] ?? null;
$complaint = $_POST["complaint"] ?? null;
$anamnesis = $_POST["anamnesis"] ?? null;
$objectively = $_POST["objectively"] ?? null;
$treatment = $_POST["treatment"] ?? null;
$recommend = $_POST["recommend"] ?? null;


/*
$sql = 'INSERT INTO `electronic_journal.kz`.patient_card(surname, gender, prof,diagnosis, lament,illnes,
                                 now_illnes, visual_inspect, bite, mouth_condition,
                                 x_ray_data, plan_surveys, plan_treatment, advices, patient_table) 
 VALUES (:surname, :gender, :prof, :diagnosis, :lament, :illnes, :now_illnes, :visual_inspect,
         :bite, :mouth_condition, :x_ray_data, :plan_surveys, :plan_treatment, :advices, :patient_table)';
$stmt = $pdo->prepare($sql);
$stmt->execute([
    'surname' => $surname, 'visual_inspect' => $visual_inspect,
    'gender' => $gender, 'bite' => $bite,
    'prof' => $prof, 'mouth_condition' => $mouth_condition,
    'diagnosis' => $diagnosis, 'x_ray_data' => $x_ray_data,
    'lament' => $lament, 'plan_surveys' => $plan_surveys,
    'illnes' => $illnes, 'plan_treatment' => $plan_treatment,
    'now_illnes' => $now_illnes, 'advices' => $advices,
    'patient_table' => $patient_table
]);

*/