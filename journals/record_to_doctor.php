<?php
?>
<!--Если что не понятно про модальные окна, перейди по ссылке,я просто там код списал.
<!--Бери там потому что на других и доки не рабочие варианты,я незнаю как так получилось.Короче там бери, и читай
<!--https://itchief.ru/bootstrap/modal-->
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>ЛИЧНАЯ КАРТА ПАЦИЕНТА</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/record_to_doctor.css">
    <link rel="stylesheet" href="../css/jquery-ui.css">
</head>
<body>


<div class="container-fluid pt-5">

    <div class="col-12 pt-3 pb-3"></div>
    <div class="row">
        <div class="col-4 pr-3">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">
                    <div id="datepicker"></div>
                    <input type="hidden" id="datepicker_value" value="01.08.2019">
                </div>
                <div class="col-1"></div>
            </div>
            <div class="row mt-2 pr-3 pl-3">
                <div class="col-1"></div>
                <div class="col-10 day_indic">
                    <p><big id="day_id"></big>
                        <small id="month_id">.</small>
                    </p>
                    <p id="day_of_week"></p>
                </div>
                <div class="col-1"></div>
            </div>
        </div>
        <div class="col-7 pl-3 mr-3">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">1</th>
                    <th scope="col">ДАТА</th>
                    <th scope="col">1</th>
                </tr>
                <tr>
                    <th>ВРЕМЯ</th>
                    <th>КРЕСЛО 1</th>
                    <th>КРЕСЛО 2</th>
                </tr>
                </thead>
                <tr class="">
                    <th scope="row">ВРАЧИ</th>
                    <td>
                        НУРЖАН СУЛТАНОВИЧ
                    </td>
                    <td>
                        СЕРИК АБДРАХМАНОВИЧ
                    </td>
                </tr>

                <tbody>
                <tr class="">
                    <th scope="row">09:00</th>
                    <td class=" p-0">
                        <p class="td_img"><a href="#recordingCard" data-toggle="modal">
                                <img src="../icons8-плюс.svg" alt="myImage">
                                <!--  <svg id="img_add_path" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                       width="48" height="48"
                                       viewBox="0 0 48 48"
                                       style=" fill:#000000;">
                                      <path fill="#4caf50"
                                            d="M44,24c0,11.045-8.955,20-20,20S4,35.045,4,24S12.955,4,24,4S44,12.955,44,24z"></path>
                                      <path fill="#fff" d="M21,14h6v20h-6V14z"></path>
                                      <path fill="#fff" d="M14,21h20v6H14V21z"></path>
                                  </svg>-->
                            </a>
                        </p>
                    </td>
                    <td>
                        <p><a href="#patientCard" class="btn btn-primary" data-toogle="modal">Записать пациента</a></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">09:30</th>
                    <td>
                        <button id=""></button>
                    </td>
                    <td>
                        <button id=""></button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">10:00</th>
                    <td>
                        <button id=""></button>
                    </td>
                    <td>
                        <button id=""></button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">10:30</th>
                    <td>
                        <button id=""></button>
                    </td>
                    <td>
                        <button id=""></button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">11:00</th>
                    <td>
                        <button id=""></button>
                    </td>
                    <td>
                        <button id=""></button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">11:30</th>
                    <td>
                        <button id=""></button>
                    </td>
                    <td>
                        <button id=""></button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">12:00</th>
                    <td>
                        <button id=""></button>
                    </td>
                    <td>
                        <button id=""></button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">12:30</th>
                    <td>
                        <button id=""></button>
                    </td>
                    <td>
                        <button id=""></button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">13:00</th>
                    <td>
                        <button id=""></button>
                    </td>
                    <td>
                        <button id=""></button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">13:30</th>
                    <td>
                        <button id=""></button>
                    </td>
                    <td>
                        <button id=""></button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">14:00</th>
                    <td>
                        <button id=""></button>
                    </td>
                    <td>
                        <button id=""></button>
                    </td>
                </tr>

                <tr>
                    <th scope="row">14:30</th>
                    <td>
                        <button id=""></button>
                    </td>
                    <td>
                        <button id=""></button>
                    </td>
                </tr>

                <tr>
                    <th scope="row">15:00</th>
                    <td>
                        <button id=""></button>
                    </td>
                    <td>
                        <button id=""></button>
                    </td>
                </tr>

                <tr>
                    <th scope="row">15:30</th>
                    <td>
                        <button id=""></button>
                    </td>
                    <td>
                        <button id=""></button>
                    </td>
                </tr>

                <tr>
                    <th scope="row">16:00</th>
                    <td>
                        <button id=""></button>
                    </td>
                    <td>
                        <button id=""></button>
                    </td>
                </tr>

                <tr>
                    <th scope="row">16:30</th>
                    <td>
                        <button id=""></button>
                    </td>
                    <td>
                        <button id=""></button>
                    </td>
                </tr>

                <tr>
                    <th scope="row">17:00</th>
                    <td>
                        <button id=""></button>
                    </td>
                    <td>
                        <button id=""></button>
                    </td>
                </tr>

                <tr>
                    <th scope="row">17:30</th>
                    <td>
                        <button id=""></button>
                    </td>
                    <td>
                        <button id=""></button>
                    </td>
                </tr>

                <tr>
                    <th scope="row">18:00</th>
                    <td>
                        <button id=""></button>
                    </td>
                    <td>
                        <button id=""></button>
                    </td>
                </tr>

                <tr>
                    <th scope="row">18:30</th>
                    <td>
                        <button id=""></button>
                    </td>
                    <td>
                        <button id=""></button>
                    </td>
                </tr>

                <tr>
                    <th scope="row">19:00</th>
                    <td>
                        <button id=""></button>
                    </td>
                    <td>
                        <button id=""></button>
                    </td>
                </tr>


                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="recordingCard" class="modal fade">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header pt-0 pb-0">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-1">
                            <button><a id="recording" href="#recordingCard" data-toggle="modal">Запись</a></button>
                        </div>
                        <div class="col-1">
                            <button><a id="payment" href="#paymentCard" data-toggle="modal">Оплата</a></button>
                        </div>
                        <div class="col-1">
                            <button><a id="plan" href="#planCard" data-toggle="modal">План</a></button>
                        </div>
                        <div class="col-7"></div>
                        <div class="col-1">
                            <a href="patient_card.php">
                                <img src="#" alt="record">
                            </a>
                        </div>
                        <div class="col-1">
                            <a href="#">
                                <img src="#" alt="123141">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-body mt-3">
                <div class="container-fluid">
                    <div class="row mb-3">
                        <div class="col-md-5">
                            <label>ФИО Пациента</label>
                            <input id="fullName">
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-5 ml-auto">
                            <label>Номера телефона</label>
                            <input type="text" id="phoneNumber">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-5">
                            <label>День приема</label>
                            <div id="reception_day">
                                <input type="text" id="datapicker">
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-5 ml-auto">
                            <label>Лечущий Врач</label>
                            <input id="doctor">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label>Время начала</label>
                            <select id="startTimeHour">
                                <option value="">__</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                            </select>
                            :
                            <select id="startTimeMin">
                                <option value="">__</option>
                                <option value="00">00</option>
                                <option value="05">05</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="25">25</option>
                                <option value="30">30</option>
                                <option value="35">35</option>
                                <option value="40">40</option>
                                <option value="45">45</option>
                                <option value="50">50</option>
                                <option value="55">55</option>
                                <option value="60">60</option>
                            </select>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                            <label>Время окончания</label>
                            <select id="endTimeHour">
                                <option value="">__</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                            </select>
                            :
                            <select id="endTimeMin">
                                <option value="">__</option>
                                <option value="00">00</option>
                                <option value="05">05</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="25">25</option>
                                <option value="30">30</option>
                                <option value="35">35</option>
                                <option value="40">40</option>
                                <option value="45">45</option>
                                <option value="50">50</option>
                                <option value="55">55</option>
                                <option value="60">60</option>
                            </select>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-md-5">
                            <label>Жалоба</label>
                            <input id="lament">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <button type="button" id="submit" class="btn btn-primary">Записать</button>
            </div>
        </div>
    </div>
</div>
<div id="paymentCard" class="modal fade">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header pt-0 pb-0">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-1">
                            <button><a id="recording" href="#recordingCard" data-toggle="modal">Запись</a></button>
                        </div>
                        <div class="col-1">
                            <button><a id="payment" href="#paymentCard" data-toggle="modal">Оплата</a></button>
                        </div>
                        <div class="col-1">
                            <button><a id="plan"=href="#planCard" data-toggle="modal">План</a></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-body mt-3">
                <p>ТекстТекст
                    ТекстТекстТекстТекстТекст
                    ТекстТекстТекстТекстТекст
                    ТекстТекстТекстТекстТекст
                    ТекстТекстТекстТекстТекст</p>
                <!--<div class="container-fluid">
                    <div class="row brick">
                        <div class="col-12 d-flex justify-content-center pt-3 pb-3">
                            <div>
                                <!--Верхний ряд зубов-->
                <!--<div class="row">
                    <!--Правый ряд-->
                <!--
                <div class="col-6 pr-2 d-flex justify-content-end zub_row_left">
                    <div class="d-flex flex-column justify-content-center">
                        <img src="../zub/zub.png" alt="">
                        <span class="d-flex justify-content-center podzub">42</span>
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                        <img src="../zub/zub.png" alt="">
                        <span class="d-flex justify-content-center podzub">42</span>
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                        <img src="../zub/zub.png" alt="">
                        <span class="d-flex justify-content-center podzub">42</span>
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                        <img src="../zub/zub.png" alt="">
                        <span class="d-flex justify-content-center podzub">42</span>
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                        <img src="../zub/zub.png" alt="">
                        <span class="d-flex justify-content-center podzub">42</span>
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                        <img src="../zub/zub.png" alt="">
                        <span class="d-flex justify-content-center podzub">42</span>
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                        <img src="../zub/zub.png" alt="">
                        <span class="d-flex justify-content-center podzub">42</span>
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                        <img src="../zub/zub.png" alt="">
                        <span class="d-flex justify-content-center podzub">42</span>
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                        <img src="../zub/zub.png" alt="">
                        <span class="d-flex justify-content-center podzub">42</span>
                    </div>
                </div>
                <!--Левый ряд-->
                <!--   <div class="col-6 pr-2 d-flex justify-content-end zub_row_left">
                       <div class="d-flex flex-column justify-content-center">
                           <img src="../zub/zub.png" alt="">
                           <span class="d-flex justify-content-center podzub">42</span>
                       </div>
                       <div class="d-flex flex-column justify-content-center">
                           <img src="../zub/zub.png" alt="">
                           <span class="d-flex justify-content-center podzub">42</span>
                       </div>
                       <div class="d-flex flex-column justify-content-center">
                           <img src="../zub/zub.png" alt="">
                           <span class="d-flex justify-content-center podzub">42</span>
                       </div>
                       <div class="d-flex flex-column justify-content-center">
                           <img src="../zub/zub.png" alt="">
                           <span class="d-flex justify-content-center podzub">42</span>
                       </div>
                       <div class="d-flex flex-column justify-content-center">
                           <img src="../zub/zub.png" alt="">
                           <span class="d-flex justify-content-center podzub">42</span>
                       </div>
                       <div class="d-flex flex-column justify-content-center">
                           <img src="../zub/zub.png" alt="">
                           <span class="d-flex justify-content-center podzub">42</span>
                       </div>
                       <div class="d-flex flex-column justify-content-center">
                           <img src="../zub/zub.png" alt="">
                           <span class="d-flex justify-content-center podzub">42</span>
                       </div>
                       <div class="d-flex flex-column justify-content-center">
                           <img src="../zub/zub.png" alt="">
                           <span class="d-flex justify-content-center podzub">42</span>
                       </div>
                   </div>
               </div>
               <!--Делиметер
               <div class="row" style="height: 8px;"></div>
               <div class="row d-flex align-items-center">
                   <div class="col" style="height: 1px; background-color: #BDBDBD"></div>
                   <div class="col-1 p-0 d-flex align-items-center justify-content-center">
                       <img src="../zub/zub.svg" style="width: 30px; height: 30px;">
                   </div>
                   <div class="col" style="height: 1px; background-color: #BDBDBD"></div>
               </div>
               <div class="row" style="height: 8px;"></div>
               <!--Нижний ряд зубов
               <div class="row">
                   <!--Правый ряд
                   <div class="col-6 pr-2 d-flex justify-content-end zub_row_left">
                       <div class="d-flex flex-column justify-content-center">
                           <img src="../zub/zub.png" alt="">
                           <span class="d-flex justify-content-center podzub">42</span>
                       </div>
                       <div class="d-flex flex-column justify-content-center">
                           <img src="../zub/zub.png" alt="">
                           <span class="d-flex justify-content-center podzub">42</span>
                       </div>
                       <div class="d-flex flex-column justify-content-center">
                           <img src="../zub/zub.png" alt="">
                           <span class="d-flex justify-content-center podzub">42</span>
                       </div>
                       <div class="d-flex flex-column justify-content-center">
                           <img src="../zub/zub.png" alt="">
                           <span class="d-flex justify-content-center podzub">42</span>
                       </div>
                       <div class="d-flex flex-column justify-content-center">
                           <img src="../zub/zub.png" alt="">
                           <span class="d-flex justify-content-center podzub">42</span>
                       </div>
                       <div class="d-flex flex-column justify-content-center">
                           <img src="../zub/zub.png" alt="">
                           <span class="d-flex justify-content-center podzub">42</span>
                       </div>
                       <div class="d-flex flex-column justify-content-center">
                           <img src="../zub/zub.png" alt="">
                           <span class="d-flex justify-content-center podzub">42</span>
                       </div>
                       <div class="d-flex flex-column justify-content-center">
                           <img src="../zub/zub.png" alt="">
                           <span class="d-flex justify-content-center podzub">42</span>
                       </div>
                   </div>
                   <!--Левый ряд

                   <div class="col-6 pr-2 d-flex justify-content-end zub_row_left">
                       <div class="d-flex flex-column justify-content-center">
                           <img src="../zub/zub.png" alt="">
                           <span class="d-flex justify-content-center podzub">42</span>
                       </div>
                       <div class="d-flex flex-column justify-content-center">
                           <img src="../zub/zub.png" alt="">
                           <span class="d-flex justify-content-center podzub">42</span>
                       </div>
                       <div class="d-flex flex-column justify-content-center">
                           <img src="../zub/zub.png" alt="">
                           <span class="d-flex justify-content-center podzub">42</span>
                       </div>
                       <div class="d-flex flex-column justify-content-center">
                           <img src="../zub/zub.png" alt="">
                           <span class="d-flex justify-content-center podzub">42</span>
                       </div>
                       <div class="d-flex flex-column justify-content-center">
                           <img src="../zub/zub.png" alt="">
                           <span class="d-flex justify-content-center podzub">42</span>
                       </div>
                       <div class="d-flex flex-column justify-content-center">
                           <img src="../zub/zub.png" alt="">
                           <span class="d-flex justify-content-center podzub">42</span>
                       </div>
                       <div class="d-flex flex-column justify-content-center">
                           <img src="../zub/zub.png" alt="">
                           <span class="d-flex justify-content-center podzub">42</span>
                       </div>
                       <div class="d-flex flex-column justify-content-center">
                           <img src="../zub/zub.png" alt="">
                           <span class="d-flex justify-content-center podzub">42</span>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
<div id="planCard" class="modal fade">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header pt-0 pb-0">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-1">
                            <button><a id="recording" href="#recordingCard" data-toggle="modal">Запись</a></button>
                        </div>
                        <div class="col-1">
                            <button><a id="payment" href="#paymentCard" data-toggle="modal">Оплата</a></button>
                        </div>
                        <div class="col-1">
                            <button><a id="plan"=href="#planCard" data-toggle="modal">План</a></button>
                        </div>
                        <div class="col-7"></div>
                        <div class="col-1">
                            <a href="patient_card.php">
                                <img src="#" alt="record">
                            </a>
                        </div>
                        <div class="col-1">
                            <a href="#">
                                <img src="#" alt="123141">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-body mt-3"><p>ТекстТекст
                    ТекстТекстТекстТекстТекст
                    ТекстТекстТекстТекстТекст
                    ТекстТекстТекстТекстТекст
                    ТекстТекстТекстТекстТекст</p></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
<!-------Js------->
<script src="../jquery/jquery.js"></script>
<script src="../js/bootstrap.js"></script>\
<script src="../js/popper.js"></script>
<script src=../js/record_to_doctor.js></script>
<!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
<script src="../jquery/jquery-ui.js"></script>
<script src="../jquery/jquery.maskedinput.js"></script>
<script>
    /* Локализация datepicker */
    $.datepicker.regional['ru'] = {
        closeText: 'Закрыть',
        prevText: 'Предыдущий',
        nextText: 'Следующий',
        currentText: 'Сегодня',
        monthNames: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
        monthNamesShort: ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн', 'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек'],
        dayNames: ['воскресенье', 'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота'],
        dayNamesShort: ['вск', 'пнд', 'втр', 'срд', 'чтв', 'птн', 'сбт'],
        dayNamesMin: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
        weekHeader: 'Не',
        dateFormat: 'dd.mm.yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };
    $.datepicker.setDefaults($.datepicker.regional['ru']);
</script>

</body>
</html>