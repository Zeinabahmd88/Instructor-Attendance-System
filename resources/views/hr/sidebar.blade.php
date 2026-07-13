<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Status Update</title>
</head>
<body>
    <div class="sidebar" id="sidebar">
        <span class="toggle-btn" onclick="toggleSidebar()">☰</span>
        <h2 class="doctor-btn" onclick="toggleDoctorOptions()">Attendance</h2>
        <div id="doctorOptions" class="doctor-options" style="display: none;">
            <a href="#" onclick="showTable('absent')">Absent Doctors</a>
            <a href="#" onclick="showTable('present')">Present Doctors</a>
            <a href="#" onclick="showTable('request')">Requests</a>

        </div>
    </div>
    <div class="table-container">
    @include('hr.absent')
        @include('hr.present')
        @include('hr.request')
 </div>
    <script>

    </script>
</body>
</html>