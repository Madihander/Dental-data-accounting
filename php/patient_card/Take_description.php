<?php
require_once "../../includes/db.php";

$field_id = $_POST['field_id'] ?? null;
$id = $_POST['id'] ?? null;
$response = [];
handlerField($field_id, $id);

function handlerField($field, $id)
{
    switch ($field) {
        case "diagnosis":
            takeDiagnosis();
            break;
        case "complaint":
            takeAnotherDescription($id, 'SELECT description FROM complaint WHERE avior_mk.complaint.id_diseases = :id');
            break;
        case "anamnesis":
            takeAnamnesis();
            break;
        case "objectively":
            takeAnotherDescription($id, 'SELECT description FROM objectively_visual_inspection WHERE avior_mk.objectively_visual_inspection.id_diseases = :id');
            break;
        case "treatment":
            takeAnotherDescription($id, 'SELECT description FROM treatment WHERE avior_mk.treatment.id_diseases = :id;');
            break;
        case "recommend":
            takeAnotherDescription($id, 'SELECT description FROM recommend WHERE avior_mk.recommend.id_diseases = :id');
            break;
    }
}

function takeDiagnosis()
{
    global $pdo;
    global $response;
    $stmt = $pdo->query("SELECT * FROM diagnosis");
    while ($row = $stmt->fetch()) {
        $response[] = $row;
    }
    exit(sendResponse());
}

function takeAnamnesis()
{
    global $pdo;
    global $response;
    $stmt = $pdo->query("SELECT description FROM anamnesis_morbi");
    while ($row = $stmt->fetch()) {
        $response[] = $row;
    }
    exit(sendResponse());
}

function takeAnotherDescription($id, $request)
{
    global $pdo;
    global $response;
    $stmt = $pdo->prepare($request);
    $stmt->execute(['id' => $id]);
    while ($row = $stmt->fetch()) {
        $response[] = $row;
    }
    exit(sendResponse());

}


function sendResponse()
{
    global $response;
    header('Content-Type: application/json');
    echo json_encode($response);
}