<?php
?>
<!--https://www.youtube.com/watch?v=yZrNIo6DsyQ
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="data.css">
    <link rel="stylesheet" href="datapick.css">
</head>
<body>
<div id="datapicker"></div>
<script src="datapickk.js"></script>
<script>
    let highlight = {
        start: new Date(2015, 6, 13),
        end: new Date(2015, 6, 19),
        backgroundColor: '#3faa56',
        color: '#ffffff'
        //legend:'CSS onf.'
    };
    let highlight2 = {
        dates: [
            {
                start: new Date(2015, 6, 6),
                end: new Date(2015, 6, 7),
            },
            {
                start: new Date(2015, 6, 22),
                end: new Date(2015, 6, 23),
            }
        ],
        backgroundColor: '#e99c00',
        color: '#ffffff'
        //legend:'Holidays'
    };
    let datapicker = new Datepickk({
        container: document.querySelector('#datapicker'),
        //inline:true,
        range: true
        highlight: [highlight, highlight2]
    });
    datepicker.setDate = new Date(2015, 6, 1)
</script>
</body>
</html>
