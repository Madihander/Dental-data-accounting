<?php
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="../../css/bootstrap.css">
</head>
<body>
<div class="container">
    <p>
        <button type="button" class="btn btn-primary" data-toogle="modal" data-target="#modal_1">
            Открыть 1 модальное окно
        </button>
    </p>
</div>

<div class="modal fade" id="modal_1" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Заголовок модального окна 1</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="закрыть">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <p><a href="#modal_1">Открыть 1 модальное око</a></p>
                <p><a href="#modal_2">Открыть 2 модальное окно</a></p>
                <p><a href="#modal_3">Открыть 3 модальное окно</a></p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_2" tabindex="-1" role="dialog">
    <div class="modal-dialog  modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Заголовок модального окна 1</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="закрыть">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <p><a href="#modal_1">Открыть 1 модальное око</a></p>
                <p><a href="#modal_2">Открыть 2 модальное окно</a></p>
                <p><a href="#modal_3">Открыть 3 модальное окно</a></p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_3" tabindex="-1" role="dialog">
    <div class="modal-dialog  modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Заголовок модального окна 1</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="закрыть">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <p><a href="#modal_1">Открыть 1 модальное око</a></p>
                <p><a href="#modal_2">Открыть 2 модальное окно</a></p>
                <p><a href="#modal_3">Открыть 3 модальное окно</a></p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>

<script src="../../jquery/jquery.js"></script>
<script src ="../../js/bootstrap.js"></script>
<script>
    $(function () {
        $("#btn2").click(function () {
            $("#myModal2").modal('show');
        });
    });
</script>
</body>
</html>
