document.addEventListener('DOMContentLoaded', function() {
    const navLinks = document.querySelectorAll('nav ul li a');

    // Hover effect for nav links
    navLinks.forEach(link => {
        link.addEventListener('mouseover', function() {
            this.style.color = '#ff7e5f'; // Warna merah muda saat dihover
        });

        link.addEventListener('mouseout', function() {
            this.style.color = '#ffffff'; // Warna putih saat tidak dihover
        });
    });

    // Dropdown functionality
    const profileButton = document.getElementById('profileButton');
    const dropdown = document.getElementById('dropdown');

    profileButton.addEventListener('click', function() {
        dropdown.classList.toggle('hidden');
    });

    // Close dropdown if clicked outside
    window.addEventListener('click', function(event) {
        if (!event.target.matches('#profileButton') && !event.target.closest('#dropdown')) {
            dropdown.classList.add('hidden');
        }
    });

    // Initialize FullCalendar
    const calendarEl = document.getElementById('calendar');
    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        events: [
            // Contoh event
            { title: 'Event 1', start: '2025-02-03' },
            { title: 'Event 2', start: '2025-02-07', end: '2025-02-10' }
        ]
    });
    calendar.render();
});
