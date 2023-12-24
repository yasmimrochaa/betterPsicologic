// Executar quando o documento HTML for completamente carregado
document.addEventListener('DOMContentLoaded', function () {
    // Receber o SELETOR calendar do atributo id
    var calendarEl = document.getElementById('calendar');

    // Instanciar FullCalendar.Calendar e atribuir a variavel calendar
    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale : 'pt-br',
        initialDate: '2023-12-24',
        initialView: 'timeGridWeek',
        nowIndicator: true,
        // Criar o cabeçalho 
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },
        navLinks: true, // can click day/week names to navigate views
        editable: true,
        selectable: true,
        selectMirror: true,
        dayMaxEvents: true, // allow "more" link when too many events
        events: 'listarEvento.php'
    });

    calendar.render();
});

