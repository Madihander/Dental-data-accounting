$('#auth_btn').click(function (e) {
    e.preventDefault();
    let login = $('#login').val();
    let pass = $('#password').val();
    let error = verifyData(login, pass);
    if (error !== 0) {
        alert('Впишите данные в поля')
        $('._req').css('border', '1px solid red');
    } else {
        $.ajax({
            url: 'php/sign/sign_in_handle.php',
            type: 'POST',
            dataType: 'JSON',
            data: {
                login: login,
                pass: pass,
            },
            before: function () {
                alert("Запрос Отправлен");
            },
            success: function (data) {
                if (data.status === '200' && data.error === '00') {
                    alert("Запрос принят и успешно обработан");
                    document.location.href="http://dental-data-accounting.kz/journals/main_menu.php"
                    console.log(data);
                } else {
                    alert("Запрос принят, но неудачно обработан");
                    console.log(data);

                }
            },
            error: function (data) {
                console.log(data);
                alert("ERROR.Запрос принят, но неудачно обработан");
            }

        });
    }

});

function verifyData(login, pass) {
    let error = 0
    if (!login) error++;
    if (!pass) error++
    return error;
}