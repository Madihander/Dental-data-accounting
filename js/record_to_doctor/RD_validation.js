let form = $('#form');

let fullName = $('#fullName');
let phoneNumber = $('#phoneNumber');
let minDatepicker = $('#minDatepicker');
let endTimehour = $('#endTimeHour');
let lament = $('#lament');

let errorFullName = $('#errorFullName');
let errorPhoneNumber = $('#errorPhoneNumber');
let errorDatepicker = $('#errorDatepicker');
let errorTime = $('#errorTime');
let errorLament = $('#errorLament');

// Активная валидация этих полей
fullName.blur(function () {
    if (!fullNameTest(fullName)) {
        formAddError(fullName, errorFullName, 'Неправильный ФИО')
    } else {
        errorFullName.innerHTML = " ";
        fullName.addClass('valid')
    }
});
fullName.focus(function () {
    if (fullName.hasClass('invalid')) {
        formRemoveError(fullName, errorFullName);
    }
});

phoneNumber.blur(function () {
    if (!phoneNumberTest(phoneNumber)) {
        formAddError(phoneNumber, errorPhoneNumber, 'Неправельный номер телефона');
    } else {
        errorPhoneNumber.innerHTML = " ";
        phoneNumber.addClass('valid')
    }
});
phoneNumber.focus(function () {
    if (phoneNumber.hasClass('invalid')) {
        formRemoveError(phoneNumber, errorPhoneNumber)
    }
});

minDatepicker.blur(function () {
    if (minDatepickerTest(minDatepicker) === false) { // не email
        formAddError(minDatepicker, errorDatepicker, 'Выберете дату');
    } else {
        errorDatepicker.innerHTML = " ";
        minDatepicker.addClass('valid')
    }
});
minDatepicker.focus(function () {
    if (minDatepicker.hasClass('invalid')) {
        formRemoveError(minDatepicker, errorDatepicker);
    }
});

lament.blur(function () {
    if (lament === '') {
        formAddError(lament, errorLament, 'Запишите жалобу')
    } else {
        errorLament.innerHTML = " ";
        lament.addClass('valid')
    }
});
lament.focus(function () {
    if (lament.hasClass('invalid')) {
        formRemoveError(lament, errorLament);
    }
});


// Функция проверяющие на заполнение и regex поля в модальном окне
function formValidate(form) {
    let error = 0;

    if (!fullNameTest(fullName)) {
        formAddError(fullName, errorFullName, 'Неправильно записано ФИО');
        error++;
    } else if (!phoneNumberTest(phoneNumber)) {
        formAddError(phoneNumber, errorPhoneNumber, 'Неправильно записан номер телефона');
        error++;
    } else if (!minDatepickerTest(minDatepicker)) {
        formAddError(minDatepicker, errorDatepicker, 'Неправильно записана Дата');
        error++;
    } else if (!TimeTest(endTimehour)) {
        error++;
    } else if (lament === '') {
        formAddError(lament, errorLament, 'Запишите жалобу');
        error++
    }
    return error;
}

// Убирает красный бордер у поля
function formRemoveError(input, errorMessage) {
    input.removeClass('invalid');
    errorMessage.text("");
}

// Добавляет красный бордер полю
function formAddError(input, errorMessage, text) {
    input.addClass('invalid');
    errorMessage.text(text);
    errorMessage.addClass('error_message');
}

// Все эти 3 функции сравнивают значение определенного поля по regex и отправляет bool-значение.
function fullNameTest(input) {
    return (/^([А-ЯA-Z]|[А-ЯA-Z][\x27а-яa-z]{1,}|[А-ЯA-Z][\x27а-яa-z]{1,}-([А-ЯA-Z][\x27а-яa-z]{1,}|(оглы)|(кызы)))\040[А-ЯA-Z][\x27а-яa-z]{1,}(\040[А-ЯA-Z][\x27а-яa-z]{1,})?$/.test(input.val()));
}

function phoneNumberTest(input) {
    return /^(\+)?(\(\d{2,3}\) ?\d|\d)(([ \-]?\d)|( ?\(\d{2,3}\) ?)){5,12}\d$/.test(input.val());
}

function minDatepickerTest(input) {
    return /^(0?[1-9]|[12][0-9]|3[01])[.](0?[1-9]|1[012])[.]\d{4}$/.test(input.val());
}

function TimeTest(input) {
    let startTime = $('#startTimeHour').val() + `:` + $('#startTimeMin').val();
    let endTime = input.val() + `:` + $('#endTimeMin').val();
    if (startTime === endTime) {
        formAddError($('#startTimeHour'), $('#errorTime'), 'Время одинаковое');
        return false;
    } else if ($('#startTimeHour').val() > input.val()) {
        formAddError($('#startTimeHour'), $('#errorTime'), 'Начальное время больше конечного.')
        return false;
    } else if (startTime > endTime) {
        formAddError($('#startTimeHour'), $('#errorTime'), 'Начальное время больше конечного.');
        $('#startTimeMin').addClass('invalid')
        return false;
    } else {
        formRemoveError($('#startTimeHour'), $('#errorTime'));
        $('#startTimeMin').removeClass('invalid');
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
