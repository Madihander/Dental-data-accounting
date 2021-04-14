function OnClick123() {
    let date = '13.04.2021';
    $.ajax({
        url: '/123.php',
        data: {date: date},
        type: 'POST',
        dataType: 'JSON',
        success: function (data) {
            alert('123');
            console.log(data);
            for (let index = 0; index < data.length; ++index) {
                let obj = data[index];
                $('#fullName').html(obj.fullName);
                $('#phoneNumber').html(obj.phoneNumber);
            }
        },
        error: function (data) {
            alert('NOT WORK');
        }
    })
}