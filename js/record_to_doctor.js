let form = $('#form')
//Эта Функция нужна для того чтобы перемещать строки в таблице пациентов
/*$(function () {
    $('#tbody').sortable({
        connectWith: ".connectedSortable"
    }).disableSelection();
});
*/
//Выставляем сегодняшнию дату в значение календаря

$(function () {
    let date = new Date().toLocaleDateString();
    $('#datepicker_value').val(date);
})
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
    $("#datepicker").datepicker();

    $("#datepicker").val();

    $("#datepicker").on("change", function () {
        var selected = $(this).val();
        showRecorededPatients(selected);
    });
});
/*
$(function () {
    $('#datepicker').datepicker({
        onSelect: function (dateText, inst) {
            $.datepicker.formatDate("dd.mm.yy",$(this).datepicker("getDate"));
            /*
            let currentDate = new Date().toLocaleDateString();
            console.log(currentDate);
            console.log(123456);
            if ($('#datepicker_value').val() !== currentDate.val()) {
                showRecorededPatients();
            } else {
                alert('Current');
            }
        }
    })
})
*/
new Tablesort(document.getElementById('table_patients'));
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

function showRecorededPatients(date) {
    let chosenDate = date;
    $('.tr_table_patient').remove();
    console.log(chosenDate);
    $.ajax({
        url: '../php/record_to_doctor/showRecordedPatientOnThisDay.php',
        type: 'POST',
        data: {
            date: chosenDate
        },
        dataType: 'JSON',
        success: function (data) {
            data = JSON.parse(JSON.stringify(data))
            let table_patients = $('#tbody');
            for (let key in data) {
                console.log(data[key]);
                let block = `<tr class="tr_table_patient">
                        <td><a href="#">${data[key].startTime} - ${data[key].endTime}</a></td>
                        <td>${data[key].fullName},${data[key].lament}</td>
                    </tr>`
                table_patients.append(block)
            }
        },
        error: function () {
            console.log(456);
        }
    })
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
    recordPatient();
    /*TODO потом вернуть
         let error = formValidate(form)
      if (error === 0) {
          alert('SUCCESS');
          recordPatient();
      } else {
          alert('DANGER');
      }*/
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
    $(input).classList.add('_error')
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
            alert(13333);
            //submit.prop("disabled", false);
            if (data.status === '200' && data.error === '00' && data.id !== 0) {
                alert('Пациент Успешно Записан');
                addRecordtoTable(patientName, patientLament, patientDateRecord, startTime, endTime, data.id);
            } else if (data.status === '203' && data.error === '01') {
                alert(`Перепишите ФИО ,он не соответсвует стандарту`);
            } else if (data.status === '203' && data.error === '02') {
                alert(`Перепишите Номер телефона, он не соответствует стандарту`);
            } else if (data.status === '203' && data.error === '03') {
                alert(`Перепишите Дату записи, она не соответствует стандарту`);
            } else if (data.status === '203' && data.error === '04') {
                alert(`Перепишите Доктора, он не соответствует стандарту`);
            } else if (data.status === '203' && data.error === '05') {
                alert(`Перепишите начальное время записи, она не соответствует стандарту`);
            } else if (data.status === '203' && data.error === '06') {
                alert(`Перепишите конечное время записи, она не соответствует стандарту`);
            } else if (data.status === '203' && data.error === '07') {
                alert(`Перепишите время, оно не соответствует стандарту`);
            } else if (data.status === '203' && data.error === '08') {
                alert(`Перепишите время, оно не соответствует стандарту`);
            } else if (data.status === '203' && data.error === '09') {
                alert(`Перепишите жалобу, она не соответствует стандарту`);
            } else if (data.status === '203' && data.error === '010') {
                alert(`Перепишите жалобу, она не соответствует стандарту`);
            }
            //console.log(data);
            //addRecordtoTable(patientDateRecord, startTime, endTime)
        },
        error: function (data) {
            alert(123333333333333);
        }
    });
}

// После как ajax произошел функция смотрит какая сегодня дата и какая у поля даты от модального окна
// Если даты равны, то создается новая строка,которая будет содержать определенные данные модального окна
function addRecordtoTable(patientName, patientLament, patientDateRecord, startTime, endTime, patient_id) {
    alert(123);
    if (patientDateRecord === $('#datepicker').val()) {
        let tbody = $('#tbody');
        let tr = document.createElement('tr');
        alert(patient_id);
        tr.innerHTML = `<th scope="time row">
       <button onclick="showRecordedCard('` + startTime + `','` + patientDateRecord + `','` + patient_id + `')">` + startTime + '-' + endTime + `</button>
</th>
    <td>` + patientName + ' ,' + patientLament + `</td>`;
        tr.setAttribute('class', 'ui-state-default');
        tr.setAttribute('id', patient_id);
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
            id: record_id,
            time: time,
            date: date,
        },
        dataType: 'JSON',
        // Выводим данные в модальном окне
        success: function (data) {
            console.log(data);
            $('#recordedFullName').val(data[1]);
            $('#recordedPhoneNumber').val(data[2]);
            $('#recordedMinDatepicker').val(data[3]);
            $('#recordedDoctor').val(data[4]);
            $('#recordedStartTime').val(data[5]);
            $('#recordedEndTime').val(data[6]);
            $('#recordedLament').val(data[7]);
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
            id: elem,
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


/*
function sortRecords() {
    let sortedRows = Array.from(tbody.rows)
        .slice(1)
        .sort((rowA, rowB) => rowA.cells[0].innerHTML > rowB.cells[0].innerHTML ? 1 : -1);

    tbody.tBodies[0].append(...sortedRows);
}
*/
function validateData(data, patientDateRecord, startTime, endTime) {
    if (data.status === '200' && data.error === '00') {
        alert('Пациент Успешно Записан');
        addRecordtoTable(patientDateRecord, startTime, endTime);
    } else if (data.status === '203' && data.error === '01') {
        formAddError($('#fullName'), `Перепишите ФИО ,он не соответсвует стандарту`)
    } else if (data.status === '203' && data.error === '02') {
        formAddError($('#phoneNumber'), `Перепишите Номер телефона, он не соответствует стандарту`);
    } else if (data.status === '203' && data.error === '03') {
        formAddError($('#phoneNumber'), `Перепишите Дату записи, она не соответствует стандарту`);
    }
    /*switch (data) {
        case 0:
            if (data.status === '200' && data.error === '00') {
                alert('Пациент Успешно Записан');
                addRecordtoTable(patientDateRecord, startTime, endTime);
            }
            break;
        case 1:
            if (data.status === '203' && data.error === '01') {
                formAddError($('#fullName'), `Перепишите ФИО ,он не соответсвует стандарту`)
            }
            break;
        case 2:
            if (data.status === '203' && data.error === '02') {
                formAddError($('#phoneNumber'), `Перепишите Номер телефона, он не соответствует стандарту`);
            }
            break;
        case 3:
            if (data.status === '203' && data.error === '03') {
                formAddError($('#phoneNumber'), `Перепишите Дату записи, она не соответствует стандарту`);
            }
            break;
        case 4:
            if (data.status === '203' && data.error === '04') {
                formAddError($('#phoneNumber'), `Перепишите Доктора, он не соответствует стандарту`);
            }
    }*/
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
