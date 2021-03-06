<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{URL::asset('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css')}}" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{URL::asset('index.css')}}">
    <title>Jídelna</title>
</head>
<body>
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
    @if (!Auth::guard("administrator")->check())
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{URL::asset('logo.png')}}" alt="Logo" class="logo">
        </a>
    @else
        <a class="navbar-brand" href="{{ url('adminIS') }}">
            <img src="{{URL::asset('logo.png')}}" alt="Logo" class="logo">
        </a>
    @endif
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            @if (!Auth::guard("administrator")->check())
                <a class="nav-item nav-link active" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
            @else
                <a class="nav-item nav-link active" href="{{ url('adminIS') }}">Home <span class="sr-only">(current)</span></a>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Zobraziť</a>
                    <div class="dropdown-menu">
                        <a href="{{ url('prehladUzivatelia') }}" class="dropdown-item">Užívateľov</a>
                        <a href="{{ url('prehladOperatori') }}" class="dropdown-item">Operátorov</a>
                        <a href="{{ url('prehladVodici') }}" class="dropdown-item">Vodičov</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Prevádzky</a>
                    <div class="dropdown-menu">
                        <a href="{{ url('prevadzky/create') }}" class="dropdown-item">Pridať novú prevádzku</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{ url('ukoncit') }}" class="nav-link">Ukončiť/Spustiť objednávky</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('planVodicov') }}" class="nav-link">Zostaviť plán vodičov</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link">Zákaznícka stránka</a>
                </li>

                <li class="nav-item ">
                    <!-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user("administrator") }} <span class="caret"></span>
                    </a> -->

                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('administrátor - Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('admin.logout.submit') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                </li>
            @endif
        </div>
</nav>

@yield('adminContent')

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
