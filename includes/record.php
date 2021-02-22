<?php require_once "db.php"?>
<div class="row">
        <div class="col-3 column">
            <h1 id="number" class="h1_column"><?echo ?></h1>
        </div>
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
            <h1>Дата Рождения</h1>
        </div>
        <div class="col-9 column pt-2 pb-2">
            <p>Date: <input type="text" id="datepicker" autocomplete="off"></p>
        </div>
    </div>

    <div class="row">
        <div class="col-3 column">
            <h1>Диагноз</h1>
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