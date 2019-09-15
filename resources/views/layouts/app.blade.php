<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Login') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bck.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Livvic&display=swap" rel="stylesheet">

</head>

<body>
    <div id="app">

        @guest
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm custon-nav nav-dark-blue">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    [mock]Bank
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
        </nav>
        <main class="py-4">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        {{-- <div class="card card-border">
                            <div class="card-header dashboard-table custom-card-title">@yield('title')</div> --}}

                        {{-- <div class="card-body"> --}}
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        @yield('content')
        </main>
        @endif

        @else



        <div>
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm custon-nav nav-dark-blue">
                <div class="container">

                    <a class="mock-logo brand-color" href='/home'>
                        [mock]Bank <div id="time"></div>
                    </a>


                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto custom-auto-navbar">
                            <!-- Authentication Links -->

                            <li>
                                @if($users->photo_dir != null)
                                <a href="/home">
                                    <img class="avatar" height="50px"
                                        src="{{asset("storage/photos/" . Auth::user()->photo_dir)}}" @endif </li> <li
                                        class="nav-item dropdown">
                                </a>
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container">

                <div class="main-left">
                    <div class="sidenav-blue ">
                        <br>
                        <div>
                            <div class="subdivs">
                                <a class="side-bar-links" href="/home">
                                    <i class="material-icons md-36">
                                        assignment_ind
                                    </i><br>
                                    Dashboard
                                </a>
                            </div>
                            <br>




                            <div class="subdivs">
                                <a class="side-bar-links" href="/sendMoney">
                                    <i class="material-icons md-36">
                                        send
                                    </i><br>
                                    Transfer
                                </a>
                            </div>

                            <br>
                            <div class="subdivs">
                                <a class="side-bar-links" href="/exchange">
                                    <i class="material-icons md-36">
                                        euro_symbol
                                    </i><br>
                                    Exchange
                                </a>
                            </div>
                            <br>
                            <div class="subdivs">
                                <a class="side-bar-links" href="/addMoney">
                                    <i class="material-icons md-36">
                                        trending_up
                                    </i><br>
                                    Increase Funds
                                </a>
                            </div>
                        </div>


                        <br>
                        <div class="subdivs">
                            <a class="side-bar-links" href="/history">
                                <i class="material-icons md-36">
                                    history
                                </i><br>
                                History
                            </a>
                        </div>
                 
                        <br>
                        <div class="subdivs">
                            <a class="side-bar-links" href="/photoUpload">
                                <i class="material-icons md-36">
                                    insert_photo
                                </i><br>
                                Photo Upload
                            </a>
                        </div>
                        <br>
                        <div class="subdivs">
                            <a class="side-bar-links" href="/changePassword">
                                <i class="material-icons md-36">
                                    fingerprint
                                </i><br>
                                Change Password
                            </a>
                        </div>

                    </div>
                </div>

                <div class="second-container">

                    <main class="py-4">
                        <div class="container-fluid">
                            <div class="row justify-content-center">
                                <div class="col-lg">
                                    {{-- <div class="card card-border"> --}}
                                    <div class="card-header dashboard-table custom-card-title">@yield('title')</div>

                                    <div class="card-body">
                                        @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    </div>
                                    @endif
                                    @yield('content')
                    </main>
                    @endguest
                    </ul>
                </div>
            </div>

            {{-- <main class="py-4">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card card-border">
                        <div class="card-header dashboard-table custom-card-title">@yield('title')</div>

                        <div class="card-body">
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
        </div>
        @endif
        @yield('content')
        </main> --}}
    </div>
</body>

<script>
    function checkTime(i) {
      if (i < 10) {
        i = "0" + i;
      }
      return i;
    }
    
    function startTime() {
      var today = new Date();
      var h = today.getHours();
      var m = today.getMinutes();
      var s = today.getSeconds();
      // add a zero in front of numbers<10
      m = checkTime(m);
      s = checkTime(s);
      document.getElementById('time').innerHTML = h + ":" + m + ":" + s;
      t = setTimeout(function() {
        startTime()
      }, 500);
    }
    startTime();
</script>

</html>