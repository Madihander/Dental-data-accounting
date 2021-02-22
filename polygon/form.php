<?php

//$number = $_POST['number'];
//echo $number;

$number=$_POST['number'];
$word=$_POST['word'];
$video=$_POST['video'];
$book=$_POST['book'];
echo $book,$number,$video,$word;

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>ЛИЧНАЯ КАРТА ПАЦИЕНТА</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/patient_card.css">
</head>
<body>
<form action="form.php" method="POST">
    <p>Введите число</p>
    <textarea style="resize: none" rows="1" cols="2" name="number"></textarea>
    <button type="submit">Отправь</button>
</form>
<form action="form.php" method="post">
    <p>Напишите свои любимые</p>
    <p>число</p>
    <textarea style="resize: none" rows="1" cols="2" name="number"></textarea>
    <p>слово</p>
    <textarea style="resize: none" rows="1" cols="2" name="word"></textarea>
    <p>видео</p>
    <textarea style="resize: none" rows="1" cols="2" name="video"></textarea>
    <p>книгу</p>
    <textarea style="resize: none" rows="1" cols="2" name="book"></textarea>

    <button type="submit">Отправить</button>
</form>
</body>