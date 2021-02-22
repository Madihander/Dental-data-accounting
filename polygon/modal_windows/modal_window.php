<?php
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>ЛИЧНАЯ КАРТА ПАЦИЕНТА</title>
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/add_patient.css">
</head>
<body>
<div class="container">
    <h1 class="text-center">Bootstrap - Демонстрация работы компонента modal</h1>
    <hr>
</div>
<div class="container">
    <p>1. Активирование модального окна с помощью атрибутов data</p>
    <p><a href="#myModal1" class="btn btn-primary" data-toggle="modal">Открыть модальное окно 1</a></p>

    <div id="myModal1" class="modal fade" data-backdrop="static">
        <div class="modal-dialog  modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title pl-3">
                        <a href="#myModal1" id="goTomodal1" class="btn-secondary btn" data-toogle="modal">Редактировать запись1</a>
                    </p>
                    <p class="modal-title pl-3">
                        <a href="#myModal2"  id="goTomodal2" class="btn-secondary btn" data-toogle="modal">Редактировать запись2</a>
                    </p>
                    <p class="modal-title pl-3">
                        <a href="#myModal3"  id="goTomodal3" class="btn-secondary btn" data-toogle="modal">Редактировать запись3</a>
                    </p>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <button type="button"><a></a></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-5">
                                <div class="col-12">
                                    <h5>ФИО пациента</h5>
                                    <input>
                                </div>
                                <div class="col-12">
                                    <h5>День приема</h5>
                                    <input>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <h5>Время начала</h5>
                                    </div>
                                    <div class="col-6">
                                        <h5>Время окончания</h5>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <h5>День рождения</h5>
                                    <input>
                                </div>
                            </div>
                            <div class="col-2"></div>
                            <div class="col-5">
                                <div class="col-12">
                                    <h5>Номер телефона</h5>
                                    <input>
                                </div>
                                <div class="col-12">
                                    <h5>Врач</h5>
                                    <input>
                                </div>
                                <div class="col-12">
                                    <h5>Жалоба</h5>
                                    <input>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    <button type="button" class="btn btn-primary">Сохранить изменения</button>
                </div>
            </div>
        </div>
    </div>
    <div id="myModal2" class="modal fade" data-backdrop="static">
        <div class="modal-dialog  modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>FFFFFFFFFFF</h5>
                    <p class="modal-title pl-3">
                        <a href="#myModal1" id="goTomodal1" class="btn-secondary btn" data-toogle="modal">Редактировать запись1</a>
                    </p>
                    <p class="modal-title pl-3">
                        <a href="#myModal2"  id="goTomodal2" class="btn-secondary btn" data-toogle="modal">Редактировать запись2</a>
                    </p>
                    <p class="modal-title pl-3">
                        <a href="#myModal3"  id="goTomodal3" class="btn-secondary btn" data-toogle="modal">Редактировать запись3</a>
                    </p>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <p>12312312412412412412</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    <button type="button" class="btn btn-primary">Сохранить изменения</button>
                </div>
            </div>
        </div>
    </div>
    <div id="myModal3" class="modal fade" data-backdrop="static">
        <div class="modal-dialog  modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>FFFFFFFFFFF</h5>
                    <p class="modal-title pl-3">
                        <a href="#myModal1" id="goTomodal1" class="btn-secondary btn" data-toogle="modal">Редактировать запись1</a>
                    </p>
                    <p class="modal-title pl-3">
                        <a href="#myModal2"  id="goTomodal2" class="btn-secondary btn" data-toogle="modal">Редактировать запись2</a>
                    </p>
                    <p class="modal-title pl-3">
                        <a href="#myModal3"  id="goTomodal3" class="btn-secondary btn" data-toogle="modal">Редактировать запись3</a>
                    </p>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <p>12312312412412412412</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    <button type="button" class="btn btn-primary">Сохранить изменения</button>
                </div>
            </div>
        </div>
    </div>
    <!--
    <p>2. Открытие модального окна с помощью JavaScript</p>
    <p><a href="#myModal2" id="btn2" class="btn btn-primary">Открыть модальное окно 2</a></p>
    <div id="myModal2" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Заголовок модального окна 2</h4>
                </div>
                <div class="modal-body">
                    Содержимое модального окна 2...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    <button type="button" class="btn btn-primary">Сохранить изменения</button>
                </div>
            </div>
        </div>
    </div>

    <p>3. Изменение размеров модального окна.</p>
    <p>
        <button class="btn btn-primary" data-toggle="modal" data-target="#largeModal">Открыть ширикое модальное окно
        </button>
    </p>
    <p>
        <button class="btn btn-primary" data-toggle="modal" data-target="#smallModal">Открыть узкое модальное окно
        </button>
    </p>
    <div id="largeModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Заголовок модального окна</h4>
                </div>
                <div class="modal-body">
                    Содержимое модального окна...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    <button type="button" class="btn btn-primary">Сохранить изменения</button>
                </div>
            </div>
        </div>
    </div>
    <div id="smallModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Заголовок модального окна</h4>
                </div>
                <div class="modal-body">
                    Содержимое модального окна...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    <button type="button" class="btn btn-primary">Сохранить изменения</button>
                </div>
            </div>
        </div>
    </div>
    <hr>
    -->
</div>


<script src="../../jquery/jquery.js"></script>
<script src="../../js/bootstrap.js"></script>
<script src="../../js/popper.js"></script>
<script>
    $("#myModal2").click(function () {
        alert("AAAAAAAAAAAAA");
    })
</script>
</body>
</html>
