<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='calendario/lib/main.css' rel='stylesheet' />
<script src='calendario/lib/main.js'></script>
<script src="calendario/lib/pt-br.js"></script>
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      themeSystem: 'bootstrap5',  
      initialView: 'dayGridMonth',
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      },
      height: 'auto',
      locale: 'pt-br',
      navLinks: true, // can click day/week names to navigate views
      selectable: true,
      selectMirror: true,
      nowIndicator: true,
      events: 'calendario/calendar_crud.php'
    });

    calendar.render();
  });

</script>
<style>

  #calendar {
    max-width: 1100px;
    margin: 0 auto;
  }

</style>
</head>
<body>

  <div id='calendar' class="mt-3"></div>

</body>
</html>
