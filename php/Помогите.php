<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <style>
        .day_indic {
            text-align: center;
            font-weight: 500;
            background-color: #7b1fa2;
            color: #ffffff;
        }
    </style>
</head>
<body>
<div class="day_indic">
    <h3 id="day_indicator">
    </h3>
</div>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
    let day_indicator = document.getElementById('day_indicator');
    let newDay = new Date();
    let newMonth = new Date();
    //изменяем их значения
    newDay = newDay.getDate();
    newMonth = newMonth.getMonth();
    //вызываем функцию которая будет менять значение с цифры на слово - с 0 на Января
    CheckMonth(newMonth);
    // dayMonth = 4 Января
    let dayMonth = newDay + " " + newMonth;
    // Записываем значение в h3
    day_indicator.text(dayMonth);

    function CheckMonth(newMonth) {
        switch (newMonth) {
            case(1):
                if (newMonth = 0) {
                    newMonth = "Января";
                }
                break;
            case(2):
                if (newMonth = 1) {
                    newMonth = "Февраля";

                }

                break;
            case(3):
                if (newMonth = 2) {
                    newMonth = "Марта";

                }
                break;
            case(4):
                if (newMonth = 3) {
                    newMonth = "Апреля";

                }
                break;
            case(5):
                if (newMonth = 4) {
                    newMonth = "Мая";

                }
                break;
            case(6):
                if (newMonth = 5) {
                    newMonth = "Июня";

                }
                break;
            case(7):
                if (newMonth = 6) {
                    newMonth = "Июля";
                }
                break;
            case(8):
                if (newMonth = 7) {
                    newMonth = "Августа";
                }
                break;
            case(9):
                if (newMonth = 8) {
                    newMonth = "Сентября";
                }
                break;
            case(10):
                if (newMonth = 9) {
                    newMonth = "Октября";
                }
                break;
            case(11):
                if (newMonth = 10) {
                    newMonth = "Ноября";
                }
                break;
            case(12):
                if (newMonth = 11) {
                    newMonth = "Декабря";
                }
                break;
        }
    }

</script>
</body>
</html>