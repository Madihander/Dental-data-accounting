new Tablesort(document.getElementById('table_patients'));

function formSend(e) {
    let error = formValidate(form)
    if (error === 0) {
        alert('Данные проверенны');
        recordPatient();
    } else {
        alert('Ошибка');
    }
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
                let block = `<tr class="tr_table_patient" id="${data[key].id}">
                        <td><a href="#" onclick="showRecordedCard('${data[key].startTime}','${data[key].dateRecord}','${data[key].id}')" >${data[key].startTime} - ${data[key].endTime}</a></td>
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

// Эта функция которая, запускает функцию проверки, если ошибок словленных в formValidate > 0 то alert,
// иначе отправляем данные

// Функция собирает проверенные данные после делает Ajax запрос
function recordPatient() {
    $('input').removeClass('invalid');
    $('select').removeClass('invalid');
    $('p').removeClass('error_message');
    errorFullName.text("");
    errorPhoneNumber.text("");
    errorDatepicker.text("");
    errorTime.text("");
    errorLament.text("");

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
            number: patientNumber,
            dateRecord: patientDateRecord,
            doctor: patientDoctor,
            startTime: startTime,
            endTime: endTime,
            lament: patientLament,
        },
        dataType: 'JSON',
        success: function (data) {
            alert('Отправляем данные');
            //submit.prop("disabled", false);
            validateData(data, patientDateRecord, startTime, endTime);
        },
        error: function (data) {
            alert('Произошла ошибка,обратитесь к Мади чтобы он это решил');
            console.log(data.statusText);
        }
    });
}

function validateData(data, patientDateRecord, startTime, endTime) {
    switch (data.error) {
        case '00':
            addRecordtoTable(patientDateRecord, startTime, endTime);
            break;
        case '01':
            formAddError(fullName, errorFullName, `Перепишите ФИО ,он не соответсвует стандарту`);
            break;
        case '02':
            formAddError(phoneNumber, errorPhoneNumber, `Перепишите Номер телефона, он не соотвествует стандарту`);
            break;
        case '03':
            formAddError(minDatepicker, errorDatepicker, `Перепишите Дату записи, она не соответствует стандарту`);
            break;
        case '05':
            formAddError($('#startTimeHour'), errorTime, `Перепишите начальное время записи.`);
            break;
        case '06':
            formAddError($('#endTimeHour'), errorTime, `Перепишите конечное время записи.`);
            break;
        case '07':
            formAddError($('#startTimeHour'), errorTime, `Перепишите время,начальное время = конеченому времени`);
            break;
        case '08':
            formAddError($('#startTimeHour'), errorTime, `Перепишите время,начальное время > конеченому времени`);
            break;
        case '09':
            formAddError(lament, errorLament, `Перепишите жалобу, она не соответствует стандарту`);
            break;
        case '010':
            $('#startTimeHour').addClass('invalid');
            $('#startTimeMin').addClass('invalid');
            $('#endTimeHour').addClass('invalid');
            $('#endTimeMin').addClass('invalid');
            errorTime.text(`Перепишите время записи, есть человек,который записан на это время`);
            errorTime.addClass('error_message');
            break;
        case '011':
            alert(`Неудалось записать пациента, попробуйте перезагрузить сайт`);
            break;
    }
}

// После как ajax произошел функция смотрит какая сегодня дата и какая у поля даты от модального окна
// Если даты равны, то создается новая строка,которая будет содержать определенные данные модального окна
function addRecordtoTable(patientName, patientLament, patientDateRecord, startTime, endTime, patient_id) {
    if (patientDateRecord === $('#datepicker').val()) {
        let tbody = $('#tbody');
        let tr = document.createElement('tr');
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
        $('._req').val(' ').removeClass('valid', 'invalid');
    }
}

// Функция начинает действовать после нажатия на строку записанного пациента в таблице
function showRecordedCard(time, date, record_id) {
    //Ajax запрос,чтобы получить данные данного пациента
    $.ajax({
        url: '../../php/record_to_doctor/showRecordedCard.php',
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
            alert('Неудалось найти, данные этого пациента. Обратитесь к Мади.')
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
            $('#recordedCard').modal("hide");
        },
        error: function (data) {
            alert('Неудалось удалить запись об этом пациенте. Обратитесь к Мади');
        }
    })
}

