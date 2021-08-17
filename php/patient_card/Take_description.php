<?php
require_once "../../includes/db.php";

$field = $_POST['field'] ?? null;
$id = $_POST['id'] ?? null;
$response=['status' => '201', 'error' => null];
function handlerField($field, $id)
{
    switch ($field) {
        case "diagnosis":
            takeDiagnosis();
            break;
        case "complaint":
            takeComplaint($id);
            break;
        case "anamnesis":
            takeAnamnesis();
            break;
        case "objectively":
            takeObjectively($id);
            break;
        case "treatment":
            takeTreatment($id);
            break;
        case "recommend":
            takeRecommend($id);
            break;
    }
}


function takeDiagnosis()
{
    global $pdo;
    global $response;
    $stmt = $pdo->prepare("SELECT * FROM diagnosis");
    $row = $stmt->fetch(PDO::FETCH_LAZY);
    if ($row){
        array_push($response,$row['id'],$row['description']);
        exit(sendResponse());
    }else{
        $response = ['status'=>'203', 'error' => 'Не нашли совпадений'];
        exit(sendResponse());
    }
}

function takeComplaint($id)
{
    global $pdo;
    global $response;
    $stmt = $pdo->prepare("SELECT description FROM complaint WHERE avior_mk.complaint.id_diagnosis = :id;");
    $stmt->execute(['id'=>$id]);
    $row = $stmt->fetch(PDO::FETCH_LAZY);
    if ($row){
        array_push($response,$row['description']);
        exit(sendResponse());
    }else{
        $response = ['status'=>'203', 'error' => 'Не нашли совпадений'];
        exit(sendResponse());
    }
}

function takeAnamnesis()
{
    global $pdo;
    global $response;
    $stmt = $pdo->prepare("SELECT description FROM avior_mk.anamnesis");
    $row = $stmt->fetch(PDO::FETCH_LAZY);
    if ($row){
        array_push($response,$row['description']);
        exit(sendResponse());
    }else{
        $response = ['status'=>'203', 'error' => 'Не нашли совпадений'];
        exit(sendResponse());
    }
}

function takeObjectively($id)
{
    global $pdo;
    global $response;
    $stmt = $pdo->prepare("SELECT description FROM objectively WHERE avior_mk.objectively.id_diagnosis = :id;");
    $stmt->execute(['id'=>$id]);
    $row = $stmt->fetch(PDO::FETCH_LAZY);
    if ($row){
        array_push($response,$row['description']);
        exit(sendResponse());
    }else{
        $response = ['status'=>'203', 'error' => 'Не нашли совпадений'];
        exit(sendResponse());
    }
}

function takeTreatment($id)
{
    global $pdo;
    global $response;
    $stmt = $pdo->prepare("SELECT description FROM treatment WHERE avior_mk.treatment.id_diagnosis = :id;");
    $stmt->execute(['id'=>$id]);
    $row = $stmt->fetch(PDO::FETCH_LAZY);
    if ($row){
        array_push($response,$row['description']);
        exit(sendResponse());
    }else{
        $response = ['status'=>'203', 'error' => 'Не нашли совпадений'];
        exit(sendResponse());
    }
}

function takeRecommend($id)
{
    global $pdo;
    global $response;
    $stmt = $pdo->prepare("SELECT description FROM recommend WHERE avior_mk.recommend.id_diagnosis = :id;");
    $stmt->execute(['id'=>$id]);
    $row = $stmt->fetch(PDO::FETCH_LAZY);
    if ($row){
        array_push($response,$row['description']);
        exit(sendResponse());
    }else{
        $response = ['status'=>'203', 'error' => 'Не нашли совпадений'];
        exit(sendResponse());
    }
}
function sendResponse()
{
    global $response;
    echo json_encode($response);
}