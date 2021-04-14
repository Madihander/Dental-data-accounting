<?php
//Диагноз
function showCariesDiagnosis()
{
    global $pdo;
    $sql = "SELECT title FROM diagnosis.caries";
    $stmt = $pdo->query($sql);
    while ($row = $stmt->fetch()) {
        echo "<li>
              <input type='radio' class='radio show_info' checked name='chose' value=" . $row['title'] . " 
              onclick='getCheckedRadioDiagnosis()'><p>" . $row['title'] . "</p>
              </li>";
    }
}

function showParadontDiagnosis()
{
    global $pdo;
    $sql = "SELECT title FROM diagnosis.paradont";
    $stmt = $pdo->query($sql);
    while ($row = $stmt->fetch()) {
        echo "<li>
                                     <input type='radio' class='radio show_info' checked name='chose' value=" . $row['title'] . " 
                                     onclick='getCheckedRadioDiagnosis()'> " . $row['title'] . "
                                     </li>";
    }
}

function showPulpitDiagnosis()
{
    global $pdo;
    $sql = "SELECT title FROM diagnosis.pulpit";
    $stmt = $pdo->query($sql);
    while ($row = $stmt->fetch()) {
        echo "<li>
                                     <input type='radio' class='radio show_info' checked name='chose' value=" . $row['title'] . " 
                                     onclick='getCheckedRadioDiagnosis()'> " . $row['title'] . "
                                     </li>";
    }
}

//Жалобы
function showCariesComplaint()
{
    global $pdo;
    $sql = "SELECT description FROM complaint.caries";
    $stmt = $pdo->query($sql);
    while ($row = $stmt->fetch()) {
        echo "<li>
                                      <input type='checkbox' class='checkbox show_info' name='chose' value=" . $row['description'] . " 
                                     onclick='getCheckedCheckBoxesComplaints()'> " . $row['description'] . "
                                     </li>";
    }
}

function showParadontComplaint()
{
    global $pdo;
    $sql = "SELECT description FROM complaint.peredont";
    $stmt = $pdo->query($sql);
    while ($row = $stmt->fetch()) {
        echo "<li>
                                       <input type='checkbox' class='checkbox show_info' name='chose' value=" . $row['description'] . " 
                                     onclick='getCheckedCheckBoxesComplaints()'> " . $row['description'] . "
                                     </li>";
    }

}

function showPulpitComplaint()
{
    global $pdo;
    $sql = "SELECT description FROM complaint.pulpit";
    $stmt = $pdo->query($sql);
    while ($row = $stmt->fetch()) {
        echo "<li>
                                       <input type='checkbox' class='checkbox show_info' name='chose' value=" . $row['description'] . " 
                                     onclick='getCheckedCheckBoxesComplaints()'> " . $row['description'] . "
                                     </li>";
    }
}

//Анамнезис
function showCommonAnamnesis()
{
    global $pdo;
    $sql = "SELECT description FROM anamnesis.common";
    $stmt = $pdo->query($sql);
    while ($row = $stmt->fetch()) {
        echo "<li>
                                        <input type='radio' class='radio show_info' checked name='chose' value=" . $row['description'] . " 
                                     onclick='getCheckedRadioAnamnesis()'> " . $row['description'] . "
                                     </li>";
    }
}

//Объективно
function showEasyCariesObjectively()
{
    global $pdo;
    $sql = "SELECT description FROM objectively.`easy caries`";
    $stmt = $pdo->query($sql);
    while ($row = $stmt->fetch()) {
        echo "<li>
                                        <input type='checkbox' class='checkbox_objectively show_info' name='chose' value=" . $row['description'] . " 
                                     onclick='getCheckedCheckBoxesObjectively()'> " . $row['description'] . "
                                     </li>";
    }
}

function showNormalCariesObjectively()
{
    global $pdo;
    $sql = "SELECT description FROM objectively.`normal caries`";
    $stmt = $pdo->query($sql);
    while ($row = $stmt->fetch()) {
        echo "<li>
                                        <input type='checkbox' class='checkbox_objectively show_info' name='chose' value=" . $row['description'] . " 
                                     onclick='getCheckedCheckBoxesObjectively()'> " . $row['description'] . "
                                     </li>";
    }
}

function showBadCariesObjectively()
{
    global $pdo;
    $sql = "SELECT description FROM objectively.`bad caries`";
    $stmt = $pdo->query($sql);
    while ($row = $stmt->fetch()) {
        echo "<li>
                                        <input type='checkbox' class='checkbox_objectively show_info'  value=" . $row['description'] . " name='chose'
                                     onclick='getCheckedCheckBoxesObjectively()'> " . $row['description'] . "
                                     </li>";
    }
}

function showHardCariesObjectively()
{
    global $pdo;
    $sql = "SELECT description FROM objectively.`hard caries`";
    $stmt = $pdo->query($sql);
    while ($row = $stmt->fetch()) {
        echo "<li>
                                        <input type='checkbox' class='checkbox_objectively show_info' value=" . $row['description'] . " name='chose'  
                                     onclick='getCheckedCheckBoxesObjectively()'> " . $row['description'] . "
                                     </li>";
    }
}

//Лечение
function showEasyCariesTreatment()
{
    global $pdo;
    $sql = "SELECT description FROM treatment.`easy caries`";
    $stmt = $pdo->query($sql);
    while ($row = $stmt->fetch()) {
        echo "<li>
                                        <input type='checkbox' class='checkbox_treatment show_info'  value=" . $row['description'] . "  name='chose'
                                     onclick='getCheckedCheckBoxesTreatment()'> " . $row['description'] . "
                                     </li>";
    }
}

function showNormalCariesTreatment()
{
    global $pdo;
    $sql = "SELECT description FROM treatment.`normal caries`";
    $stmt = $pdo->query($sql);
    while ($row = $stmt->fetch()) {
        echo "<li>
                                        <input type='checkbox' class='checkbox_treatment show_info'  value=" . $row['description'] . " name='chose' 
                                     onclick='getCheckedCheckBoxesTreatment()'> " . $row['description'] . "
                                     </li>";
    }
}

function showBadCariesTreatment()
{
    global $pdo;
    $sql = "SELECT description FROM treatment.`bad caries`";
    $stmt = $pdo->query($sql);
    while ($row = $stmt->fetch()) {
        echo "<li>
                                        <input type='checkbox' class='checkbox_treatment show_info' name='chose' value=" . $row['description'] . " 
                                     onclick='getCheckedCheckBoxesTreatment()'> " . $row['description'] . "
                                     </li>";
    }
}

function showHardCariesTreatment()
{
    global $pdo;
    $sql = "SELECT description FROM treatment.`hard caries`";
    $stmt = $pdo->query($sql);
    while ($row = $stmt->fetch()) {
        echo "<li>
                                        <input type='checkbox' class='checkbox_treatment show_info' name='chose' value=" . $row['description'] . " 
                                     onclick='getCheckedCheckBoxesTreatment()'> " . $row['description'] . "
                                     </li>";
    }
}

//Рекомендации
function showCommonRecommend()
{
    global $pdo;
    $sql = "SELECT description FROM recommend.common";
    $stmt = $pdo->query($sql);
    while ($row = $stmt->fetch()) {
        echo "<li>
                                        <input type='checkbox' class='checkbox_recommend show_info' checked name='chose' value=" . $row['description'] . " 
                                     onclick='getCheckedCheckBoxesRecommend()'> " . $row['description'] . "
                                     </li>";
    }
}

?>

