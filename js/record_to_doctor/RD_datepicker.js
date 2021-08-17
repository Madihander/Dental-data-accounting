
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
        let selected = $(this).val();
        showRecorededPatients(selected);
    });
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
