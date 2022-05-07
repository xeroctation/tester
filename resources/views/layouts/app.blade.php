<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        textarea:focus, input:focus{
            outline: none;
        }
        .main{
            height: 100vh; 
        }
    
        .bg{
            width: 100%;
            height: 100vh;
            background-image: url('/img/bg.jpg');
            background-size: contain;
            filter: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='a' x='0' y='0' width='1' height='1' color-interpolation-filters='sRGB'%3E%3CfeGaussianBlur stdDeviation='5' result='b'/%3E%3CfeMorphology operator='dilate' radius='4'/%3E %3CfeMerge%3E%3CfeMergeNode/%3E%3CfeMergeNode in='b'/%3E%3C/feMerge%3E%3C/filter%3E %3C/svg%3E#a");
            position: absolute;
            z-index: -1;
        }
        .flex{
            display: flex;
        }
        .library-bg{
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.342);
            color: rgb(207, 207, 207);
            margin: 0 auto;
            padding: 0px 200px;
        }
        .categories{
            justify-content: space-between;
        }
        .library{
            background-color: rgba(0, 0, 0, 0.418);
            height: 100vh;
            padding: 30px 40px;
        }
        h3{
            text-align: center;
            font-size: 2.4rem !important;
        }
        .category{
            position: relative;
        }
        .category:hover .category-img{
            filter: brightness(100%);
        }
        .category-img{
            filter: brightness(50%);
        }
        .category-text{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 1.5rem;
            font-weight: 500;
        }
        input{
            background-color: #0000006e;
            border-radius: 7px;
            border: 0px;
            color: rgb(207, 207, 207);
            height: 2.2rem;
            padding: 0 10px
        }
        .input-find{
            width: 180px !important;
            padding-left: 10px;
        }
        ::placeholder{
            color: rgb(207, 207, 207);
        }
        .search-form{
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }
        .song{
            align-items: center !important;
            justify-content: space-between;
            margin: 20px 0;
        }
        .song-cnt{
            justify-content: flex-end;
            align-items: center;
            column-gap: 10px;
        }
        .song p{
            font-size: 1.1rem;
        }
        .upload-form{
            width: 600px;
            margin: 300px auto;
            flex-direction: column;
            text-align: center;
        }
        .upload-form input{
            margin: 10px;
        }
        .upload-form select{
            margin: 10px;
        }
        .upload-form h1{
            text-align: center;
        }
        .complain-form input{
            margin: 0;
        }
        .upload-temp-form{
            align-items: center;
            justify-content: center;
        }
        .upload-temp-form input{
            margin: 5px;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    
                                </div>
                            </li>
                        @endguest
                    </ul>
                    {{-- @if (Auth::user()->hasRole('admin'))
                        <a href="/admin">Go to Admin panel</a>
                    @endif --}}
                </div>
            </div>
        </nav>

        <main class="main">
            @yield('content')
        </main>
    </div>
</body>
</html>
