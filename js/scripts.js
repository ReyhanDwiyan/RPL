document.addEventListener('DOMContentLoaded', function() {
    const locationForm = document.getElementById('locationForm');
    const scheduleForm = document.getElementById('scheduleForm');
    const reportForm = document.getElementById('reportForm');

    locationForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(locationForm);
        fetch('actions/location.php', {
            method: 'POST',
            body: formData
        }).then(response => response.json())
          .then(data => {
              if (data.success) {
                  location.reload();
              } else {
                  alert(data.message);
              }
          });
    });

    scheduleForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(scheduleForm);
        fetch('actions/schedule.php', {
            method: 'POST',
            body: formData
        }).then(response => response.json())
          .then(data => {
              if (data.success) {
                  location.reload();
              } else {
                  alert(data.message);
              }
          });
    });

    reportForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(reportForm);
        fetch('actions/report.php', {
            method: 'POST',
            body: formData
        }).then(response => response.json())
          .then(data => {
              if (data.success) {
                  location.reload();
              } else {
                  alert(data.message);
              }
          });
    });
});

function editLocation(id) {
    fetch(`actions/location.php?id=${id}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('locationId').value = data.id;
            document.getElementById('locationName').value = data.name;
            document.getElementById('locationAddress').value = data.address;
        });
}

function deleteLocation(id) {
    if (confirm('Apakah Anda yakin ingin menghapus lokasi ini?')) {
        fetch(`actions/location.php?id=${id}&delete=1`, {
            method: 'POST'
        }).then(response => response.json())
          .then(data => {
              if (data.success) {
                  location.reload();
              } else {
                  alert(data.message);
              }
          });
    }
}

function editSchedule(id) {
    fetch(`actions/schedule.php?id=${id}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('scheduleId').value = data.id;
            document.getElementById('scheduleLocation').value = data.location_id;
            document.getElementById('scheduleDate').value = data.date;
            document.getElementById('scheduleTime').value = data.time;
        });
}

function deleteSchedule(id) {
    if (confirm('Apakah Anda yakin ingin menghapus jadwal ini?')) {
        fetch(`actions/schedule.php?id=${id}&delete=1`, {
            method: 'POST'
        }).then(response => response.json())
          .then(data => {
              if (data.success) {
                  location.reload();
              } else {
                  alert(data.message);
              }
          });
    }
}

function deleteReport(id) {
    if (confirm('Apakah Anda yakin ingin menghapus laporan ini?')) {
        fetch(`actions/report.php?id=${id}&delete=1`, {
            method: 'POST'
        }).then(response => response.json())
          .then(data => {
              if (data.success) {
                  location.reload();
              } else {
                  alert(data.message);
              }
          });
    }
}

function logout() {
    fetch('actions/logout.php')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = 'login.php';
            } else {
                alert(data.message);
            }
        });
}
