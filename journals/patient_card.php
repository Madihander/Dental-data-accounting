<?php
require_once '../includes/db.php';
?>
<!--СОХРАНИТЬ ДАННЫЕ В JSON СТРОКУ В PHP И ДОДЕЛАТЬ МАССИВ В JS
<!--TODO ЛИЧНАЯ КАРТА ПАЦИЕНТА-->
<!--TODO ЗАДАЧА-СДЕЛАТЬ ЧТОБЫ НОВОЕ ПОЛЕ ДЛЯ ВВОДА ПОЯВЛЯЛОСЬ С ПОМОЩЬЮ + СЛЕВА И НОМЕР САМ УВЕЛИЧЕВАЛСЯ НА 1 КАЖДЫЙ РАЗ-->
<!--TODO ИСПОЛЬЗОВАТЬ ПОДГОТОВЛЕННЫ ПУНКТЫ-->
<!--TODO ВСЕ STYLE ПЕРЕНЕСТИ В CSS -->
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>ЛИЧНАЯ КАРТА ПАЦИЕНТА</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/patient_card.css">
    <!-- JQuery UI -->
    <link rel="stylesheet" href="../libs/jquery-ui/jquery-ui.css">
    <link rel="stylesheet" href="../libs/jquery-ui/jquery-ui.theme.css">
</head>
<body>
<div class="container-fluid">
    <div class="row mt-2">
        <div class="col-12">
            <p class="ml-2">Интервал:</p>
            <div class="row brick">
                <div class="col-12 d-flex justify-content-center pt-3 pb-3">
                    <div>
                        <!--Верхний ряд зубов-->
                        <div class="row">
                            <!--Правый ряд-->
                            <div class="col-6 pr-2 d-flex justify-content-end zub_row_left">
                                <div class="d-flex flex-column justify-content-center">
                                    <img src="https://img.icons8.com/android/48/000000/tooth.png"/> <span
                                            class="d-flex justify-content-center podzub">42</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <img src="https://img.icons8.com/android/48/000000/tooth.png"/> <span
                                            class="d-flex justify-content-center podzub">42</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <img src="https://img.icons8.com/android/48/000000/tooth.png"/> <span
                                            class="d-flex justify-content-center podzub">42</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <img src="https://img.icons8.com/android/48/000000/tooth.png"/> <span
                                            class="d-flex justify-content-center podzub">42</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <img src="https://img.icons8.com/android/48/000000/tooth.png"/> <span
                                            class="d-flex justify-content-center podzub">42</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <img src="https://img.icons8.com/android/48/000000/tooth.png"/> <span
                                            class="d-flex justify-content-center podzub">42</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <img src="https://img.icons8.com/android/48/000000/tooth.png"/> <span
                                            class="d-flex justify-content-center podzub">42</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <img src="https://img.icons8.com/android/48/000000/tooth.png"/> <span
                                            class="d-flex justify-content-center podzub">42</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <img src="https://img.icons8.com/android/48/000000/tooth.png"/> <span
                                            class="d-flex justify-content-center podzub">42</span>
                                </div>
                            </div>
                            <!--Левый ряд-->
                            <div class="col-6 pr-2 d-flex justify-content-end zub_row_left">
                                <div class="d-flex flex-column justify-content-center">
                                    <img src="https://img.icons8.com/android/48/000000/tooth.png"/> <span
                                            class="d-flex justify-content-center podzub">42</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <img src="https://img.icons8.com/android/48/000000/tooth.png"/> <span
                                            class="d-flex justify-content-center podzub">42</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <img src="https://img.icons8.com/android/48/000000/tooth.png"/> <span
                                            class="d-flex justify-content-center podzub">42</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <img src="https://img.icons8.com/android/48/000000/tooth.png"/> <span
                                            class="d-flex justify-content-center podzub">42</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <img src="https://img.icons8.com/android/48/000000/tooth.png"/> <span
                                            class="d-flex justify-content-center podzub">42</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <img src="https://img.icons8.com/android/48/000000/tooth.png"/> <span
                                            class="d-flex justify-content-center podzub">42</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <img src="https://img.icons8.com/android/48/000000/tooth.png"/> <span
                                            class="d-flex justify-content-center podzub">42</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <img src="https://img.icons8.com/android/48/000000/tooth.png"/> <span
                                            class="d-flex justify-content-center podzub">42</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <img src="https://img.icons8.com/android/48/000000/tooth.png"/> <span
                                            class="d-flex justify-content-center podzub">42</span>
                                </div>
                            </div>
                        </div>
                        <!--Делиметер-->
                        <div class="row" style="height: 8px;"></div>
                        <div class="row d-flex align-items-center">
                            <div class="col" style="height: 1px; background-color: #BDBDBD"></div>
                            <div class="col-1 p-0 d-flex align-items-center justify-content-center">
                                <img src="../zub/zub.svg" style="width: 30px; height: 30px;">
                            </div>
                            <div class="col" style="height: 1px; background-color: #BDBDBD"></div>
                        </div>
                        <div class="row" style="height: 8px;"></div>
                        <!--Нижний ряд зубов-->
                        <div class="row">
                            <!--Правый ряд-->
                            <div class="col-6 pr-2 d-flex justify-content-end zub_row_left">
                                <div class="d-flex flex-column justify-content-center">
                                    <img src="https://img.icons8.com/android/48/000000/tooth.png"/> <span
                                            class="d-flex justify-content-center podzub">42</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <img src="https://img.icons8.com/android/48/000000/tooth.png"/> <span
                                            class="d-flex justify-content-center podzub">42</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <img src="https://img.icons8.com/android/48/000000/tooth.png"/> <span
                                            class="d-flex justify-content-center podzub">42</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <img src="https://img.icons8.com/android/48/000000/tooth.png"/> <span
                                            class="d-flex justify-content-center podzub">42</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <img src="https://img.icons8.com/android/48/000000/tooth.png"/> <span
                                            class="d-flex justify-content-center podzub">42</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <img src="https://img.icons8.com/android/48/000000/tooth.png"/> <span
                                            class="d-flex justify-content-center podzub">42</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <img src="https://img.icons8.com/android/48/000000/tooth.png"/> <span
                                            class="d-flex justify-content-center podzub">42</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <img src="https://img.icons8.com/android/48/000000/tooth.png"/> <span
                                            class="d-flex justify-content-center podzub">42</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <img src="https://img.icons8.com/android/48/000000/tooth.png"/> <span
                                            class="d-flex justify-content-center podzub">42</span>
                                </div>
                            </div>
                            <!--Левый ряд-->
                            <div class="col-6 pr-2 d-flex justify-content-end zub_row_left">
                                <div class="d-flex flex-column justify-content-center">
                                    <img src="https://img.icons8.com/android/48/000000/tooth.png"/> <span
                                            class="d-flex justify-content-center podzub">42</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <img src="https://img.icons8.com/android/48/000000/tooth.png"/> <span
                                            class="d-flex justify-content-center podzub">42</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <img src="https://img.icons8.com/android/48/000000/tooth.png"/> <span
                                            class="d-flex justify-content-center podzub">42</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <img src="https://img.icons8.com/android/48/000000/tooth.png"/> <span
                                            class="d-flex justify-content-center podzub">42</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <img src="https://img.icons8.com/android/48/000000/tooth.png"/> <span
                                            class="d-flex justify-content-center podzub">42</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <img src="https://img.icons8.com/android/48/000000/tooth.png"/> <span
                                            class="d-flex justify-content-center podzub">42</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <img src="https://img.icons8.com/android/48/000000/tooth.png"/> <span
                                            class="d-flex justify-content-center podzub">42</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <img src="https://img.icons8.com/android/48/000000/tooth.png"/> <span
                                            class="d-flex justify-content-center podzub">42</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <img src="https://img.icons8.com/android/48/000000/tooth.png"/> <span
                                            class="d-flex justify-content-center podzub">42</span>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-3">1</div>
                            <div class="col-2 d-flex justify-content-center">
                                <button>Верхняя челюсть</button>
                            </div>
                            <div class="col-2 d-flex justify-content-center">
                                <button>Нижняя челюсть</button>
                            </div>
                            <div class="col-2 d-flex justify-content-center">
                                <button>Полость рта</button>
                            </div>

                            <div class="col-3">1</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-6 pt-2">
            <p class="m-0">Диагноз</p>
            <textarea id="diagnosis" cols="70" rows="1" style="resize: none"></textarea>
            <p>Жалобы</p>
            <textarea id="complaint" cols="80" rows="3"></textarea>
            <p>Анамнезис"</p>
            <textarea id="anamnesis" cols="80" rows="3"></textarea>
            <p>Объективно</p>
            <textarea id="objectively" cols="80" rows="3"></textarea>
            <p>Лечение</p>
            <textarea id="treatment" cols="80" rows="3"></textarea>
            <p>Рекомендации</p>
            <textarea id="recommend" cols="80" rows="3"></textarea>
        </div>
        <div class="col-6 pt-2">
            <div id="select_diagnosis">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-4">
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger">Диагноз</button>
                            <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Кариес</a>
                                <a class="dropdown-item" href="#">Пульпит</a>
                                <a class="dropdown-item" href="#">Парадонтит</a>

                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <h5>Кариес</h5>
                        <ul id="caries_list">
                            <?
                            $stmt = $pdo->query("SELECT id, title FROM diagnosis.caries");
                            while ($result = $stmt->fetch(PDO::FETCH_LAZY)){
                                echo "<li>
                                 <input id='".$result['id']."check' class='caries' type='checkbox'>
                                 <button>" . $result['title'] . "</button>
                                </li>";
                            }
                                ?>
                        </ul>
                        <h5>Переодонтит</h5>
                        <ul>
                            <? $sql = "SELECT title FROM diagnosis.peredont";
                            $stmt = $pdo->query($sql);
                            while ($row = $stmt->fetch()) {
                                echo "<li>
                                     <input id='check' type='checkbox'>
                                     <button>" . $row['title'] . "</button>
                                     </li>";
                            } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--
            <div id="select_complaint">
                <select>
                    <?
        $sql = "SELECT title FROM diagnosis.caries";
        $stmt = $pdo->query($sql);
        while ($row = $stmt->fetch()) {
            echo "<option>";
            echo $row['title'];
            echo "</option>";
        }
        ?>
                </select>
            </div>
            <div id="select_anamnesis">
                <select>
                    <?
        $sql = "SELECT title FROM diagnosis.caries";
        $stmt = $pdo->query($sql);
        while ($row = $stmt->fetch()) {
            echo "<option>";
            echo $row['title'];
            echo "</option>";
        }
        ?>
                </select>
            </div>
            <div id="select_objectively">
                <select>
                    <?
        $sql = "SELECT title FROM diagnosis.caries";
        $stmt = $pdo->query($sql);
        while ($row = $stmt->fetch()) {
            echo "<option>";
            echo $row['title'];
            echo "</option>";
        }
        ?>
                </select>
            </div>
            <div id="select_treatment">
                <select>
                    <?
        $sql = "SELECT title FROM diagnosis.caries";
        $stmt = $pdo->query($sql);
        while ($row = $stmt->fetch()) {
            echo "<option>";
            echo $row['title'];
            echo "</option>";
        }
        ?>
                </select>
            </div>
            <div id="select_recommend">
                <select>
                    <?
        $sql = "SELECT title FROM diagnosis.caries";
        $stmt = $pdo->query($sql);
        while ($row = $stmt->fetch()) {
            echo "<option>";
            echo $row['title'];
            echo "</option>";
        }
        ?>
                </select>
            </div>
        -->
    </div>
    <div class="row mt-2"></div>
</div>
<script src="../jquery/jquery.js"></script>
<script src="../js/popper.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/patient_card.js"
<script src="../libs/jquery-ui/external/jquery/jquery.js"></script>
<script src="../libs/jquery-ui/jquery-ui.js"></script>
</body>
</html>
