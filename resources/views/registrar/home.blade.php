<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Page</title>
</head>
<body>
    <nav>
    <img src="https://th.bing.com/th/id/R.168866fc5a50dcbdc42819a1d911702b?rik=kQiHIkuupkBn6g&riu=http%3a%2f%2fwww.ets-tabib.com%2fwp-content%2fuploads%2f2016%2f08%2fLIU_Logo.png&ehk=BzAl%2b2%2bfXEpNP6NJWlA1TTpM7bfTN%2bvDRJOFc03tdq8%3d&risl=&pid=ImgRaw&r=0" class="w-20 h-20" alt="Logo">
    <div class="registrar-info">
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
    </nav>
    <div class="navbar">
   </div>

    @include('registrar.css')
    @include('registrar.sidebar')
    @include('registrar.script')
</body>
</html>
