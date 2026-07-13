<script>
    document.addEventListener('DOMContentLoaded', function() {
        displayCurrentDate();
    });

    function displayCurrentDate() {
        var currentDate = new Date().toLocaleDateString();
        document.getElementById("currentDate").innerText = currentDate;
    }

    function showTable(type) {
    if (type === 'absent') {
        document.getElementById('absentDoctorTable').style.display = 'block';
        document.getElementById('presentDoctorTable').style.display = 'none';
        document.getElementById('requestAbsentDoctorTable').style.display = 'none';

    } else if (type === 'present') {
        document.getElementById('absentDoctorTable').style.display = 'none';
        document.getElementById('presentDoctorTable').style.display = 'block';
        document.getElementById('requestAbsentDoctorTable').style.display = 'none';

    }
    else if (type === 'request') {
        document.getElementById('requestAbsentDoctorTable').style.display = 'block';
        document.getElementById('presentDoctorTable').style.display = 'none';
        document.getElementById('absentDoctorTable').style.display = 'none';

    }
}


function toggleStatus(doctorId) {
    const statusCell = document.querySelector(`.doctor-status[data-id="${doctorId}"]`);
    if (!statusCell) return;

    const currentStatus = statusCell.textContent.trim();
    const newStatus = currentStatus === 'present' ? 'absent' : 'present';
    statusCell.textContent = newStatus;

    // Update the status in the table attendance
    const attendanceStatusCell = document.querySelector(`.attendance-status[data-id="${doctorId}"]`);
    if (attendanceStatusCell) {
        attendanceStatusCell.textContent = newStatus;
    }

    // Send a POST request to update the doctor status in the database
    fetch('/update-doctor-status', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Replace with your CSRF token or remove if not needed
        },
        body: JSON.stringify({
            doctorId: doctorId,
            newStatus: newStatus
        })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Failed to update doctor status');
        }
        // Optionally handle success response
    })
    .catch(error => {
        console.error('Error:', error);
        // Optionally handle error
    });
}

</script>