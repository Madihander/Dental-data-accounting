<?php
//TODO создать две функции: одну для тех полей где только одна строка, и другую для полей, в которых должно быть больше 1
require_once "../../includes/db.php";
$template = verificationTemplate($_POST['template'] ?? null);
$response = [];
handlerTemplate($template);

function verificationTemplate($template)
{
    global $response;
    if (!isset($template) || empty($template)) {
        $response = ['status' => '203', 'error' => '01'];
    } else {
        $response = ['status' => '200', 'error' => '00'];
        return $template;
    }
}


function handlerTemplate($template)
{

    $arr = [1, 3, 5, 7];
    $in = str_repeat('?,', count($arr) - 1) . '?';
    switch ($template) {
        case "Enamel caries" :
            takeAnyTemplate($arr, $in, 1);
            break;
        case "Dentine caries" :
            takeAnyTemplate($arr, $in, 2);
            break;
        case "Caries of cement" :
            takeAnyTemplate($arr, $in, 3);
            break;
        case "Caries of cement" :
            takeAnyTemplate($arr, $in, 3);
            break;
        case "Caries of cement" :
            takeAnyTemplate($arr, $in, 3);
            break;
    }
}

function takeAnyTemplate($arr, $in, $id)
{
    global $pdo;
    global $response;
    // Diagnosis
    $stmt = $pdo->prepare("SELECT description FROM diagnosis WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $response[] = $result;
    // Complaint
    $stmt = $pdo->prepare("SELECT description FROM complaint WHERE id IN ($in)");
    $stmt->execute($arr);
    $result = $stmt->fetchAll();
    $response[] = $result;
    // Anamnesis
    $stmt = $pdo->prepare("SELECT description FROM anamnesis_morbi WHERE id IN ($in)");
    $stmt->execute($arr);
    $result = $stmt->fetchAll();
    $response[] = $result;
    // Objectively
    $stmt = $pdo->prepare("SELECT description FROM objectively_visual_inspection WHERE id_diseases = :id");
    $stmt->execute(['id' => $id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $response[] = $result;
    // Treatment
    $stmt = $pdo->prepare("SELECT description FROM treatment WHERE id_diseases = :id");
    $stmt->execute(['id' => $id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $response[] = $result;
    // Recomendation
    $stmt = $pdo->prepare("SELECT description FROM recommend WHERE id_diseases = :id");
    $stmt->execute(['id' => $id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $response[] = $result;

    exit(sendResponse());
}


function sendResponse()
{
    global $response;
    //header('Content-Type: application/json');
    echo json_encode($response);
}

?>