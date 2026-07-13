<script>
    function displayCurrentDateAndTime() {
        var currentDate = new Date().toLocaleDateString();
        document.getElementById("currentDate").innerText = currentDate;
    }

    displayCurrentDateAndTime();

    function toggleSidebar() {
        var sidebar = document.getElementById("sidebar");
        if (sidebar.style.left === "-250px" || sidebar.style.left === "") {
            sidebar.style.left = "0";
        } else {
            sidebar.style.left = "-250px";
        }
    }

    function toggleStatus(doctorId, checkbox) {
        var statusCell = document.getElementById("status_" + doctorId);
        var currentStatus = statusCell.querySelector("span").innerText;
        var newStatus = currentStatus === "Present" ? "Absent" : "Present";
        statusCell.querySelector("span").innerText = newStatus;
        statusCell.querySelector("input[type=hidden]").value = newStatus;

        checkbox.checked = newStatus === "Present";
    }

    function filterByTime() {
        var selectedTime = document.getElementById("timeFilter").value;
        document.getElementById("selectedTimeInput").value = selectedTime;

        var rows = document.querySelectorAll("#doctorTable tbody tr");

        rows.forEach(function(row) {
            var rowTime = row.querySelector("td:nth-child(7)").innerText;
            if (selectedTime === "" || rowTime === selectedTime) {
                row.style.display = "table-row";
            } else {
                row.style.display = "none";
            }
        });
    }

    function showDoctors(block) {
        document.getElementById('doctorTableContainer').style.display = 'block';
        var doctorRows = document.querySelectorAll("#doctorTable tbody tr");
        doctorRows.forEach(function(row) {
            var blockCell = row.querySelector("td:nth-child(6)").innerText;
            if (blockCell === block) {
                row.style.display = "table-row";
            } else {
                row.style.display = "none";
            }
        });
    }
function filterBySection() {
    var selectedFloor = document.getElementById('floorFilter').value;
    var doctorRows = document.querySelectorAll('.doctorRow');
    doctorRows.forEach(function(row) {
        var section = row.querySelector('td:nth-child(5)').innerText;
        // Split the section string by non-digit characters and take the first element
        var floorNumber = parseInt(section.split(/\D+/)[0]);
        // Check if the floor number matches the selected floor or if no floor is selected
        if (selectedFloor === '' || floorNumber === parseInt(selectedFloor)) {
            row.style.display = "table-row";
        } else {
            row.style.display = "none";
        }
    });
}


    document.getElementById('attendanceForm').addEventListener('submit', function(event) {
        event.preventDefault();
        
        var selectedTime = document.getElementById('timeFilter').value;
        var selectedfloor = document.getElementById('floorFilter').value;

        if (!selectedTime ) {
            alert('Please select a time before submitting.');
            return;
        }

        var rows = document.querySelectorAll("#doctorTable tbody tr");
        rows.forEach(function(row) {
            var rowTime = row.querySelector("td:nth-child(7)").innerText;
            if (rowTime !== selectedTime) {
                row.querySelectorAll('input').forEach(function(input) {
                    input.disabled = true;
                });
            }

        });
        alert('Attendance Submitted Successfully.');

        event.target.submit();
    });document.addEventListener('click', function(event) {
        var sidebar = document.getElementById("sidebar");
        var toggleBtn = document.querySelector('.toggle-btn');
        var isClickInsideSidebar = sidebar.contains(event.target) || toggleBtn.contains(event.target);

        if (!isClickInsideSidebar && sidebar.style.left === "0px") {
            sidebar.style.left = "-250px";
        }
    });

</script>
