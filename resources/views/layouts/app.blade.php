<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Thimes</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">Thimes</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a href="{{ route('clubs.index') }}" class="nav-link">Clubs</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <form class="form-inline my-2 my-lg-0" method="get" action="{{ route('clubs.search') }}">
                            <input class="form-control mr-sm-2" type="Chercher" name="query" placeholder="Nom du club" aria-label="Chercher">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Chercher un club</button>
                        </form>
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('navbar.login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('navbar.register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('settings.edit') }}">Paramètres</a>
                                    <div class="dropdown-divider"></div>
                                    @if (Auth::user()->getStatus() == 'admin')
                                        <a class="dropdown-item text-muted disabled">Administration</a>
                                        <a href="#" class="dropdown-item">Utilisateurs</a>
                                        <a href="#" class="dropdown-item">Clubs</a>
                                        <a class="dropdown-item" href="{{ route('administration.force.update') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('force-update-form').submit();">Forcer la mise à jour</a>
                                        <form id="force-update-form" action="{{ route('administration.force.update') }}" method="POST">
                                            @csrf()
                                        </form>
                                    @elseif (empty(Auth::user()->getClub()))
                                    <a class="dropdown-item" href="{{ route('club.create') }}">Créer un club</a>
                                    @else
                                    <a class="dropdown-item" href="{{ route('club.index') }}">Club</a>
                                    <a class="dropdown-item" href="{{ route('clubs.rss', Auth::user()->getClub()->getId()) }}">Flux RSS</a>
                                    @endif
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('navbar.Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="row">
            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show col-12">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{ $message }}
                </div>
            @endif

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show col-12">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{ $message }}
                </div>
            @endif

            @if ($message = Session::get('warning'))
                <div class="alert alert-warning alert-dismissible fade show col-12">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{ $message }}
                </div>
            @endif

            @if ($message = Session::get('info'))
                <div class="alert alert-info alert-dismissible fade show col-12">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{ $message }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show col-12">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

</body>
</html>
