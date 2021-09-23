<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Boolbblica') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header class="container container-custom">
        <img src="/img/logo_boolbblica.png" alt="">
    </header>

    <div class="container">

        <nav class=" row navbar navbar-expand-md navbar-light bg-white">
            <a class="navbar-brand" href="#">Articoli</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
  
            <div class="collapse navbar-collapse" id="navbarsExample04">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#"> Link 1 </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#"> Link 2 </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#"> Link 3 </a>
                    </li>
                    
                </ul>
                <form class="form-inline my-2 my-md-0">
                    <input class="form-control" type="text" placeholder="Search">
                </form>
            </div>
        </nav>
      
    </div>


    <div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
