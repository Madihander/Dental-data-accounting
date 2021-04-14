$(document).ready(function(){
    let submit = $('#submit');
    submit.click(function (event) {
        event.preventDefault();

        let number = $('#number');
        let word = $('#word');
        let video = $('#video');
        let book = $('#book');

        $.ajax({
            type: "POST",
            url: "form_hardlend.php",
            processData: false,

            beforeSend: function () {
                alert('Wait Please');
            },
            success: function (data) {
                console.log(data);
            },
            error: function () { // 5xx
                console.log('ERROR');

            },
            complete: function () {
                console.log('COMPLETE');

            },

        })
    });
});