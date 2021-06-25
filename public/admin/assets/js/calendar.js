window.onload = () => {

    let calendarElt = document.querySelector('#calendrier')

    let calendar = new FullCalendar.Calendar(calendarElt, {

        initialView: 'dayGridMonth',
        locale: 'Fr',
        timeZone: 'Europe/Paris',
    });

    calendar.render();
}