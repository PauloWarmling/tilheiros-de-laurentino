<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trilheiros de Laurentino</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="/public/jquery-mask-plugin.js" defer></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js" integrity="sha256-u7MY6EG5ass8JhTuxBek18r5YG6pllB9zLqE4vZyTn4=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/inputmask.min.js') }}"></script>

    @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body>
    <header>
        <nav class="main-menu container">
            <a class="brand" href="{{ route('index') }}">
                <img src="{{URL::asset('/image/logo.png')}}" class='brand' alt="Logo">
            </a>
            <div class="menu" id="navbarNav">
                <ul>
                    <li >
                        <a class="nav-link" href="{{ route('index') }}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('pessoa.index') }}">Pessoas</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('eventos.index') }}">Eventos</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('participacoes.index') }}">Participação</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
