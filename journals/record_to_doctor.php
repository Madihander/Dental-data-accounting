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
<div class="container-fluid d-flex h-100 justify-content-center align-content-center align-items-center">
    <div class="row glassEffect">
        <div class="col-3 mt-4 mr-5">
            <div id="datepicker" class="p-1"></div>
            <input type="hidden" id="datepicker_value">
        </div>
        <div class="col-7 mt-4">
            <table id="table_patients" class="table table-hover table_patient">
                <thead>
                <tr>
                    <th scope="col">
                        <span class=""><ion-icon name="time-outline"></ion-icon></span>
                        <span class="">Время</span>
                    </th>
                    <th scope="col">
                        <a class="p-1" href="#recordingCard" data-toggle="modal">
                            <ion-icon width name="add-circle-outline"></ion-icon>
                            Пациенты
                        </a>
                    </th>

                </tr>
                </thead>
                <tbody id="tbody">
                <tr class="tr_table_patient">
                    <td><a href="#">10:00 - 11:00</a></td>
                    <td>Кажибеков Мади Нуржанович</td>
                </tr>
                <tr class="tr_table_patient">
                    <td><a href="#">10:00 - 11:00</a></td>
                    <td>Кажибеков Мади Нуржанович</td>
                </tr>
                <tr class="tr_table_patient">
                    <td><a href="#">10:00 - 11:00</a></td>
                    <td>Кажибеков Мади Нуржанович</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!--Модальное окно для того чтобы записать пациента-->
<div id="recordingCard" class="modal fade">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header pt-2 pb-2">
                <h3>Запись Пациента</h3>
            </div>
            <div class="modal-body mt-3">
                <form id="form" class="container-fluid">
                    <div class="row mb-3">
                        <div class="col-5  mt-2">
                            <label for="fullName" class="field_label">ФИО</label>
                            <input id="fullName" class="fields" type="text" required autocomplete="off"
                                   placeholder="Петров Петр Петрович">
                        </div>
                        <div class="col-2"></div>
                        <div class="col-5 mt-2">
                            <label for="phoneNumber" class="field_label">Номера телефона</label>
                            <input id="phoneNumber" class="fields" type="text" required autocomplete="off">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-5">
                            <label for="minDatepicker" class="field_label">Дата записи</label>
                            <input id="minDatepicker" class="fields" type="text" required autocomplete="off">
                        </div>
                        <div class="col-2"></div>
                        <div class="col-5">
                            <label class="field_label" for="doctor">Лечущий врач</label>
                            <select id="doctor" class="fields">
                                <option>_____</option>
                                <option value="Кажибеков Нуржан Султанович">Кажибеков Нуржан Султанович</option>
                                <option value="Кажибеков Мади Нуржанович">Кажибеков Мади Нуржанович</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <label for="startTimeHour">Время начала</label>
                            <select class="selectionField _startTimeHour" id="startTimeHour">
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
                            <select class="selectionField  _startTimeMin" id="startTimeMin">
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
                            <label for="endTimeHour">Время окончания</label>
                            <select onclick="hideOption()" class="selectionField _req _endTimeHour" id="endTimeHour">
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
                            <select class="selectionField  _endTimeMin" id="endTimeMin">
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
                            <label for="lament" class="field_label">Причина обращения</label>
                            <input class="fields floating_input _req _lament" id="lament">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="formSend()" id="submit" class="btn btn-primary">Записать</button>
            </div>
        </div>
    </div>
</div>
<!--Модальное окно для того чтобы показать записанного пациента-->
<div id="recordedCard" class="modal fade">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header pt-2 pb-2">
                <h3>Запись Пациента</h3>
            </div>
            <div class="modal-body mt-3">
                <div class="container-fluid">
                    <div class="row mb-3">
                        <div class="col-md-5">
                            <label class="field_label">ФИО Пациента</label>
                            <input class="recorded_data_patient fields" id="recordedFullName" readonly>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-5 ml-auto">
                            <label class="field_label">Номера телефона</label>
                            <input class="recorded_data_patient fields" type="text" id="recordedPhoneNumber"
                                   readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-5">
                            <label class="field_label">День приема</label>
                            <input class="recorded_data_patient fields" type="text" id="recordedMinDatepicker" readonly>
                            <!--<input class="floating_input" type="text" id="datepicker">-->
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-5 ml-auto">
                            <label class="field_label">Лечущий Врач</label>
                            <input class="recorded_data_patient fields" id="recordedDoctor" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label class="field_label">Время начала</label>
                            <input class="recorded_data_patient fields" id="recordedStartTime" readonly>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                            <label class="field_label">Время окончания</label>
                            <input class="recorded_data_patient fields" id="recordedEndTime" readonly>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-md-5">
                            <label class="field_label">Жалоба</label>
                            <input class="recorded_data_patient fields" id="recordedLament" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input hidden class='record_for_delete'>
                <button id="closeRecordedCard" type="button" class="btn btn-default" data-dismiss="modal">
                    Закрыть
                </button>
                <button id="deleteRecordedCard" onclick="deleteCard($('.record_for_delete').attr('data-id'))"
                        type="button" class="btn btn-default">
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
<script src="../libs/tablesort.js"></script>

<script src=../js/record_to_doctor.js></script>
<!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
<script src="../jquery/jquery-ui.js"></script>
<script src="../jquery/jquery.maskedinput.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
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