<!-- Tarjeta de mostrar producto -->
<div class="col-md-4 mb-4">
    <div class="card h-100 shadow-sm d-flex flex-column"> <!-- Usar flex para el contenedor de la tarjeta -->
        <div class="card-body text-start d-flex flex-column flex-grow-1"> <!-- Usar flex en el cuerpo de la tarjeta -->
            <h5 class="card-title font-weight-bold servicio-titulo">{{ $titulo }}</h5>
            <h6 class="servicio-precio text-secondary"> $ {{ $precio }}</h6>
            <div class="text-center mb-3"> <!-- Agregar un margen inferior -->
                <img src="{{ asset($imagen ? 'storage/' . $imagen : 'images/default.png') }}" 
                     class="img-fluid img-servicio" 
                     alt="{{ $titulo }}" 
                     onerror="this.onerror=null; this.src='{{ asset('images/logo.png') }}';"
                     style="width: 100%; height: 200px; object-fit: cover;">
            </div>
            <p class="font-weight-normal servicio-descripcion flex-grow-1">{{ $descripcion }}</p>
            <div class="mt-auto"> <!-- Asegurarse de que el botón esté al final -->
                <button class="btn btn-agregar" data-id="{{ $idServicio }}">
                    <i class="bi bi-cart"></i> Agregar al carrito
                </button>
            </div>
        </div>
    </div>
</div>
