<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Test') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

   
    
   
    
    <!-- Styles -->    
    <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
            <div class="container">
                <div class="row">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('img/hospital-logo.png') }}" alt="logo" class="img-fluid">
                    </a> 
                </div>
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
                            <!-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif -->
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->ime.' '.Auth::user()->prezime }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ 'Logout' }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                        <input type="submit" value="Logout">
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-5">

            <div class="container">
            
                @if(Auth::user())
                
                    @if( Auth::user()->usertype->vrsta_korisnik_naziv === 'Administrator' || Auth::user()->usertype->vrsta_korisnik_naziv === 'Asistent' )

                        <div class="row justify-content-between">
                        

                            <div class="col-md-2">

                                
                                    <ul class="list-group">
                                        @if( Auth::user()->usertype->vrsta_korisnik_naziv === 'Administrator' )
                                            
                                            <a href="{{ route('asistents.index') }}" class="list-group-item">Asistenti</a>
                                            <a href="{{ route('doctors.index') }}" class="list-group-item">Doktori</a>
                                        
                                        @elseif( Auth::user()->usertype->vrsta_korisnik_naziv === 'Asistent' )
                                                
                                            <a href="{{ route('pacijents.index') }}" class="list-group-item">Kartoni pacijenata</a>
                                            <a href="{{ route('bolesti.index') }}" class="list-group-item">Bolesti</a>
                                            <a href="{{ route('categoryDrugs.index') }}" class="list-group-item">Lekovi</a>
                                                                        
                                        @endif
                                    </ul>
                            

                            </div>
                        
                            <div class="col-md-10">

                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif
                            
                                @yield('content')

                            </div>
                        </div>

                    @elseif( Auth::user()->usertype->vrsta_korisnik_naziv === 'Lekar' )

                        <div class="row">
                        
                            <div class="col-md-10 mx-auto">
                            
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                @yield('content')

                            </div>
                        
                        </div>

                    @endif

                @else


                   @yield('content')

                        
                    
                @endif

            </div>
   
        </main>

        <footer class='fixed-bottom bg-primary p-2 text-light text-center'>
            <p class="m-0">Napravila: grupa 4</p>
        </footer>
    </div>

    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> 
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->

    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset('js/app.js') }}" ></script> 
    
    <script>
        $( function() {

            let $j = jQuery.noConflict();

            $( "#datum_rodjenja" ).datepicker();

        } );
    </script>

    @yield('script')

    @yield('ajax')
</body>
</html>




 




