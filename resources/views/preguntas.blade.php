@extends('layout.app')
@section('title', 'Preguntas Frecuentes')

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('css/bienvenida.css') }}">
@endsection

@section('content')

    <div class="container text-center">
        <!-- Encabezado de Servicios -->
        <h1 class="font-weight-bold colorEstandarTexto mb-4">¿Cómo podemos ayudarte?</h1>
        <div class="input-group mb-3 input-group-lg">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
            </div>
            <input placeholder="Ingresa la duda que tienes..." type="text" class="form-control" aria-label="search" aria-describedby="basic-addon1">
        </div>
        <h2 class="font-weight-bold mb-4">Preguntas Destacadas</h2>
        <hr class="mb-4" style="border-top: 2px solid #000;">
    </div>

    <div class="container text-center">
        
        <div class="row">
            <!-- Columna 1 -->
            <div class="col-md-6">
                <div class="mb-4">
                    <p class="font-weight-bold">¿Cómo puedo registrarme?</p>
                    <p>Para registrarte, haz clic en el botón "Registrarse" en la página de inicio y sigue los pasos.</p>
                </div>
                <hr>
                
                <div class="mb-4">
                    <p class="font-weight-bold">¿Dónde puedo ver mis reservas?</p>
                    <p>Dirígete a tu perfil y selecciona "Mis reservas" para ver el historial.</p>
                </div>
                <hr>
            </div>

            <!-- Columna 2 -->
            <div class="col-md-6">
                <div class="mb-4">
                    <p class="font-weight-bold">¿Olvidé mi contraseña, cómo la recupero?</p>
                    <p>Haz clic en "Olvidé mi contraseña" en la página de inicio de sesión y sigue las instrucciones.</p>
                </div>
                <hr>
                
                <div class="mb-4">
                    <p class="font-weight-bold">¿Cómo contacto al soporte técnico?</p>
                    <p>Puedes contactar al soporte técnico enviando un mensaje a través de la sección de "Contacto".</p>
                </div>
                <hr>
            </div>
        </div>
    </div>

@endsection
