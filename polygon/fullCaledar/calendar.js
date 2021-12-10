document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: "ru",

        initialView: 'dayGridMonth',
        headerToolbar: {
            start: "prev next",
            center: "title",
            end: "dayGridMonth,timeGridWeek,timeGridDay",
        },
        firstDay: 1,
        editable: true,
        selectable: true,


    });
    calendar.render();
});
