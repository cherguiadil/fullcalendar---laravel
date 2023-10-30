<!DOCTYPE html>
<html>

<head>
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.css" rel="stylesheet"> --}}
    <link rel='stylesheet' href='https://fullcalendar.io/releases/core/4.0.1/main.min.css'>
    <link rel='stylesheet' href='https://fullcalendar.io/releases/timeline/4.0.1/main.min.css'>
    <link rel='stylesheet' href='https://fullcalendar.io/releases/resource-timeline/4.0.1/main.min.css'>
</head>

<body>
    <div id='calendar'></div>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src='https://fullcalendar.io/releases/core/4.0.1/main.min.js'></script>
    <script src='https://fullcalendar.io/releases/interaction/4.0.1/main.min.js'></script>
    <script src='https://fullcalendar.io/releases/timeline/4.0.1/main.min.js'></script>
    <script src='https://fullcalendar.io/releases/resource-common/4.0.1/main.min.js'></script>
    <script src='https://fullcalendar.io/releases/resource-timeline/4.0.1/main.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['resourceTimeline'],
                timeZone: 'UTC',
                initialView: 'resourceTimelineDay',
                aspectRatio: 2.5,
                headerToolbar: {
                    left: 'prev,next',
                    center: 'title',
                    right: 'resourceTimelineDay,resourceTimelineWeek,resourceTimelineMonth'
                },
                editable: true,
                resourceLabelText: 'Rooms',
                resources: 'https://fullcalendar.io/demo-resources.json?with-nesting&with-colors',
                events: 'https://fullcalendar.io/demo-events.json?single-day&for-resource-timeline'
            });

            calendar.render();
        });
    </script>
</body>

</html>
