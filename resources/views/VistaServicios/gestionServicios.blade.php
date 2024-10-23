@extends('layout.app')

@section('title', 'Servicios')

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('css/styleServicio.css') }}">
@endsection

@section('content')
<div class="container text-center">
    <!-- Encabezado de Servicios -->
    <h1 class="font-weight-bold colorEstandarTexto mb-4">Gestión de Servicios de Carwash</h1>
    <h5 class="text-black font-weight-light mb-4">Actualiza, verifica y descarta los servicios vigentes en Shine & Go. <br>
        Crea nuevos servicios e innova con tus ideas para los clientes.
    </h5>
    
    <!-- Botón para Nuevo Servicio -->
    <div class="d-flex justify-content-end mb-4">
        <button class="btn btn-agregar" data-bs-toggle="modal" data-bs-target="#nuevoServicioModal">
            <i class="bi bi-plus"></i> Nuevo Servicio
        </button>
    </div>

    <!-- Listado de Servicios -->
    <div class="row">
        @foreach($servicios as $servicio)
            <x-servicio-card-gestion 
                titulo="{{ $servicio->nomServicio }}" 
                precio="{{ $servicio->precio }}" 
                descripcion="{{ $servicio->descripcion }}" 
                id_servicio="{{ $servicio->id }}" 
            />
        @endforeach
    </div>
</div>

<!-- Modal para Agregar Nuevo Servicio -->
<div class="modal fade" id="nuevoServicioModal" tabindex="-1" aria-labelledby="nuevoServicioModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nuevoServicioModalLabel">Crear Nuevo Servicio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="nuevoServicioForm" action="/servicios/gestion/guardar" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Nombre del Servicio</label>
                        <input type="text" class="form-control" id="nomServicio" name="nomServicio" placeholder="Ingrese el nombre del servicio..." required>
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio del Servicio</label>
                        <!-- Agregar step="0.01" para permitir decimales y min="0" para no permitir menores a 0 -->
                        <input type="number" class="form-control" id="precio" name="precio" placeholder="Ingrese el precio del servicio..." step="0.01" min="0" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control textarea-fixed" id="descripcion" name="descripcion" placeholder="Ingrese la descripción del servicio..." required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" id="guardarServicioBtn">Crear Servicio</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Editar Servicio -->
<div class="modal fade" id="editarServicioModal" tabindex="-1" aria-labelledby="editarServicioModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarServicioModalLabel">Editar Servicio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editarServicioForm" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Método PUT para actualizar -->
                    <div class="mb-3">
                        <label for="editarTitulo" class="form-label">Nombre del Servicio</label>
                        <input type="text" class="form-control" id="editarTitulo" name="nomServicio" required>
                    </div>
                    <div class="mb-3">
                        <label for="editarPrecio" class="form-label">Precio del Servicio</label>
                        <input type="number" class="form-control" id="editarPrecio" name="precio" step="0.01" min="0" required>
                    </div>
                    <div class="mb-3">
                        <label for="editarDescripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="editarDescripcion" name="descripcion" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editarImagen" class="form-label">Imagen</label>
                        <input type="file" class="form-control" id="editarImagen" name="imagen" accept="image/*">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" id="guardarCambiosBtn">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('custom_js')
    <script src="{{ asset('js/servicio.js') }}"></script>

@endpush
