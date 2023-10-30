<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <script src="https://kit.fontawesome.com/1bf0086160.js" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/generalStyle.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">

</head>

<body>
    <div id="app">

        <nav class="navbar-custom">
            <div class="container-menu">
                <div class="header-navigation-menu">
                    <div class="header-icon">
                        <img src="/css/LogoBlanco.png" alt="">
                    </div>
                    <button class="navbar-nav-toggle">
                        <span></span>
                    </button>
                    <div class="navbar-navigation">
                        <ul>
                            @guest
                                <li>
                                    <a href="{{ route('login') }}">{{ __('Iniciar sesión    ') }}<i
                                            class="fas fa-sign-in-alt"></i></a>
                                </li>
                                <li>
                                    <a href="{{ route('register') }}">{{ __('Crear cuenta   ') }}<i
                                            class="fas fa-user-plus"></i></a>
                                </li>
                                
                            @else
                            {{-- <li style="font-size: 12px;" class="dropdown">
                                    <a href="#" class="sub-menu-toggle">
                                        {{ __('A ') }} <span class="caret"><i class="fas fa-indent"></i></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="/evaluacion" style="cursor: pointer">{{ __('A1 ') }}<i class="fas fa-chart-bar"></i></a>
                                </li>
                                <li>
                                    <a href="/estadisticas" style="cursor: pointer">{{ __('A2 ') }}<i class="fas fa-paste"></i></a>
                                </li>

                            </ul>
                            </li>

                                <li style="font-size: 12px;" class="dropdown">
                                    <a href="#" class="sub-menu-toggle">
                                        {{ __('B') }} <span class="caret"><i class="fas fa-indent"></i></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="/evaluacion/create" style="cursor: pointer">{{ __('B1 ') }}<i
                                                    class="fas fa-folder-plus"></i></a>
                                        </li>
                                    </ul>
                                </li> --}}

                                <li style="font-size: 12px;" class="dropdown">
                                    <a href="#" class="sub-menu-toggle">
                                        {{ __('Vales') }} <span class="caret"><i class="fas fa-indent"></i></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="{{ route('valeCombustible.create') }}" style="cursor: pointer">{{ __('Crear ') }}<i class="fas fa-folder-plus"></i></a>
                                        </li>

                                        <li>
                                            <a href="{{ route('valeCombustible.index') }}" style="cursor: pointer">{{ __('index ') }}<i class="fas fa-folder-plus"></i></a>
                                        </li>
                                       
                                    </ul>
                                </li>


                                <li style="font-size: 12px;" class="dropdown">
                                    <a href="#" class="sub-menu-toggle">
                                        {{ __('Panel') }} <span class="caret"><i class="fas fa-indent"></i></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="{{ route('panel.index') }}" style="cursor: pointer">{{ __('Panel De Administrador ') }}<i class="fas fa-folder-plus"></i></a>
                                        </li>

                                    </ul>
                                </li>

                                <li style="font-size: 12px;" class="dropdown">
                                    <a href="#" class="sub-menu-toggle">
                                        {{ __('Excel') }} <span class="caret"><i class="fas fa-indent"></i></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="{{ route('consumo.index') }}" style="cursor: pointer">{{ __('Excel ') }}<i class="fas fa-folder-plus"></i></a>
                                        </li>

                                </ul>
                            </li>


                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <span class="icon"><i class="fas fa-power-off"></i></span>
                                    <span class="title">
                                        {{ __('Cerrar Sesion') }}
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </span>
                                </a>
                            </li>

                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
            <script src="https://kit.fontawesome.com/df7aaa1fc6.js" crossorigin="anonymous"></script>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
            </script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
            </script>

            <script src="{{ asset('js/navbar-responsive.js') }}"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <script>
                function limitCar(element) {
                    var max_chars = 2;
                    if (element.value.length > max_chars) {
                        element.value = element.value.substr(0, max_chars);
                    }
                }

                $(document).ready(function() {
                    fetchCar();
                    // don´t allow user to submit if they´re
                    // focused on any input field
                    $(".form-control").keydown(function(e) {
                        if (e.keyCode == 13) {
                            e.preventDefault();
                        }
                    });

                    function fetchCar(query = '') {
                        $.ajax({
                                url: "/callCar",
                                context: this,
                                method: 'GET',
                                cache: false,
                                data: {
                                    query: query
                                },
                                dataType: 'json',
                            })
                            .done(function(data) {

                                document.getElementById('valePlacas').value = data.valePlacas;
                                document.getElementById('valeCombustible').value = data
                                    .valeCombustible;
                                document.getElementById('valeMarca').value = data
                                    .valeMarca;
                                document.getElementById('valeModelo').value = data
                                    .valeModelo;
                                document.getElementById('valeAño').value = data
                                    .valeAño;

                            });

                        function callback() {
                            $('#valePlacas').val(data.valePlacas);
                        }
                    }

                    $(document).on('keyup', '#valeEconomico', function() {
                        var query = $(this).val();
                        fetchCar(query);

                    });
                });
            </script>

            {{-- Busca Empleados --}}
            <script>
                function limitEmp(element) {
                    var max_chars = 2;
                    if (element.value.length > max_chars) {
                        element.value = element.value.substr(0, max_chars);
                    }
                }

                $(document).ready(function() {
                    fetchEmp();
                    // don´t allow user to submit if they´re
                    // focused on any input field
                    $(".form-control").keydown(function(e) {
                        if (e.keyCode == 13) {
                            e.preventDefault();
                        }
                    });

                    function fetchEmp(query = '') {
                        $.ajax({
                                url: "/callEmp",
                                context: this,
                                method: 'GET',
                                cache: false,
                                data: {
                                    query: query
                                },
                                dataType: 'json',
                            })
                            .done(function(data) {

                                document.getElementById('valeSolicitante').value = data.valeSolicitante;

                            });

                        function callback() {
                            $('#valeSolicitante').val(data.valeSolicitante);
                        }
                    }

                    $(document).on('keyup', '#valeNumero', function() {
                        var query = $(this).val();
                        fetchEmp(query);

                    });
                });
            </script>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            {{-- Busca Departamento --}}
            <script>
                function limitDep(element) {
                    var max_chars = 2;
                    if (element.value.length > max_chars) {
                        element.value = element.value.substr(0, max_chars);
                    }
                }

                $(document).ready(function() {
                    fetchDep();
                    // don´t allow user to submit if they´re
                    // focused on any input field
                    $(".form-control").keydown(function(e) {
                        if (e.keyCode == 13) {
                            e.preventDefault();
                        }
                    });

                    function fetchDep(query = '') {
                        $.ajax({
                                url: "/callDep",
                                context: this,
                                method: 'GET',
                                cache: false,
                                data: {
                                    query: query
                                },
                                dataType: 'json',
                            })
                            .done(function(data) {

                                $('#valeCc').val(data.valeCc);
                            });
                    }


                    $('#choice1').change(function() {
                        var query = $(this).val();
                        fetchDep(query);
                    });
                });
            </script>

        </main>
    </div>
</body>

</html>