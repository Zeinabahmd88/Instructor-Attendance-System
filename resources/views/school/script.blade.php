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
        document.getElementById('requestAbsentDoctorTable').style.display = 'none';

    }
    else if (type === 'request') {
        document.getElementById('requestAbsentDoctorTable').style.display = 'block';
        document.getElementById('absentDoctorTable').style.display = 'none';

    }
}
function showAlert() {
        alert("Absent doctors sent to him successfully!");
    }
    function showAlert1() {
        alert("send  to  hr successfully!");
    }
</script>