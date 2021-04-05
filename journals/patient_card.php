<?php
require_once '../includes/db.php';
require_once '../php/upload_data.php'
?>
<!--СОХРАНИТЬ ДАННЫЕ В JSON СТРОКУ В PHP И ДОДЕЛАТЬ МАССИВ В JS-->
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
        <div class="col-1"></div>
        <div class="col-2">
            <p class="show_info">Ф.И.О</p>
            <input class="floating_input" id='fullName'>
        </div>
        <div class="col-2">
            <p class="show_info">Дата рождения</p>
            <input class="floating_input" id='birthDate'>
        </div>
        <div class="col-2">
            <p class="show_info">Дом.адрес</p>
            <input class="floating_input" id='homeAddress'>
        </div>
        <div class="col-2">
            <p class="show_info">Возраст</p>
            <input class="floating_input" id='age'>
        </div>
        <div class="col-2">
            <p class="show_info">Место работы</p>
            <input class="floating_input" id='workPlace'>
        </div>
        <div class="col-1"></div>

    </div>
    <div class="row mt-2">
        <div class="col-12">
            <p class="ml-2">Интервал:</p>
            <div class="row brick">
                <div class="col-12 d-flex justify-content-center pt-3 pb-3">
                    <div class="rowOfTeeth">
                        <!--Верхний ряд зубов-->
                        <div class="row">
                            <!--Правый ряд-->
                            <div class="col-6  pr-2 d-flex justify-content-end zub_row_left">
                                <div class="d-flex flex-column justify-content-center">
                                    <div class="dropdown">
                                        <input id='tooth18' value="healthy" type="image" class=" btn-sm dropright"
                                               src="tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                                        <ul class="dropdown-menu" aria-labelledby="tooth18">
                                            <li>
                                                <button onclick='caries("#tooth18")' class="dropdown-item tooth">
                                                    Caries
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='pulpit("#tooth18")' class="dropdown-item tooth">
                                                    Pulpit
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='paradont("#tooth18")' class="dropdown-item tooth">
                                                    Paradont
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <span class="d-flex justify-content-center podzub"><button id='nubmer18'
                                                                                               onclick="getToothToBeTreated('#tooth1',this)">18</button></span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <div class="dropdown">
                                        <input id='tooth17' value="healthy" type="image" class=" btn-sm dropright"
                                               src="tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                                        <ul class="dropdown-menu" aria-labelledby="tooth17">
                                            <li>
                                                <button onclick='caries("#tooth17")' class="dropdown-item tooth">
                                                    Caries
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='pulpit("#tooth17")' class="dropdown-item tooth">
                                                    Pulpit
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='paradont("#tooth17")' class="dropdown-item tooth">
                                                    Paradont
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <span class="d-flex justify-content-center podzub">17</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <div class="dropdown">
                                        <input id='tooth16' value="healthy" type="image" class=" btn-sm dropright"
                                               src="tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                                        <ul class="dropdown-menu" aria-labelledby="tooth16">
                                            <li>
                                                <button onclick='caries("#tooth16")' class="dropdown-item tooth">
                                                    Caries
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='pulpit("#tooth16")' class="dropdown-item tooth">
                                                    Pulpit
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='paradont("#tooth16")' class="dropdown-item tooth">
                                                    Paradont
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <span class="d-flex justify-content-center podzub">16</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <div class="dropdown">
                                        <input id='tooth15' value="healthy" type="image" class=" btn-sm dropright"
                                               src="tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                                        <ul class="dropdown-menu" aria-labelledby="tooth15">
                                            <li>
                                                <button onclick='caries("#tooth15")' class="dropdown-item tooth">
                                                    Caries
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='pulpit("#tooth15")' class="dropdown-item tooth">
                                                    Pulpit
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='paradont("#tooth15")' class="dropdown-item tooth">
                                                    Paradont
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <span class="d-flex justify-content-center podzub">15</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <div class="dropdown">
                                        <input id='tooth14' value="healthy" type="image" class=" btn-sm dropright"
                                               src="tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                                        <ul class="dropdown-menu" aria-labelledby="tooth14">
                                            <li>
                                                <button onclick='caries("#tooth14")' class="dropdown-item tooth">
                                                    Caries
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='pulpit("#tooth14")' class="dropdown-item tooth">
                                                    Pulpit
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='paradont("#tooth14")' class="dropdown-item tooth">
                                                    Paradont
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <span class="d-flex justify-content-center podzub">14</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <div class="dropdown">
                                        <input id='tooth13' value="healthy" type="image" class=" btn-sm dropright"
                                               src="tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                                        <ul class="dropdown-menu" aria-labelledby="tooth13">
                                            <li>
                                                <button onclick='caries("#tooth13")' class="dropdown-item tooth">
                                                    Caries
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='pulpit("#tooth13")' class="dropdown-item tooth">
                                                    Pulpit
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='paradont("#tooth13")' class="dropdown-item tooth">
                                                    Paradont
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <span class="d-flex justify-content-center podzub">13</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <div class="dropdown">
                                        <input id='tooth12' value="healthy" type="image" class=" btn-sm dropright"
                                               src="tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                                        <ul class="dropdown-menu" aria-labelledby="tooth12">
                                            <li>
                                                <button onclick='caries("#tooth12")' class="dropdown-item tooth">
                                                    Caries
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='pulpit("#tooth12")' class="dropdown-item tooth">
                                                    Pulpit
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='paradont("#tooth12")' class="dropdown-item tooth">
                                                    Paradont
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <span class="d-flex justify-content-center podzub">12</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <div class="dropdown">
                                        <input id='tooth11' value="healthy" type="image" class=" btn-sm dropright"
                                               src="tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                                        <ul class="dropdown-menu" aria-labelledby="tooth11">
                                            <li>
                                                <button onclick='caries("#tooth11")' class="dropdown-item tooth">
                                                    Caries
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='pulpit("#tooth11")' class="dropdown-item tooth">
                                                    Pulpit
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='paradont("#tooth11")' class="dropdown-item tooth">
                                                    Paradont
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <span class="d-flex justify-content-center podzub">11</span>
                                </div>
                            </div>
                            <!--Левый ряд-->
                            <div class="col-6  pl-2 d-flex justify-content-end zub_row_right">
                                <div class="d-flex flex-column justify-content-center">
                                    <div class="dropdown">
                                        <input id='tooth21' value="healthy" type="image" class=" btn-sm dropright"
                                               src="tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                                        <ul class="dropdown-menu" aria-labelledby="tooth21">
                                            <li>
                                                <button onclick='caries("#tooth21")' class="dropdown-item tooth">
                                                    Caries
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='pulpit("#tooth21")' class="dropdown-item tooth">
                                                    Pulpit
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='paradont("#tooth21")' class="dropdown-item tooth">
                                                    Paradont
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <span class="d-flex justify-content-center podzub">21</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <div class="dropdown">
                                        <input id='tooth22' value="healthy" type="image" class=" btn-sm dropright"
                                               src="tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                                        <ul class="dropdown-menu" aria-labelledby="tooth22">
                                            <li>
                                                <button onclick='caries("#tooth22")' class="dropdown-item tooth">
                                                    Caries
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='pulpit("#tooth22")' class="dropdown-item tooth">
                                                    Pulpit
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='paradont("#tooth22")' class="dropdown-item tooth">
                                                    Paradont
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <span class="d-flex justify-content-center podzub">22</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <div class="dropdown">
                                        <input id='tooth23' value="healthy" type="image" class=" btn-sm dropright"
                                               src="tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                                        <ul class="dropdown-menu" aria-labelledby="tooth23">
                                            <li>
                                                <button onclick='caries("#tooth23")' class="dropdown-item tooth">
                                                    Caries
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='pulpit("#tooth23")' class="dropdown-item tooth">
                                                    Pulpit
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='paradont("#tooth23")' class="dropdown-item tooth">
                                                    Paradont
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <span class="d-flex justify-content-center podzub">23</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <div class="dropdown">
                                        <input id='tooth24' value="healthy" type="image" class=" btn-sm dropright"
                                               src="tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                                        <ul class="dropdown-menu" aria-labelledby="tooth24">
                                            <li>
                                                <button onclick='caries("#tooth24")' class="dropdown-item tooth">
                                                    Caries
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='pulpit("#tooth24")' class="dropdown-item tooth">
                                                    Pulpit
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='paradont("#tooth24")' class="dropdown-item tooth">
                                                    Paradont
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <span class="d-flex justify-content-center podzub">24</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <div class="dropdown">
                                        <input id='tooth25' value="healthy" type="image" class=" btn-sm dropright"
                                               src="tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                                        <ul class="dropdown-menu" aria-labelledby="tooth25">
                                            <li>
                                                <button onclick='caries("#tooth25")' class="dropdown-item tooth">
                                                    Caries
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='pulpit("#tooth25")' class="dropdown-item tooth">
                                                    Pulpit
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='paradont("#tooth25")' class="dropdown-item tooth">
                                                    Paradont
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <span class="d-flex justify-content-center podzub">25</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <div class="dropdown">
                                        <input id='tooth26' value="healthy" type="image" class=" btn-sm dropright"
                                               src="tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                                        <ul class="dropdown-menu" aria-labelledby="tooth26">
                                            <li>
                                                <button onclick='caries("#tooth26")' class="dropdown-item tooth">
                                                    Caries
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='pulpit("#tooth26")' class="dropdown-item tooth">
                                                    Pulpit
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='paradont("#tooth26")' class="dropdown-item tooth">
                                                    Paradont
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <span class="d-flex justify-content-center podzub">26</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <div class="dropdown">
                                        <input id='tooth27' value="healthy" type="image" class=" btn-sm dropright"
                                               src="tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                                        <ul class="dropdown-menu" aria-labelledby="tooth27">
                                            <li>
                                                <button onclick='caries("#tooth27")' class="dropdown-item tooth">
                                                    Caries
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='pulpit("#tooth27")' class="dropdown-item tooth">
                                                    Pulpit
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='paradont("#tooth27")' class="dropdown-item tooth">
                                                    Paradont
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <span class="d-flex justify-content-center podzub">27</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <div class="dropdown">
                                        <input id='tooth28' value="healthy" type="image" class=" btn-sm dropright"
                                               src="tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                                        <ul class="dropdown-menu" aria-labelledby="tooth28">
                                            <li>
                                                <button onclick='caries("#tooth28")' class="dropdown-item tooth">
                                                    Caries
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='pulpit("#tooth28")' class="dropdown-item tooth">
                                                    Pulpit
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='paradont("#tooth28")' class="dropdown-item tooth">
                                                    Paradont
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <span class="d-flex justify-content-center podzub">28</span>
                                </div>
                            </div>
                        </div>
                        <!--Делиметер-->
                        <div class="row" style="height: 8px;"></div>
                        <div class="row d-flex align-items-center">
                            <div class="col" style="height: 1px; background-color: #BDBDBD"></div>
                            <div class="col-1 p-0 d-flex align-items-center justify-content-center">
                                <button onclick="changeRowOfTeethOnSmall()">
                                    <img src="zub.svg" style="width: 30px; height: 30px;">
                                </button>
                            </div>
                            <div class="col" style="height: 1px; background-color: #BDBDBD"></div>
                        </div>
                        <div class="row" style="height: 8px;"></div>
                        <!--Нижний ряд зубов-->
                        <div class="row">
                            <!--Правый ряд-->
                            <div class="col-6  pr-2 d-flex justify-content-end zub_row_left">
                                <div class="d-flex flex-column justify-content-center">
                                    <div class="dropdown">
                                        <input id='tooth48' value="healthy" type="image" class=" btn-sm dropright"
                                               src="tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                                        <ul class="dropdown-menu" aria-labelledby="tooth48">
                                            <li>
                                                <button onclick='caries("#tooth48")' class="dropdown-item tooth">
                                                    Caries
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='pulpit("#tooth48")' class="dropdown-item tooth">
                                                    Pulpit
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='paradont("#tooth48")' class="dropdown-item tooth">
                                                    Paradont
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <span class="d-flex justify-content-center podzub">48</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <div class="dropdown">
                                        <input id='tooth47' value="healthy" type="image" class=" btn-sm dropright"
                                               src="tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                                        <ul class="dropdown-menu" aria-labelledby="tooth47">
                                            <li>
                                                <button onclick='caries("#tooth47")' class="dropdown-item tooth">
                                                    Caries
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='pulpit("#tooth47")' class="dropdown-item tooth">
                                                    Pulpit
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='paradont("#tooth47")' class="dropdown-item tooth">
                                                    Paradont
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <span class="d-flex justify-content-center podzub">47</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <div class="dropdown">
                                        <input id='tooth46' value="healthy" type="image" class=" btn-sm dropright"
                                               src="tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                                        <ul class="dropdown-menu" aria-labelledby="tooth46">
                                            <li>
                                                <button onclick='caries("#tooth46")' class="dropdown-item tooth">
                                                    Caries
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='pulpit("#tooth46")' class="dropdown-item tooth">
                                                    Pulpit
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='paradont("#tooth46")' class="dropdown-item tooth">
                                                    Paradont
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <span class="d-flex justify-content-center podzub">46</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <div class="dropdown">
                                        <input id='tooth45' value="healthy" type="image" class=" btn-sm dropright"
                                               src="tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                                        <ul class="dropdown-menu" aria-labelledby="tooth45">
                                            <li>
                                                <button onclick='caries("#tooth45")' class="dropdown-item tooth">
                                                    Caries
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='pulpit("#tooth45")' class="dropdown-item tooth">
                                                    Pulpit
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='paradont("#tooth45")' class="dropdown-item tooth">
                                                    Paradont
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <span class="d-flex justify-content-center podzub">45</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <div class="dropdown">
                                        <input id='tooth44' value="healthy" type="image" class=" btn-sm dropright"
                                               src="tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                                        <ul class="dropdown-menu" aria-labelledby="tooth44">
                                            <li>
                                                <button onclick='caries("#tooth44")' class="dropdown-item tooth">
                                                    Caries
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='pulpit("#tooth44")' class="dropdown-item tooth">
                                                    Pulpit
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='paradont("#tooth44")' class="dropdown-item tooth">
                                                    Paradont
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <span class="d-flex justify-content-center podzub">44</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <div class="dropdown">
                                        <input id='tooth43' value="healthy" type="image" class=" btn-sm dropright"
                                               src="tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                                        <ul class="dropdown-menu" aria-labelledby="tooth43">
                                            <li>
                                                <button onclick='caries("#tooth43")' class="dropdown-item tooth">
                                                    Caries
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='pulpit("#tooth43")' class="dropdown-item tooth">
                                                    Pulpit
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='paradont("#tooth43")' class="dropdown-item tooth">
                                                    Paradont
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <span class="d-flex justify-content-center podzub">43</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <div class="dropdown">
                                        <input id='tooth42' value="healthy" type="image" class=" btn-sm dropright"
                                               src="tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                                        <ul class="dropdown-menu" aria-labelledby="tooth42">
                                            <li>
                                                <button onclick='caries("#tooth42")' class="dropdown-item tooth">
                                                    Caries
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='pulpit("#tooth42")' class="dropdown-item tooth">
                                                    Pulpit
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='paradont("#tooth42")' class="dropdown-item tooth">
                                                    Paradont
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <span class="d-flex justify-content-center podzub">42</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <div class="dropdown">
                                        <input id='tooth41' value="healthy" type="image" class=" btn-sm dropright"
                                               src="tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                                        <ul class="dropdown-menu" aria-labelledby="tooth41">
                                            <li>
                                                <button onclick='caries("#tooth41")' class="dropdown-item tooth">
                                                    Caries
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='pulpit("#tooth41")' class="dropdown-item tooth">
                                                    Pulpit
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='paradont("#tooth41")' class="dropdown-item tooth">
                                                    Paradont
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <span class="d-flex justify-content-center podzub">41</span>
                                </div>
                            </div>
                            <!--Левый ряд-->
                            <div class="col-6  pl-2 d-flex justify-content-end zub_row_right">
                                <div class="d-flex flex-column justify-content-center">
                                    <div class="dropdown">
                                        <input id='tooth31' value="healthy" type="image" class=" btn-sm dropright"
                                               src="tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                                        <ul class="dropdown-menu" aria-labelledby="tooth31">
                                            <li>
                                                <button onclick='caries("#tooth31")' class="dropdown-item tooth">
                                                    Caries
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='pulpit("#tooth31")' class="dropdown-item tooth">
                                                    Pulpit
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='paradont("#tooth31")' class="dropdown-item tooth">
                                                    Paradont
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <span class="d-flex justify-content-center podzub">31</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <div class="dropdown">
                                        <input id='tooth32' value="healthy" type="image" class=" btn-sm dropright"
                                               src="tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                                        <ul class="dropdown-menu" aria-labelledby="tooth32">
                                            <li>
                                                <button onclick='caries("#tooth32")' class="dropdown-item tooth">
                                                    Caries
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='pulpit("#tooth32")' class="dropdown-item tooth">
                                                    Pulpit
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='paradont("#tooth32")' class="dropdown-item tooth">
                                                    Paradont
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <span class="d-flex justify-content-center podzub">32</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <div class="dropdown">
                                        <input id='tooth33' value="healthy" type="image" class=" btn-sm dropright"
                                               src="tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                                        <ul class="dropdown-menu" aria-labelledby="tooth33">
                                            <li>
                                                <button onclick='caries("#tooth33")' class="dropdown-item tooth">
                                                    Caries
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='pulpit("#tooth33")' class="dropdown-item tooth">
                                                    Pulpit
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='paradont("#tooth33")' class="dropdown-item tooth">
                                                    Paradont
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <span class="d-flex justify-content-center podzub">33</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <div class="dropdown">
                                        <input id='tooth34' value="healthy" type="image" class=" btn-sm dropright"
                                               src="tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                                        <ul class="dropdown-menu" aria-labelledby="tooth34">
                                            <li>
                                                <button onclick='caries("#tooth34")' class="dropdown-item tooth">
                                                    Caries
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='pulpit("#tooth34")' class="dropdown-item tooth">
                                                    Pulpit
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='paradont("#tooth34")' class="dropdown-item tooth">
                                                    Paradont
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <span class="d-flex justify-content-center podzub">34</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <div class="dropdown">
                                        <input id='tooth35' value="healthy" type="image" class=" btn-sm dropright"
                                               src="tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                                        <ul class="dropdown-menu" aria-labelledby="tooth35">
                                            <li>
                                                <button onclick='caries("#tooth35")' class="dropdown-item tooth">
                                                    Caries
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='pulpit("#tooth35")' class="dropdown-item tooth">
                                                    Pulpit
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='paradont("#tooth35")' class="dropdown-item tooth">
                                                    Paradont
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <span class="d-flex justify-content-center podzub">35</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <div class="dropdown">
                                        <input id='tooth36' value="healthy" type="image" class=" btn-sm dropright"
                                               src="tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                                        <ul class="dropdown-menu" aria-labelledby="tooth36">
                                            <li>
                                                <button onclick='caries("#tooth36")' class="dropdown-item tooth">
                                                    Caries
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='pulpit("#tooth36")' class="dropdown-item tooth">
                                                    Pulpit
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='paradont("#tooth36")' class="dropdown-item tooth">
                                                    Paradont
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <span class="d-flex justify-content-center podzub">36</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <div class="dropdown">
                                        <input id='tooth37' value="healthy" type="image" class=" btn-sm dropright"
                                               src="tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                                        <ul class="dropdown-menu" aria-labelledby="tooth37">
                                            <li>
                                                <button onclick='caries("#tooth37")' class="dropdown-item tooth">
                                                    Caries
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='pulpit("#tooth37")' class="dropdown-item tooth">
                                                    Pulpit
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='paradont("#tooth37")' class="dropdown-item tooth">
                                                    Paradont
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <span class="d-flex justify-content-center podzub">37</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <div class="dropdown">
                                        <input id='tooth38' value="healthy" type="image" class=" btn-sm dropright"
                                               src="tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                                        <ul class="dropdown-menu" aria-labelledby="tooth38">
                                            <li>
                                                <button onclick='caries("#tooth38")' class="dropdown-item tooth">
                                                    Caries
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='pulpit("#tooth38")' class="dropdown-item tooth">
                                                    Pulpit
                                                </button>
                                            </li>
                                            <li>
                                                <button onclick='paradont("#tooth38")' class="dropdown-item tooth">
                                                    Paradont
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <span class="d-flex justify-content-center podzub">38</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-6 pt-2">
            <p class="m-0 show_info">Диагноз</p>
            <textarea class="floating_input" onclick="showDiagnosis()" id="diagnosis" cols="70" rows="1"
                      style="resize: none"></textarea>
            <p class="show_info">Жалобы</p>
            <textarea class="floating_input" onclick="showComplains()" id="complaint" cols="80" rows="3"></textarea>
            <p class="show_info">Анамнезис</p>
            <textarea class="floating_input" onclick="showAnamnesis()" id="anamnesis" cols="80" rows="3"></textarea>
            <p class="show_info">Объективно</p>
            <textarea class="floating_input" onclick="showObjectively()" id="objectively" cols="80" rows="3"></textarea>
            <p class="show_info">Лечение</p>
            <textarea class="floating_input" onclick="showTreatment()" id="treatment" cols="80" rows="3"></textarea>
            <p class="show_info">Рекомендации</p>
            <textarea class="floating_input" onclick="showRecommend()" id="recommend" cols="80" rows="3"></textarea>
        </div>
        <div class="col-6 pt-2">
            <div id="categories">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-10">
                        <div class="categoriesDiagnosis" hidden="hidden">
                            <h4>Диагнозы</h4>
                            <ul>
                                <li class="show_info">
                                    <button onclick="showCariesDiagnosis()">Кариес</button>
                                </li>
                                <li class="show_info">
                                    <button onclick="showParadontDiagnosis()">Парадонтит</button>
                                </li>
                                <li class="show_info">
                                    <button onclick="showPulpitDiagnosis()">Пулпит</button>
                                </li>
                            </ul>
                            <div class="diagnosis_list">
                                <div class="caries_diagnosis" hidden="hidden">
                                    <h5 class="show_info">Кариес</h5>
                                    <ul>
                                        <?showCariesDiagnosis()?>
                                    </ul>
                                </div>
                                <div class="peredont_diagnosis" hidden="hidden">
                                    <h5>Переодонтит</h5>
                                    <ul>
                                        <?showParadontDiagnosis() ?>
                                    </ul>
                                </div>
                                <div class="pulpit_diagnosis" hidden="hidden">
                                    <h5>Пулпит</h5>
                                    <ul>
                                        <?showPulpitDiagnosis() ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="categoriesComplaint" hidden="hidden">
                            <h4>Жалобы</h4>
                            <ul>
                                <li>
                                    <button onclick="showCariesComplaint()">Кариес</button>
                                </li>
                                <li>
                                    <button onclick="showPeradontComplaint()">Парадонтит</button>
                                </li>
                                <li>
                                    <button onclick="showPulpitComplaint()">Пулпит</button>
                                </li>
                            </ul>
                            <div class="complaint_list">
                                <div class="caries_complaints" hidden="hidden">
                                    <h5>Кариес</h5>
                                    <ul id="caries_complaint">
                                        <? showCariesComplaint() ?>
                                    </ul>
                                </div>
                                <div class="peredont_complaints" hidden="hidden">
                                    <h5>Передонт</h5>
                                    <ul id="peredont_complaint">
                                        <? showParadontComplaint() ?>
                                    </ul>
                                </div>
                                <div class="pulpit_complaints" hidden="hidden">
                                    <h5>Пулпит</h5>
                                    <ul id="pulpit_complaint">
                                        <? showPulpitComplaint() ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="categoriesAnamnesis" hidden="hidden">
                            <h4>Анамнезис</h4>
                            <ul>
                                <li>
                                    <button onclick="showCommonAnamnesis()">Общее</button>
                                </li>
                            </ul>
                            <div class="anamnesis_list" hidden="hidden">
                                <ul><? showCommonAnamnesis() ?></ul>
                            </div>
                        </div>
                        <div class="categoriesObjectively" hidden="hidden">
                            <h4>Объективно</h4>
                            <ul>
                                <li>
                                    <button onclick="showCariesObjectively()">Кариес</button>
                                </li>
                                <li>
                                    <button onclick="showParadontObjectively()">Парадонтит</button>
                                </li>
                                <li>
                                    <button onclick="showPulpitObjectively()">Пулпит</button>
                                </li>
                            </ul>
                            <div class="objectively_list">
                                <div class="caries_objectively" hidden="hidden">
                                    <h5>Кариес</h5>
                                    <ul id="caries_list">
                                        <li>
                                            <button onclick="showEasyCariesObjectively()">Кариес в стадии пятна</button>
                                        </li>
                                        <li>
                                            <button onclick="showNormalCariesObjectively()">Поверхностный кариес
                                            </button>
                                        </li>
                                        <li>
                                            <button onclick="showBadCariesObjectively()">Средний кариес</button>
                                        </li>
                                        <li>
                                            <button onclick="showHardCariesObjectively()">Глубокий кариес</button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="easy_caries_objectively" hidden="hidden">
                                    <ul><? showEasyCariesObjectively() ?></ul>
                                </div>
                                <div class="normal_caries_objectively" hidden="hidden">
                                    <ul><? showNormalCariesObjectively() ?></ul>
                                </div>
                                <div class="bad_caries_objectively" hidden="hidden">
                                    <ul><? showBadCariesObjectively() ?></ul>
                                </div>
                                <div class="hard_caries_objectively" hidden="hidden">
                                    <ul><? showHardCariesObjectively() ?></ul>
                                </div>

                            </div>
                        </div>
                        <div class="categoriesTreatment" hidden="hidden">
                            <h4>Лечение</h4>
                            <ul>
                                <li>
                                    <button onclick="showCariesTreatment()">Кариес</button>
                                </li>
                                <li>
                                    <button onclick="showParadontTreatment()">Парадонтит</button>
                                </li>
                                <li>
                                    <button onclick="showPulpitTreatment()">Пулпит</button>
                                </li>
                            </ul>
                            <div class="treatment_list">
                                <div class="caries_treatment" hidden="hidden">
                                    <h5>Кариес</h5>
                                    <ul id="caries_list">
                                        <li>
                                            <button onclick="showEasyCariesTreatment()">Кариес в стадии пятна</button>
                                        </li>
                                        <li>
                                            <button onclick="showNormalCariesTreatment()">Поверхностный кариес</button>
                                        </li>
                                        <li>
                                            <button onclick="showBadCariesTreatment()">Средний кариес</button>
                                        </li>
                                        <li>
                                            <button onclick="showHardCariesTreatment()">Глубокий кариес</button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="easy_caries_treatment" hidden="hidden">
                                    <ul><? showEasyCariesTreatment() ?></ul>
                                </div>
                                <div class="normal_caries_treatment" hidden="hidden">
                                    <ul><? showNormalCariesTreatment() ?></ul>
                                </div>
                                <div class="bad_caries_treatment" hidden="hidden">
                                    <ul><? showBadCariesTreatment() ?></ul>
                                </div>
                                <div class="hard_caries_treatment" hidden="hidden">
                                    <ul><? showHardCariesTreatment() ?></ul>
                                </div>
                            </div>
                        </div>
                        <div class="categoriesRecommend" hidden="hidden">
                            <h4>Рекомендации</h4>
                            <ul>
                                <li>
                                    <button onclick="showCommonRecommend()">Рекомендации</button>
                                </li>
                            </ul>
                            <div class="recommend_list" hidden="hidden">
                                <ul><? showCommonRecommend() ?></ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-8"></div>
        <div class="col-4">
            <button class="btn btn-secondary pl-2 pr-2" onclick="printData()">Распечатать</button>
            <button class="btn btn-warning pl-2 pr-2" onclick="insertData()" type="submit">Сохранить</button>
        </div>
    </div>
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script src="../libs/jquery-ui/external/jquery/jquery.js"></script>
<script src="../js/patient_card.js"></script>
<script src="../libs/jquery-ui/jquery-ui.js"></script>
</body>
</html>
