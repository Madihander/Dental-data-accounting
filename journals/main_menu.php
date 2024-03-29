<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>ГЛАВНАЯ СТРАНИЦА</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link href="../css/main_menu.css" rel="stylesheet">
</head>
<body>
<div class="over_view">
    <h1 class="pb-2" style="color: #d45a5f">Avior MK</h1>
    <ul>
        <li class="mt-3 mb-3">
            <div class="pr-3 pl-3">
                <a href="#" class="floating_button">
                    <?= $_SESSION['user']['fullName'] ?>
                </a>
            </div>
        </li>
        <li class="mt-3 mb-3">
            <div class="pr-3 pl-3">
                <a href="record_to_doctor.php" class="floating_button">
                    РАСПИСАНИЕ ПРИЕМА
                </a>
            </div>
        </li>
        <li class="mt-3 mb-3">
            <div class="pr-3 pl-3">
                <a href="redis_patient_card.php" class="floating_button">
                    ЛИЧНАЯ КАРТА ПАЦИЕНТА
                </a>
            </div>
        </li>
        <!--
                <li>
                    <div class="m-2 pr-3 pl-3">
                        <a href="journals/pre_entry.php" class="floating_button">
                            ЖУРНАЛ ПРЕДВАРИТЕЛЬНОЙ ЗАПИСИ НА ПРИЕМ К СТОМАТОЛОГУ
                        </a>
                    </div>
                </li>


                <li>
                    <div class="m-2 pr-3 pl-3">
                        <a href="journals/daily_intake.php" class="floating_button">
                            ЖУРНАЛ ЕЖЕДНЕВНОГО ПРИЕМА
                        </a
                    </div>
                </li>

                <li>
                    <div class="m-2 pr-3 pl-3">
                        <a href="journals/patient_card.php" class="floating_button">
                            ЛИЧНАЯ КАРТА ПАЦИЕНТА
                        </a>
                    </div>
                </li>
        -->
    </ul>
</div>
</body>
</html>