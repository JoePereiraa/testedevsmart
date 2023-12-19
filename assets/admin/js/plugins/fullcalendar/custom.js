document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        locale: 'pt-br',
        // initialDate: '2023-12-15',

        navLinks: true, // can click day/week names to navigate views
        selectable: true,
        selectMirror: true,
       
        editable: true,
        dayMaxEvents: true, // allow "more" link when too many events
        events:'../../../../Controller/AppointmentController.php'
    });

    calendar.render();
})