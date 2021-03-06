<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Sign In</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="css/sign.css" rel="stylesheet">
    <link rel="stylesheet" href="css/library/placeholder-animate.css">
</head>
<body>
<div class="container-fluid d-flex h-100 justify-content-center align-content-center align-items-center">
    <div class="row">
        <div class="col-12">
            <form class=" mt-2 mb-2 p-5">
                <div class="logo d-flex justify-content-center pb-2">
                    <svg style="width: 96px;height: 96px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <g fill='#9C8437'>
                            <path d="M22 12c0-1.5-1.8-2.6-4.3-3.3.7-2.5.6-4.6-.7-5.4-1-.6-2.5-.1-4.1 1.2-.3.2-.6.5-.9.8-.3-.3-.6-.6-.9-.8C9.5 3.2 8 2.8 7 3.3c-1.3.8-1.4 2.9-.7 5.4C3.8 9.4 2 10.5 2 12s1.8 2.6 4.3 3.3c-.7 2.5-.6 4.6.7 5.4.3.2.6.3 1 .3.9 0 2-.5 3.1-1.5.3-.2.6-.5.9-.8.3.3.6.6.9.8 1.2 1 2.2 1.5 3.1 1.5.4 0 .7-.1 1-.3 1.3-.8 1.4-2.9.7-5.4 2.5-.7 4.3-1.8 4.3-3.3zm-8.5-6.7c1-.8 1.8-1.2 2.5-1.2.2 0 .4 0 .5.1.7.4.9 2 .3 4.3-.8-.2-1.6-.3-2.5-.4-.5-.7-1-1.4-1.6-2 .3-.3.6-.5.8-.8zm2.4 7.9c.2.5.4 1 .5 1.4-.5.1-1 .2-1.5.2.2-.3.3-.5.5-.8.2-.3.4-.6.5-.8zm-1.3.3c-.3.5-.6 1-.9 1.4-.5.1-1.1.1-1.7.1s-1.2 0-1.7-.1c-.3-.4-.6-.9-.9-1.4-.3-.5-.6-1-.8-1.5.2-.5.5-1 .8-1.5.3-.5.6-1 .9-1.4.5-.1 1.1-.1 1.7-.1s1.2 0 1.7.1c.3.5.6.9.9 1.4.3.5.6 1 .8 1.5-.2.5-.5 1-.8 1.5zM12 17.2c-.3-.4-.6-.8-1-1.2h2c-.4.4-.7.8-1 1.2zM8.5 14c.2.3.3.6.5.8-.5-.1-1-.1-1.5-.2.2-.5.3-.9.5-1.4.2.2.4.5.5.8zm-.4-3.2c-.2-.5-.4-1-.5-1.4.4-.1.9-.2 1.4-.2-.1.2-.3.5-.5.8-.1.3-.3.6-.4.8zm3.9-4c.3.4.6.8 1 1.2h-2c.4-.4.7-.8 1-1.2zm3.5 3.2c-.2-.3-.3-.6-.5-.8.5.1 1 .1 1.5.2-.2.5-.3.9-.5 1.4-.2-.2-.4-.5-.5-.8zm-8-5.8c.1-.1.3-.1.5-.1.6 0 1.5.4 2.5 1.2.3.2.6.5.8.8-.5.6-1.1 1.3-1.6 2-.8.1-1.7.2-2.5.4-.6-2.3-.4-3.9.3-4.3zM3 12c0-.9 1.3-1.8 3.6-2.4l.9 2.4c-.4.8-.7 1.6-.9 2.4C4.3 13.8 3 12.9 3 12zm7.5 6.7c-1.3 1-2.4 1.5-3 1.1-.7-.4-.9-2-.3-4.3.8.2 1.6.3 2.5.4.5.7 1 1.4 1.6 2-.3.3-.6.5-.8.8zm6 1.1c-.6.3-1.7-.1-3-1.1-.3-.2-.6-.5-.8-.8.5-.6 1.1-1.3 1.6-2 .9-.1 1.7-.2 2.5-.4.6 2.3.4 3.9-.3 4.3zm.9-5.4l-.9-2.4c.4-.8.7-1.6.9-2.4 2.2.6 3.6 1.5 3.6 2.4s-1.3 1.8-3.6 2.4z"></path>
                            <circle cx="12" cy="12" r="1"></circle>
                        </g>
                    </svg>
                </div>
                <div class="d-flex justify-content-center pb-2 mb-2">
                    <h5>Авторизоваться в Avior MK</h5>
                </div>
                <div class="field mb-1">
                    <input class="_req _login" type="text" required autocomplete="off" id="login">
                    <label for="login" title="Логин" data-title="Логин"></label>
                </div>

                <div class="field mb-1">
                    <input class="_req _pass" type="text" required autocomplete="off" id="password">
                    <label for="password" title="Пароль" data-title="Пароль"></label>
                </div>

                <button id="auth_btn" class="btn btn-block btn-orange">Авторизироватся</button>
                <button class="btn btn-block btn-purple"><a href="sign_up.html">Зарегистрироватся</a></button>
                <!--                <div class="form-group">-->
                <!--                    <label for="login">Логин</label>-->
                <!--                    <input id="login" class="form-control" placeholder="Введите свой логин">-->
                <!--                </div>-->
                <!--                <div class="form-group">-->
                <!--                    <label for="pass"> Пароль</label>-->
                <!--                    <input id="pass" class="form-control" placeholder="Введите свой пароль">-->
                <!--                </div>-->
            </form>
        </div>
    </div>
</div>
<script src="jquery/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/popper.js"></script>
<script src="js/sign_in.js"></script>
<!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
<script src="jquery/jquery-ui.js"></script>
</body>
</html>