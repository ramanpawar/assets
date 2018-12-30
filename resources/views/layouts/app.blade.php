<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    #Sidenav
{
    position: fixed;
    z-index: 1;
    width:25%;
    height: 100%;
    left:-25%;
    top:0px;
    padding-top: 60px;
    background-color: #d9d7d6;
    overflow: hidden;
    box-sizing: border-box;
    box-shadow: 0px 0px 10px black;
}
#Sidenav ul{
    padding: 0px;
    list-style-type: none;
}
#Sidenav ul li{
    display:block;
    width: 100%;
    padding: 5px;
    transition: all 0.3s;
    margin-left: 10px;
    font-weight: 700;

   
}
#Sidenav ul li:hover {
    background-color:#aaaaaa;
    cursor: pointer;
    padding: 10px;
}

    #sidenavbtn {
        margin-right: 10px;
        margin-left: 0px;
    }
    </style>
</head>
<body>
    <div id="app">
        <nav style="z-index:2" class="navbar navbar-expand-md navbar-light navbar-laravel navbar-fixed-top">
            <div class="container ml-0">
                <a role="button" id="sidenavbtn"onclick="opensidenav()"><i class="fas fa-bars"></i></a>
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Masters</a>

                            <div class="dropdown-menu dropdown-menu-right" >
                                <a href="/items" class="dropdown-item">Items</a>
                                <a href="/consumables" class="dropdown-item">Consumables</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Relation</a>

                            <div class="dropdown-menu dropdown-menu-right" >
                                <a href="/relation/create" class="dropdown-item">Add</a>
                                <a href="/relation" class="dropdown-item">View</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Invoice</a>

                            <div class="dropdown-menu dropdown-menu-right" >
                                <a href="/invoice" class="dropdown-item">Invoice</a>
                                <a href="/invoicedetails" class="dropdown-item">Invoice Details</a>
                            </div>
                        </li>



                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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

        <main class="py-4">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @include('include.sidenav')
            @yield('content')
        </main>
    </div>
    <script>
        @yield('script')
    </script>
    <script>
     function opensidenav(){
    var sidenavbar = $('#Sidenav');
    if (sidenavbar.hasClass('visible')) {
        sidenavbar.animate({left:"-25%"},200).removeClass('visible');
        $("#main").css('margin-left','0px');
    } else {
        $('#Sidenav').animate({left:'0px'},200).addClass('visible');
        $("#main").css('margin-left',"28%");
    }


    
}
    </script>
</body>
</html>
