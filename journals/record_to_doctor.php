<?php
require_once '../includes/db.php';
?>
<!--Если что не понятно про модальные окна, перейди по ссылке,я просто там код списал.
Бери там потому что на других и доки не рабочие варианты,я незнаю как так получилось.Короче там бери, и читай
https://itchief.ru/bootstrap/modal-->
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
            <div class="row mt-4 pr-3 pl-3">
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
            <table class="table table-hover table_patient">
                <thead>
                <tr>
                    <th scope="col">Время</th>
                    <th scope="col"><a href="#recordingCard" data-toggle="modal">Пациенты</a></th>
                </tr>
                </thead>
                <tbody id="tbody" class="connectedSortable">

                </tbody>
            </table>
        </div>
        <div class="col-1"></div>
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
                        <!--<div class="col-1">
                            <button><a id="payment" href="#paymentCard" data-toggle="modal">Оплата</a></button>
                        </div>-->
                        <!--<div class="col-1">
                            <button><a id="plan" href="#planCard" data-toggle="modal">План</a></button>
                        </div>-->
                        <div class="col-7"></div>
                        <div class="col-1">
                            <a href="patient_card.php">
                                <img src="#" alt="record">
                            </a>
                        </div>
                        <!--<div class="col-1">
                            <a href="#">
                                <img src="#" alt="123141">
                            </a>
                        </div>-->
                    </div>
                </div>
            </div>
            <div class="modal-body mt-3">
                <form id="form" class="container-fluid">
                    <div class="row mb-3">
                        <div class="col-md-5">
                            <label>ФИО Пациента</label>
                            <input placeholder="Петров Петр Петрович" class="data_patient floating_input _req _fullName" id="fullName">
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-5 ml-auto">
                            <label>Номера телефона</label>
                            <input class="data_patient floating_input _req _phoneNumber" type="text" id="phoneNumber">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-5">
                            <label>День приема</label>
                            <input class="data_patient floating_input _req _minDatepicker" readonly type="text"
                                   id="minDatepicker">
                            <!--<input class="floating_input" type="text" id="datepicker">-->
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-5 ml-auto">
                            <label>Лечущий Врач</label>
                            <input class="data_patient floating_input _req _doctor" id="doctor">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label>Время начала</label>
                            <select class="data_patient floating_input _startTimeHour" id="startTimeHour">
                                <option disabled value="">__</option>
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
                            <select class="data_patient floating_input _startTimeMin" id="startTimeMin">
                                <option disabled value="">__</option>
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
                            <select onclick="hideOption()" class="data_patient floating_input _endTimeHour" id="endTimeHour">
                                <option disabled value="">__</option>
                                <option id="endHour09" value="09">09</option>
                                <option id="endHour10" value="10">10</option>
                                <option id="endHour11" value="11">11</option>
                                <option id="endHour12" value="12">12</option>
                                <option id="endHour13" value="13">13</option>
                                <option id="endHour14" value="14">14</option>
                                <option id="endHour15" value="15">15</option>
                                <option id="endHour16" value="16">16</option>
                                <option id="endHour17" value="17">17</option>
                                <option id="endHour18" value="18">18</option>
                                <option id="endHour19" value="19">19</option>
                            </select>
                            :
                            <select class="data_patient floating_input _endTimeMin" id="endTimeMin">
                                <option disabled value="">__</option>
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
                            <label>Причина обращения</label>
                            <input class="data_patient floating_input _req _lament" id="lament">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <button type="button" onclick="formSend()" id="submit" class="btn btn-primary">Записать</button>
            </div>
        </div>
    </div>
</div>
<div id="recordedCard" class="modal fade">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header pt-0 pb-0">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-1">
                            <button><a id="recording" href="#recordingCard" data-toggle="modal">Запись</a></button>
                        </div>
                        <!--<div class="col-1">
                            <button><a id="payment" href="#paymentCard" data-toggle="modal">Оплата</a></button>
                        </div>-->
                        <!--<div class="col-1">
                            <button><a id="plan" href="#planCard" data-toggle="modal">План</a></button>
                        </div>-->
                        <div class="col-7"></div>
                        <div class="col-1">
                            <a href="patient_card.php">
                                <img src="#" alt="record">
                            </a>
                        </div>
                        <!--<div class="col-1">
                            <a href="#">
                                <img src="#" alt="123141">
                            </a>
                        </div>-->
                    </div>
                </div>
            </div>
            <div class="modal-body mt-3">
                <div class="container-fluid">
                    <div class="row mb-3">
                        <div class="col-md-5">
                            <label>ФИО Пациента</label>
                            <input class="recorded_data_patient floating_input" id="recordedFullName" readonly>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-5 ml-auto">
                            <label>Номера телефона</label>
                            <input class="recorded_data_patient floating_input" type="text" id="recordedPhoneNumber"
                                   readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-5">
                            <label>День приема</label>
                            <input class="recorded_data_patient" type="text" id="recordedMinDatepicker" readonly>
                            <!--<input class="floating_input" type="text" id="datepicker">-->
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-5 ml-auto">
                            <label>Лечущий Врач</label>
                            <input class="recorded_data_patient floating_input" id="recordedDoctor" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label>Время начала</label>
                            <input class="recorded_data_patient floating_input" id="recordedStartTime" readonly>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                            <label>Время окончания</label>
                            <input class="recorded_data_patient floating_input" id="recordedEndTime" readonly>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-md-5">
                            <label>Жалоба</label>
                            <input class="recorded_data_patient floating_input" id="recordedLament" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input hidden class='record_for_delete'>
                <button id="closeRecordedCard" type="button" class="btn btn-default" data-dismiss="modal">
                    Закрыть
                </button>
                <button id="deleteRecordedCard" onclick="deleteCard($('.record_for_delete').attr('data-id'))" type="button" class="btn btn-default">
                    Удалить
                </button>

            </div>
        </div>
    </div>
</div>
<!-------Js------->
<script src="../jquery/jquery.js"></script>
<script src="../js/bootstrap.js"></script>
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
