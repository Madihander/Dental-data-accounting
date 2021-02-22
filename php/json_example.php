<?php

$table = [
    'osmPol' => ['bad', 'bad', 'good', 'god'],
    'string2' => ['K', 'PK', 'KK', 'PP']
];

$jsonTable = json_encode($table);

echo $jsonTable; // ты json сохраняешь в базу данных

// В ДРУГОМ СКРИПТЕ УЖЕ ТИПА МЫ

$jsonTableFromDB = $jsonTable;

echo '<br>';
//echo $jsonTableFromDB;
$table = json_decode($jsonTableFromDB, true);

var_dump($table['osmPol']);

// DISPLAY

//echo  $table['osmPol'][0];
//echo  $table['string2'][1] . ' - '. $table['string2'][3] . '<br>';