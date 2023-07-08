<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ADMIN_SHOP</title>

    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{url('css/style.css')}}">

</head>

<body class="antialiased">
    <div>
        <nav>
          
            <a href="{{route('informatic.index')}}">Informatique</a>
            <a href="{{route('sport.index')}}">Sport&loisir</a>
            <a href="{{route('marche.index')}}">Super marchee</a>
           
        </nav>
    </div>
    @yield('content')

</body>

</html>