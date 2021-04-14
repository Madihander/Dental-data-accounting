<?php
require_once '../includes/db.php';
//patient Card
$fullName = $_POST['fullName'];
$birthDate = $_POST['birthDate'];
$homeAddress = $_POST['homeAddress'];
$age = $_POST['age'];
$workPlace = $_POST['workPlace'];

$tooth18 = $_POST['tooth18'];
$tooth17 = $_POST['tooth17'];
$tooth16 = $_POST['tooth16'];
$tooth15 = $_POST['tooth15'];
$tooth14 = $_POST['tooth14'];
$tooth13 = $_POST['tooth13'];
$tooth12 = $_POST['tooth12'];
$tooth11 = $_POST['tooth11'];

$tooth21 = $_POST['tooth21'];
$tooth22 = $_POST['tooth22'];
$tooth23 = $_POST['tooth23'];
$tooth24 = $_POST['tooth24'];
$tooth25 = $_POST['tooth25'];
$tooth26 = $_POST['tooth26'];
$tooth27 = $_POST['tooth27'];
$tooth28 = $_POST['tooth28'];


$tooth48 = $_POST['tooth48'];
$tooth47 = $_POST['tooth47'];
$tooth46 = $_POST['tooth46'];
$tooth45 = $_POST['tooth45'];
$tooth44 = $_POST['tooth44'];
$tooth43 = $_POST['tooth43'];
$tooth42 = $_POST['tooth42'];
$tooth41 = $_POST['tooth41'];

$tooth31 = $_POST['tooth31'];
$tooth32 = $_POST['tooth32'];
$tooth33 = $_POST['tooth33'];
$tooth34 = $_POST['tooth34'];
$tooth35 = $_POST['tooth35'];
$tooth36 = $_POST['tooth36'];
$tooth37 = $_POST['tooth37'];
$tooth38 = $_POST['tooth38'];

$diagnosis = $_POST['diagnosis'];
$complaint = $_POST['complaint'];
$anamnesis = $_POST['anamnesis'];
$objectively = $_POST['objectively'];
$treatment = $_POST['treatment'];
$recommend = $_POST['recommend'];

global $pdo;
$sql = "INSERT INTO patients.patients_data(fullName, birthDate, homeAddress, age, workPlace, tooth18, tooth17,
    tooth16, tooth15, tooth14, tooth13, tooth12, tooth11, tooth21, tooth22, tooth23, tooth24, tooth25, tooth26, tooth27,
    tooth28, tooth48, tooth47, tooth46, tooth45, tooth44, tooth43, tooth42, tooth41, tooth31, tooth32, tooth33, tooth34,
    tooth35, tooth36, tooth37, tooth38, diagnosis, complaint, anamnesis, objectively, treatment, recommend)
    VALUES(:fullName, :birthDate, :homeAddress, :age, :workPlace, :tooth18, :tooth17,
    :tooth16, :tooth15, :tooth14, :tooth13, :tooth12, :tooth11, :tooth21, :tooth22, :tooth23, :tooth24, :tooth25, :tooth26,
    :tooth27, :tooth28, :tooth48, :tooth47, :tooth46, :tooth45, :tooth44, :tooth43, :tooth42, :tooth41, :tooth31, :tooth32,
    :tooth33, :tooth34, :tooth35, :tooth36, :tooth37, :tooth38, :diagnosis, :complaint, :anamnesis, :objectively, :treatment,
    :recommend)";
$stmt= $pdo->prepare($sql);
$stmt->execute([
    'fullName' => $fullName,
    'birthDate' => $birthDate,
    'homeAddress' => $homeAddress,
    'age' => $age,
    'workPlace' => $workPlace,
    'tooth18' => $tooth18,
    'tooth17' => $tooth17,
    'tooth16' => $tooth16,
    'tooth15' => $tooth15,
    'tooth14' => $tooth14,
    'tooth13' => $tooth13,
    'tooth12' => $tooth12,
    'tooth11' => $tooth11,

    'tooth21' => $tooth21,
    'tooth22' => $tooth22,
    'tooth23' => $tooth23,
    'tooth24' => $tooth24,
    'tooth25' => $tooth25,
    'tooth26' => $tooth26,
    'tooth27' => $tooth27,
    'tooth28' => $tooth28,

    'tooth48' => $tooth48,
    'tooth47' => $tooth47,
    'tooth46' => $tooth46,
    'tooth45' => $tooth45,
    'tooth44' => $tooth44,
    'tooth43' => $tooth43,
    'tooth42' => $tooth42,
    'tooth41' => $tooth41,

    'tooth31' => $tooth31,
    'tooth32' => $tooth32,
    'tooth33' => $tooth33,
    'tooth34' => $tooth34,
    'tooth35' => $tooth35,
    'tooth36' => $tooth36,
    'tooth37' => $tooth37,
    'tooth38' => $tooth38,

    'diagnosis' => $diagnosis,
    'complaint' => $complaint,
    'anamnesis' => $anamnesis,
    'objectively' => $objectively,
    'treatment' => $treatment,
    'recommend' => $recommend,
]);
return json_encode('good');