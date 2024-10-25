<div class="col-md-4 mb-4">
    <div class="card h-100 shadow-sm">
        <div class="card-body text-start">
            <h5 class="card-title font-weight-bold servicio-titulo" id="titulo-{{ $idServicio }}">{{ $titulo }}</h5>
            <h6 class="servicio-precio text-secondary" id="precio-{{ $idServicio }}"> $ {{ $precio }}</h6>
            <div class="text-center">
                <!-- Mostrar la imagen o una imagen por defecto si no hay -->
                <img src="{{ asset($imagen ? 'storage/' . $imagen : 'images/default.png') }}" class="img-fluid mb-3 img-servicio" alt="{{ $titulo }}" onerror="this.onerror=null; this.src='{{ asset('images/logo.png') }}';">
            </div>
            <p class="font-weight-normal servicio-descripcion" id="descripcion-{{ $idServicio }}">{{ $descripcion }}</p>
            
            <!-- Contenedor flex para alinear los botones -->
            <div class="d-flex flex-row">
                <!-- Botón Editar -->
                <button class="btn btnEditarServicio" data-id="{{ $idServicio }}">
                    <i class="bi bi-pencil-square"></i> Editar
                </button>
                <!-- Agregar margen a la izquierda al formulario para separar los botones -->
                <form action="/servicios/gestion/{{ $idServicio }}/eliminar" method="POST" class="ms-2">
                    @csrf
                    @method("DELETE")
                    <button class="btn btn-danger" type="submit">
                        <i class="bi bi-trash"></i> Eliminar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
