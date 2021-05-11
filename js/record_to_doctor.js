let form = $('#form');
//Эта Функция нужна для того чтобы перемещать строки в таблице пациентов
$(function () {
    $('#tbody').sortable({
        connectWith: ".connectedSortable"
    }).disableSelection();
});
//Показывать иконку каледаря в модальном окне
$(function () {
    $("#minDatepicker").datepicker({
        showOn: "button",
        buttonImage: "https://snipp.ru/demo/437/calendar.gif",
        buttonImageOnly: true,
        buttonText: "выбрать дату"
    });
});
//Маска для номера телефона в модальном окне
$(function () {
    $("#phoneNumber").mask("+7(999)999-99-99")
});

$(function () {
    $("#datepicker").datepicker({
        minDate: 0,
        onSelect: function (date) {
            $("#datepicker_value").val(date)
        }
    });
    $("#datepicker").datepicker("setDate", $("#datepicker_value").val())
});

//newDay - День - цифра
// newMonth - Месяц
//newDay_of_week - день недели
let newDay_of_number = new Date();
let newMonth = new Date();
let newDay_of_week = new Date();
//изменяем их значения
let Day_of_number = newDay_of_number.getDate();
let Month = newMonth.getMonth();
let Day_of_week = newDay_of_week.getDay();

CheckMonth(Month);
CheckDay(Day_of_week);
writeDay(Day_of_number);

//Изменяем значение цифр на слова - 0 - Янв
function CheckMonth(Month) {
    switch (Month) {
        case 0:
            if (Month = "0") {
                Month = " янв.";
                return writeMonth(Month);
            }
            break;
        case 1:
            if (Month = "1") {
                Month = " фев.";
                return writeMonth(Month)

            }
            break;
        case 2:
            if (Month = "2") {
                Month = " март.";
                return writeMonth(Month)

            }
            break;
        case 3:
            if (Month = "3") {
                Month = " апр.";
                return writeMonth(Month)

            }
            break;
        case 4:
            if (Month = "4") {
                Month = " мая.";
                return writeMonth(Month)

            }
            break;
        case 5:
            if (Month = "5") {
                Month = " июн.";
                return writeMonth(Month)
            }
            break;
        case 6:
            if (Month = "6") {
                Month = " июл.";
                return writeMonth(Month)
            }
            break;
        case 7:
            if (Month = "7") {
                Month = " авг.";
                return writeMonth(Month)
            }
            break;
        case 8:
            if (Month = "8") {
                Month = " сент.";
                return writeMonth(Month)
            }
            break;
        case 9:
            if (Month = "9") {
                Month = " окт.";
                return writeMonth(Month)
            }
            break;
        case 10:
            if (Month = "10") {
                Month = " нояб.";
                return writeMonth(Month)
            }
            break;
        case 11:
            if (Month = "11") {
                Month = " дек.";
                return writeMonth(Month)
            }
            break;
    }
}

////Изменяем значение цифр на слова - 0 - Понедельник
function CheckDay(Day_of_week) {
    switch (Day_of_week) {
        case 1:
            if (Day_of_week = "1") {
                Day_of_week = "Понедельник";
                return writeDay_of_week(Day_of_week);
            }
            break;
        case 2:
            if (Day_of_week = "2") {
                Day_of_week = "Вториник";
                return writeDay_of_week(Day_of_week);
            }
            break;
        case 3:
            if (Day_of_week = "3") {
                Day_of_week = "Среда";
                return writeDay_of_week(Day_of_week);
            }
            break;
        case 4:
            if (Day_of_week = "4") {
                Day_of_week = "Четверг";
                return writeDay_of_week(Day_of_week);
            }
            break;
        case 5:
            if (Day_of_week = "5") {
                Day_of_week = "Пятница";
                return writeDay_of_week(Day_of_week);
            }
            break;
        case 6:
            if (Day_of_week = "6") {
                Day_of_week = "Суббота";
                return writeDay_of_week(Day_of_week);
            }
            break;
        case 7:
            if (Day_of_week = "7") {
                Day_of_week = "Воскресенье";
                return writeDay_of_week(Day_of_week);
            }

            break;
    }
}

//Выводит дату дня
function writeDay(Day) {
    $("#day_id").text(Day);
}

//Выводит день недели
function writeDay_of_week(Day_of_week) {
    $("#day_of_week").text(Day_of_week)
}

//Выводит месяц года
function writeMonth(Month) {
    $("#month_id").text(Month);
}

//Эта Функция нужна для того чтобы,например выбрали начало приема 12 то уже в поле выбора конца приема не будет 9,10,11
// , это для модального онка
function hideOption() {
    let startTime = $('#startTimeHour').val();
    let endTime = $('#endTimeHour').val();
    if (startTime === '09') {
        $('#endHour09').removeAttr("hidden");
        $('#endHour10').removeAttr("hidden");
        $('#endHour11').removeAttr("hidden");
        $('#endHour12').removeAttr("hidden");
        $('#endHour13').removeAttr("hidden");
        $('#endHour14').removeAttr("hidden");
        $('#endHour15').removeAttr("hidden");
        $('#endHour16').removeAttr("hidden");
        $('#endHour17').removeAttr("hidden");
        $('#endHour18').removeAttr("hidden");
        $('#endHour19').removeAttr("hidden");
    }
    if (startTime === '10') {
        $('#endHour09').attr("hidden", "true");
        $('#endHour10').removeAttr("hidden");
        $('#endHour11').removeAttr("hidden");
        $('#endHour12').removeAttr("hidden");
        $('#endHour13').removeAttr("hidden");
        $('#endHour14').removeAttr("hidden");
        $('#endHour15').removeAttr("hidden");
        $('#endHour16').removeAttr("hidden");
        $('#endHour17').removeAttr("hidden");
        $('#endHour18').removeAttr("hidden");
        $('#endHour19').removeAttr("hidden");
    }
    if (startTime === '11') {
        $('#endHour09').attr("hidden", "true");
        $('#endHour10').attr("hidden", "true");
        $('#endHour11').removeAttr("hidden");
        $('#endHour12').removeAttr("hidden");
        $('#endHour13').removeAttr("hidden");
        $('#endHour14').removeAttr("hidden");
        $('#endHour15').removeAttr("hidden");
        $('#endHour16').removeAttr("hidden");
        $('#endHour17').removeAttr("hidden");
        $('#endHour18').removeAttr("hidden");
        $('#endHour19').removeAttr("hidden");
    }
    if (startTime === '12') {
        $('#endHour09').attr("hidden", "true");
        $('#endHour10').attr("hidden", "true");
        $('#endHour11').attr("hidden", "true");
        $('#endHour12').removeAttr("hidden");
        $('#endHour13').removeAttr("hidden");
        $('#endHour14').removeAttr("hidden");
        $('#endHour15').removeAttr("hidden");
        $('#endHour16').removeAttr("hidden");
        $('#endHour17').removeAttr("hidden");
        $('#endHour18').removeAttr("hidden");
        $('#endHour19').removeAttr("hidden");

    }
    if (startTime === '13') {
        $('#endHour09').attr("hidden", "true");
        $('#endHour10').attr("hidden", "true");
        $('#endHour11').attr("hidden", "true");
        $('#endHour12').attr("hidden", "true");
        $('#endHour13').removeAttr("hidden");
        $('#endHour14').removeAttr("hidden");
        $('#endHour15').removeAttr("hidden");
        $('#endHour16').removeAttr("hidden");
        $('#endHour17').removeAttr("hidden");
        $('#endHour18').removeAttr("hidden");
        $('#endHour19').removeAttr("hidden");
    }
    if (startTime === '14') {
        $('#endHour09').attr("hidden", "true");
        $('#endHour10').attr("hidden", "true");
        $('#endHour11').attr("hidden", "true");
        $('#endHour12').attr("hidden", "true");
        $('#endHour13').attr("hidden", "true");
        $('#endHour14').removeAttr("hidden");
        $('#endHour15').removeAttr("hidden");
        $('#endHour16').removeAttr("hidden");
        $('#endHour17').removeAttr("hidden");
        $('#endHour18').removeAttr("hidden");
        $('#endHour19').removeAttr("hidden");
    }
    if (startTime === '15') {
        $('#endHour09').attr("hidden", "true");
        $('#endHour10').attr("hidden", "true");
        $('#endHour11').attr("hidden", "true");
        $('#endHour12').attr("hidden", "true");
        $('#endHour13').attr("hidden", "true");
        $('#endHour14').attr("hidden", "true");
        $('#endHour15').removeAttr("hidden");
        $('#endHour16').removeAttr("hidden");
        $('#endHour17').removeAttr("hidden");
        $('#endHour18').removeAttr("hidden");
        $('#endHour19').removeAttr("hidden");
    }
    if (startTime === '16') {
        $('#endHour09').attr("hidden", "true");
        $('#endHour10').attr("hidden", "true");
        $('#endHour11').attr("hidden", "true");
        $('#endHour12').attr("hidden", "true");
        $('#endHour13').attr("hidden", "true");
        $('#endHour14').attr("hidden", "true");
        $('#endHour15').attr("hidden", "true");
        $('#endHour16').removeAttr("hidden");
        $('#endHour17').removeAttr("hidden");
        $('#endHour18').removeAttr("hidden");
        $('#endHour19').removeAttr("hidden");
    }
    if (startTime === '17') {
        $('#endHour09').attr("hidden", "true");
        $('#endHour10').attr("hidden", "true");
        $('#endHour11').attr("hidden", "true");
        $('#endHour12').attr("hidden", "true");
        $('#endHour13').attr("hidden", "true");
        $('#endHour14').attr("hidden", "true");
        $('#endHour15').attr("hidden", "true");
        $('#endHour16').attr("hidden", "true");
        $('#endHour17').removeAttr("hidden");
        $('#endHour18').removeAttr("hidden");
        $('#endHour19').removeAttr("hidden");
    }
    if (startTime === '18') {
        $('#endHour09').attr("hidden", "true");
        $('#endHour10').attr("hidden", "true");
        $('#endHour11').attr("hidden", "true");
        $('#endHour12').attr("hidden", "true");
        $('#endHour13').attr("hidden", "true");
        $('#endHour14').attr("hidden", "true");
        $('#endHour15').attr("hidden", "true");
        $('#endHour16').attr("hidden", "true");
        $('#endHour17').attr("hidden", "true");
        $('#endHour18').removeAttr("hidden");
        $('#endHour19').removeAttr("hidden");
    }
    if (startTime === '19') {
        $('#endHour09').attr("hidden", "true");
        $('#endHour10').attr("hidden", "true");
        $('#endHour11').attr("hidden", "true");
        $('#endHour12').attr("hidden", "true");
        $('#endHour13').attr("hidden", "true");
        $('#endHour14').attr("hidden", "true");
        $('#endHour15').attr("hidden", "true");
        $('#endHour16').attr("hidden", "true");
        $('#endHour17').attr("hidden", "true");
        $('#endHour18').attr("hidden", "true");
        $('#endHour19').removeAttr("hidden");
    }
}

// Эта функция которая, запускает функцию проверки, если ошибок словленных в formValidate > 0 то alert,
// иначе отправляем данные
function formSend(e) {
    let error = formValidate(form)
    if (error === 0) {
        alert('SUCCESS');
        recordPatient();
    } else {
        alert('DANGER');
    }
}

// Функция проверяющие на заполнение и regex поля в модальном окне
function formValidate(form) {
    let error = 0;
    let formReq = document.querySelectorAll('._req');

    for (let index = 0; index < formReq.length; index++) {
        const input = formReq[index];
        formRemoveError(input);

        if (input.classList.contains('_fullName')) {
            if (fullNameTest(input) === false) {
                alert(123456)
                formAddError(input, 'Неправильно записано ФИО');
                error++;
            }
        } else if (input.classList.contains('_phoneNumber')) {
            if (phoneNumberTest(input) === false) {
                formAddError(input, 'Неправильно записан номер телефона');
                error++;
            }
        } else if (input.classList.contains('_minDatepicker')) {
            if (minDatepickerTest(input) === false) {
                formAddError(input, 'Неправильно записана Дата');
                error++;
            }
        } else if (input.classList.contains('_endTimeHour')) {
            if (TimeTest(input) === false) {
                formAddError(input, 'Неправильно выбрано время');
                error++
            }
        } else {
            if (input.value === '') {
                formAddError(input, '4');
                error++;
            }
        }
    }
    return error;
}

// Все эти 3 функции сравнивают значение определенного поля по regex и отправляет bool-значение.
function fullNameTest(input) {
    return (/^([А-ЯA-Z]|[А-ЯA-Z][\x27а-яa-z]{1,}|[А-ЯA-Z][\x27а-яa-z]{1,}-([А-ЯA-Z][\x27а-яa-z]{1,}|(оглы)|(кызы)))\040[А-ЯA-Z][\x27а-яa-z]{1,}(\040[А-ЯA-Z][\x27а-яa-z]{1,})?$/.test(input.value));
}

function phoneNumberTest(input) {
    return /^(\+)?(\(\d{2,3}\) ?\d|\d)(([ \-]?\d)|( ?\(\d{2,3}\) ?)){5,12}\d$/.test(input.value);
}

function minDatepickerTest(input) {
    return /^(0?[1-9]|[12][0-9]|3[01])[.](0?[1-9]|1[012])[.]\d{4}$/.test(input.value)
}
//TODO Периписать Блок if-else на switch
function TimeTest(input) {
    let startTime = $('#startTimeHour').val() + `:` + $('#startTimeMin').val();
    let endTime = input.value + `:` + $('#endTimeMin').val();
    alert(startTime);
    alert(endTime);
    if (startTime === endTime) {
        alert(1);
        return false;
    } else if ($('#startTimeHour').val() > input.value) {
        alert(2);
        return false;
    } else if (startTime > endTime) {
        alert(3);
        return false;
    } else {
        return true;
    }
    /*switch (endTime) {
        case 1:
            if (startTime === endTime) {
                alert(1);
                return false;
            }
            break;
        case 2:
            if ($('#startTimeHour').val() > input.value) {
                alert(2);
                return false;
            }
            break;
        case 3:
            if (startTime > endTime) {
                alert(3);
                return false;
            }
            break;
    }*/


    /*if (startTime === endTime) {
        return false;
    } else if ($('#startTimeHour').val() > input.value) {
        return false;
    } else {
        return true;
    }*/
}

// Убирает красный бордер у поля
function formRemoveError(input) {
    input.classList.remove('_error')
}

// Добавляет красный бордер полю
function formAddError(input, text) {
    input.classList.add('_error')
    alert(text);
}

// Функция собирает проверенные данные после делает Ajax запрос
function recordPatient() {
    let patientName = $('#fullName').val();
    let patientLament = $('#lament').val();
    let patientNumber = $('#phoneNumber').val();
    let patientDateRecord = $('#minDatepicker').val();
    let patientDoctor = $('#doctor').val();
    let startTime = $('#startTimeHour').val() + ':' + $('#startTimeMin').val();
    let endTime = $('#endTimeHour').val() + ':' + $('#endTimeMin').val();
    console.log(patientNumber);
    $.ajax({
        url: '../php/record_to_doctor/insert_data_record_patient.php',
        type: 'POST',
        data: {
            name: patientName,
            lament: patientLament,
            number: patientNumber,
            dateRecord: patientDateRecord,
            doctor: patientDoctor,
            startTime: startTime,
            endTime: endTime,
        },
        dataType: 'JSON',
        success: function (data) {
            //submit.prop("disabled", false);
            validateData(data);
            //console.log(data);
            //addRecordtoTable(patientDateRecord, startTime, endTime)
        }
    });
}

// После как ajax произошел функция смотрит какая сегодня дата и какая у поля даты от модального окна
// Если даты равны, то создается новая строка,которая будет содержать определенные данные модального окна
function addRecordtoTable(patientDateRecord, startTime, endTime) {
    if (patientDateRecord === $('#datepicker').val()) {
        let tbody = $('#tbody');
        let tr = document.createElement('tr');
        let record_id = 'record_id_' + startTime;
        tr.innerHTML = `<th scope="time row">
       <button onclick="showRecordedCard('` + startTime + `','` + patientDateRecord + `','` + record_id + `')">` + startTime + '-' + endTime + `</button>
</th>
    <td>` + patientName + ' ,' + patientLament + `</td>`;
        tr.setAttribute('class', 'ui-state-default');
        tr.setAttribute('id', record_id);
        tbody.append(tr);

        $('#recordingCard').modal("hide");
        $('.data_patient').val('');
    }
    // Если Нет то появляется Alert и все
    else {
        alert('Пациент записан на ' + patientDateRecord);
        $('#recordingCard').modal("hide");
        $('.data_patient').val('');
    }
}

// Функция начинает действовать после нажатия на строку записанного пациента в таблице
function showRecordedCard(time, date, record_id) {
    //Ajax запрос,чтобы получить данные данного пациента
    $.ajax({
        url: '../php/record_to_doctor/showRecordedCard.php',
        method: 'POST',
        data: {
            time: time,
            date: date,
        },
        dataType: 'JSON',
        // Выводим данные в модальном окне
        success: function (data) {
            console.log(data);
            $('#recordedFullName').val(data[0]);
            $('#recordedPhoneNumber').val(data[2]);
            $('#recordedMinDatepicker').val(data[3]);
            $('#recordedDoctor').val(data[1]);
            $('#recordedStartTime').val(data[5]);
            $('#recordedEndTime').val(data[6]);
            $('#recordedLament').val(data[4]);
            $('#recordedCard').modal("show");
            $('.record_for_delete').attr('data-id', record_id);
        },
        error: function (data) {
            alert(123456);
        }
    })
}

// Чтобы закрыть карточку записанного пациента
function closeCard() {
    $('.recorded_data_patient').val(' ');
}

// Чтобы удалить карточка записанного пациента как в базе так и в html таблице
function deleteCard(elem) {
    $.ajax({
        url: '../php/record_to_doctor/deleteRecordedCard.php',
        method: 'POST',
        data: {
            fullName: $('#recordedFullName').val(),
            date: $('#recordedMinDatepicker').val(),
            time: $('#recordedStartTime').val(),
        },
        dataType: 'JSON',
        success: function (data) {
            console.log(elem);
            let tr = document.getElementById(elem);
            tr.remove();
            alert("ggfgfg");
            $('#recordedCard').modal("hide");
        },
        error: function (data) {
            alert('BAD');
        }
    })
}

//
function sortRecords() {
    let sortedRows = Array.from(tbody.rows)
        .slice(1)
        .sort((rowA, rowB) => rowA.cells[0].innerHTML > rowB.cells[0].innerHTML ? 1 : -1);

    tbody.tBodies[0].append(...sortedRows);
}

function validateData(data) {
    if (data.status === '200' && data.error === '00') alert(123);
}

/*function insertData(patientName,lament,number,dateRecord,doctor,startTime,endTime) {

}*/
/*
if ($("#payment").click){
    $("#paymentCard").modal("hide");
}
if($("#recording").click){
    $("#paymentCard").modal("hide");
}
if($("#plan").click){
    $("#paymentCard").modal("hide");
    $("#recordingCard").modal("hide");

}
*/
