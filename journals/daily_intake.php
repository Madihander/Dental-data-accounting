<?php
//require_once "../includes/db.php";
?>
<!--TODO ЖУРНАЛ ЕЖЕДНЕВНОГО ПРИЕМА-->
<!--TODO ЗАДАЧА-СДЕЛАТЬ ЧТОБЫ НОВОЕ ПОЛЕ ДЛЯ ВВОДА ПОЯВЛЯЛОСЬ С ПОМОЩЬЮ + СЛЕВА И НОМЕР САМ УВЕЛИЧЕВАЛСЯ НА 1 КАЖДЫЙ РАЗ-->
<!--TODO ИСПОЛЬЗОВАТЬ ПОДГОТОВЛЕННЫ ПУНКТЫ-->
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>ЖУРНАЛ ПРЕДВАРИТЕЛЬНОЙ ЗАПИСИ</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link href="../css/daily_intake.css" rel="stylesheet">

    <script src="../libs/jquery-ui/external/jquery/jquery.js"></script>
    <!-- JQuery UI -->
    <link rel="stylesheet" href="../libs/jquery-ui/jquery-ui.css">
    <link rel="stylesheet" href="../libs/jquery-ui/jquery-ui.theme.css">
    <script src="../libs/jquery-ui/jquery-ui.js"></script>
    <script src="../js/daily_intake.js"
    <script>
        // let yearRange = '1900:' + // TODO сформировать строку формата min:max
        // TODO max-высчитать нынешний год типа сегодня а когда будет 2020 то тут появится еще 1 строчка 2020

        let yearRange = '2000:2019'; // TODO удалить после как сделаешь вверху
        $(function () {
            $("#datepicker").datepicker({
                changeMonth: true,
                changeYear: true,
                yearRange: yearRange,
                dateFormat: 'd.m.yy',
                monthNames: ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь",
                    "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"],
                monthNamesShort: ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь",
                    "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"],
                dayNamesMin: ["Пн", "Вт", "Ср", "Чт", "Пт", "Сб", "Вс"]
            });
        });
    </script>
</head>
<body>
<div class="container ml-5">

    <div class="row text-center pt-2 pb-2">
        <div class="col-2"></div>
        <div class="col-8">
            <header class="border_header pl-3">
                <h4>ЖУРНАЛ ЕЖЕДНЕВНОГО ПРИЁМА</h4>
            </header>
        </div>
        <div class="col-2"></div>
    </div>
    <!--TODO в чем проблема? удали потом это ) Проблема в том что я незнаю как передать значение h1-№1 -->
    <div class="row">
        <div class="col-3 column">
            <h1 class="h1_column">Ф.И.О</h1>
        </div>
        <div class="col-9 column pt-2 pb-2">
            <textarea rows="1" cols="50" id="surname" class="textarea_daily resizable-disable"></textarea>
        </div>
    </div>

    <div class="row">
        <div class="col-3 column">
            <h1 style="border-bottom: 2px solid black">Дата Рождения</h1>
        </div>
        <div class="col-9 column pt-2 pb-2">
            <p>Date: <input type="text" id="datepicker" autocomplete="off"></p>
        </div>
    </div>

    <div class="row">
        <div class="col-3 column">
            <h1 style="border-bottom: 2px solid black">Диагноз</h1>
        </div>
        <div class="col-9 column pt-2 pb-2">
            <textarea rows="4" cols="90" id="diagnosis" class="textarea_daily resizable-disable"></textarea>
        </div>
    </div>

    <div class="row">
        <div class="col-3 column">
            <h1>Объем выполненой работы</h1>
        </div>
        <div class="col-9 column pt-2 pb-2">
            <textarea rows="5" cols="100" id="job" class="textarea_daily resizable-disable"></textarea>
        </div>
    </div>

    <div class="row">
        <div class="col-3 column">
            <h1>Прочее</h1>
        </div>
        <div class="col-9 column pt-2 pb-2">
            <textarea rows="2" cols="2" class="textarea_daily resizable-disable"></textarea>
        </div>
    </div>

    <a id="submit" class="btn btn-success mt-2 ml-5">Записать</a><br>

</div>
