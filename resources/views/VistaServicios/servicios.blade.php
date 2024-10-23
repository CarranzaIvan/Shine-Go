@extends('layout.app')

@section('title', 'Servicios')

<!-- Aquí se carga el CSS personalizado para esta vista -->
@section('custom_css')
    <link rel="stylesheet" href="{{ asset('css/styleServicio.css') }}">
@endsection

@section('content')
<div class="container text-center">
    <!--ENCABEZADO DE SERVICIOS-->
    <h1 class="font-weight-bold colorEstandarTexto">Selecciona tus servicios...</h1>
    <h5 class="text-black font-weight-light">Agregar a tu carrito los servicios que consideres que son cruciales a tus tendencias y aptos para tu cartera.</h5>
    <div class="d-flex justify-content-end mb-4">
        <button class="btn btnVerCarrito">
            <i class="bi bi-cart"></i> Ver carrito
        </button>
    </div>

    <!--Listado de servicios-->
    <div class="row">
    @foreach($servicios as $servicio)
        <x-servicio-card 
            titulo="{{ $servicio->nomServicio }}" 
            precio="{{ $servicio->precio }}" 
            descripcion="{{ $servicio->descripcion }}" 
            id_servicio="{{ $servicio->id }}" 
        />
    @endforeach
    
    </div>
</div>
@endsection
