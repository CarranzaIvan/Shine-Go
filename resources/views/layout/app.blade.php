<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <!--LIBRERIAS DE DISEÑO-->
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- SweetAlert-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!--Estilo independiente-->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <!-- Otros enlaces -->
    @if(View::hasSection('custom_css'))
        @yield('custom_css')
    @endif
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://sandbox.paypal.com/sdk/js?client-id={{ env('PAYPAL_CLIENT_ID') }}"></script>
</head>

<body class="fondo-aqua">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('inicio')}}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" height="50">
                <b>Shine&Go</b>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('inicio')}}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('servicios')}}">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('registrar_cita') }}">Registro de citas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido -->

    <div class="container mt-5 pt-5 mb-3 pb-3">
        @yield('content')
    </div>

    <!-- Fin de Contenido -->

    <footer class="footer d-flex justify-content-between align-items-center mt-5 py-2 my-0 fixed-bottom">
        <div class="col-md-4 d-flex align-items-center">
            <span class="mb-3 mb-md-0 text-white font-weight-bold">© 2024 Shine&Go, Todos los derechos reservados.</span>
        </div>

        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3 mr-2"><i class="bi bi-facebook"></i></li>
            <li class="ms-3 mr-2"><i class="bi bi-instagram"></i></li>
            <li class="ms-3 mr-2"><i class="bi bi-twitter-x"></i></li>
        </ul>
    </footer>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    @stack('custom_js')

</body>

</html>