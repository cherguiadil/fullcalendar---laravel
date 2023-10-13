<!DOCTYPE html>
<html>
<head>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.min.js"></script>

</head>
<body>
    <div id="calendar"></div>

<!-- Add an "Add Event" button -->
<button id="addEventButton" class="btn btn-primary">Add Event</button>

<!-- Create a modal for adding events -->
<div class="modal fade" id="addEventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="eventForm">
                    @csrf
                    <div class="form-group">
                        <label for="title">Event Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="start">Start Date and Time</label>
                        <input type="datetime-local" class="form-control" id="start" name="start">
                    </div>
                    <div class="form-group">
                        <label for="end">End Date and Time</label>
                        <input type="datetime-local" class="form-control" id="end" name="end">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveEventButton">Save Event</button>
            </div>
        </div>
    </div>
</div>


    <script>

        function render() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: "{{ route('calendar.events') }}",
            });
            calendar.render();
        }
        document.addEventListener('DOMContentLoaded', function() {
            render()
        });


        document.getElementById('saveEventButton').addEventListener('click', function() {

    // Get the form data
    var form = document.getElementById('eventForm');
    var formData = new FormData(form);

    // Send a POST request to create the event
    fetch("{{ route('calendar.store') }}", {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        if (data.message) {
            render();
        } else {
            alert('Event creation failed. Please check your input.');
        }
    })
    .catch(error => {
        alert(error);
    });
});


    </script>
</body>
</html>
