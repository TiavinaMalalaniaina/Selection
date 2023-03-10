<<<<<<< Updated upstream

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: false,
        initialView: 'timeGridWeek',
        initialDate: '2023-01-12',
        dayHeaderContent: function(arg) {
            var date = arg.date;
            var day = date.getUTCDay();
            var weekdayNames = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche  '];
=======
function cal(data) {
    console.log(data)
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: false,
        initialView: 'timeGridWeek',
        initialDate: '2022-08-01',
        dayHeaderContent: function(arg) {
            var date = arg.date;
            var day = date.getUTCDay();
            var weekdayNames = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
>>>>>>> Stashed changes
            var html =  '<span class="entete-calendrier">' + weekdayNames[day] + '</span>';
            return {html: html};
          },
        slotLabelFormat: {
            hour: '2-digit',
            minute: '2-digit',
            hour12: false
        },
        allDaySlot: false,
        businessHours: true, // display business hours  
        editable: true,
        selectable: true,
<<<<<<< Updated upstream
        events: [
        {
            title: 'Business Lunch',
            start: '2023-01-03T13:00:00',
            constraint: 'businessHours'
        },
        {
            title: 'Meeting',
            start: '2023-01-13T11:00:00',
            constraint: 'availableForMeeting', // defined below
            color: '#257e4a'
        },
        {
            title: 'Conference',
            start: '2023-01-18',
            end: '2023-01-20'
        },
        {
            title: 'Party',
            start: '2023-01-29T20:00:00'
        },

        // areas where "Meeting" must be dropped
        {
            groupId: 'availableForMeeting',
            start: '2023-01-11T10:00:00',
            end: '2023-01-11T16:00:00',
            display: 'background'
        },
        {
            groupId: 'availableForMeeting',
            start: '2023-01-13T10:00:00',
            end: '2023-01-13T16:00:00',
            display: 'background'
        },

        // red areas where no events can be dropped
        {
            start: '2023-01-24',
            end: '2023-01-28',
            overlap: false,
            display: 'background',
            color: '#ff9f89'
        },
        {
            start: '2023-01-06',
            end: '2023-01-08',
            overlap: false,
            display: 'background',
            color: '#ff9f89'
        }
        ]
    });

    calendar.render();


});
=======
        events: data,
    });
    calendar.render();
}
function ululu(data){
    var ululu = document.getElementById("ululu");
    for (let i = 0; i < data.length; i++) {
        ululu.innerHTML += "<li><a href=\"#\" data-bs-toggle=\"modal\" onclick=\"updateFormValue('"+data[i].nom+"',"+data[i].id+")\"  data-bs-target=\"#exampleModal\">"+data[i].nom+"</a></li>"
    }
}
function sele(data){
    var sele = document.getElementById("sele")
    console.log(data.length)
    console.log(data[0])
    for (let i = 0; i < data.length; i++) {
        sele.innerHTML += "<option value=\""+data[i][0]+"\">"+data[i][1]+"</option>"
    }
}
function cc(data){
    var cc = document.getElementById("cc");
    cc.innerHTML = "<i class=\"far fa-clock clock\"></i> Vous aurez un cours de "+data.nom+" dans <span>"+data.diff.split('.')[0]+" min</span>";
}
>>>>>>> Stashed changes
