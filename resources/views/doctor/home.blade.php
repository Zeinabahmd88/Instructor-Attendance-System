<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Home</title>
    @include('doctor.css')
</head>
<body>
<nav>
<img src="https://th.bing.com/th/id/R.168866fc5a50dcbdc42819a1d911702b?rik=kQiHIkuupkBn6g&riu=http%3a%2f%2fwww.ets-tabib.com%2fwp-content%2fuploads%2f2016%2f08%2fLIU_Logo.png&ehk=BzAl%2b2%2bfXEpNP6NJWlA1TTpM7bfTN%2bvDRJOFc03tdq8%3d&risl=&pid=ImgRaw&r=0" class="w-20 h-20" alt="Logo">
    <div class="doctor-info">
        @if(auth()->user())
            <span>{{ auth()->user()->name }}</span>
            <br>
            <span>{{ auth()->user()->email }}</span>
        @endif
    </div>
    <div class="current-date" id="currentDate"></div>
    <form action="{{ route('logout') }}" method="POST" class="logout">
        @csrf
        <button type="submit">Logout</button>
    </form>
    <div class="current-date" id="currentDate"></div>

</nav>
<div class="navbar">
</div>
<h1>Welcome, Dr. {{ auth()->user()->name }}</h1>

@if($absenceRequest)
    <h2>Please provide the reason for your absence and if any makeup session :</h2>
    <form action="{{ route('submit.absent.reason', $absenceRequest->id) }}" method="POST"  onsubmit="showAlert()">
        @csrf
        <textarea name="reason" rows="4" cols="50" required></textarea>
        <br>
        <button type="submit">Submit</button>
    </form>
@endif
</body>
</html>
<script>
    function showAlert() {
        alert("sent successfully!");
    }
    document.addEventListener('DOMContentLoaded', function() {
        displayCurrentDate();
    });

    function displayCurrentDate() {
        var currentDate = new Date().toLocaleDateString();
        document.getElementById("currentDate").innerText = currentDate;
    }
</script>