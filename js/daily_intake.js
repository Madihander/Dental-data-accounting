$(document).ready(function () {

    $('#submit').click(function () {
        let number = $('#number').val();
        let surname = $('#surname').val();
        let birthday = $('#datepicker').val();
        let diagnosis = $('#diagnosis').val();
        let job = $('#job').val();

        $.ajax({
            url: "../php/daily_handler.php",
            type: "POST",
            data: {
                'surname': surname,
                'diagnosis': diagnosis,
                'job': job
            },
            beforeSend: function () {
                alert('Wait Please');
            },
            success: function () {
                console.log(surname);
                console.log('good')
            },
            error: function (data) {
                console.log('ERROR');
                console.log(data)
            },
            complete: function () {
                console.log('COMPLETE');
            },
        })
    })
});