<?php
?>
<!--TODO ЖУРНАЛ ПРЕДВАРИТЕЛЬНОЙ ЗАПИСИ НА ПРИЕМ К СТОМАТОЛОГУ-->
<!--TODO ЗАДАЧА-СДЕЛАТЬ ЧТОБЫ НОВОЕ ПОЛЕ ДЛЯ ВВОДА ПОЯВЛЯЛОСЬ С ПОМОЩЬЮ + СЛЕВА И НОМЕР САМ УВЕЛИЧЕВАЛСЯ НА 1 КАЖДЫЙ РАЗ-->
<!--TODO ИСПОЛЬЗОВАТЬ ПОДГОТОВЛЕННЫ ПУНКТЫ-->
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>ЖУРНАЛ ПРЕДВАРИТЕЛЬНОЙ ЗАПИСИ</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/index.css">
</head>
<body style="background:grey">
<div class="container">
    <div class="row">

        <div class="col-3 column">
            <h1>Номер</h1>
        </div>

        <div class="col-3 column">
            <h1>Время</h1>
        </div>

        <div class="col-3 column">
            <h1>Ф.И.О</h1>
        </div>

        <div class="col-3 column">
            <h1>День Недели</h1>
        </div>

    </div>
    <div class="row">
        <div class="col-3 column">
            <form action="" name="number" method="post"></form>
        </div>
        <div class="col-3 column">
            <form action="" name="time" method="post"></form>
        </div>
        <div class="col-3 column">
            <form action="" name="name" method="post"></form>
        </div>
        <div class="col-3 column">
            <form action="" name="day" method="post"></form>
        </div>
    </div>

</div>
</body>
