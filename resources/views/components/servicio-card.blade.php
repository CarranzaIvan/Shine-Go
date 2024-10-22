<!--Tarejeta de mostrar producto-->
<div class="col-md-4 mb-4">
    <div class="card h-100 shadow-sm">
        <div class="card-body text-start">
            <h5 class="card-title font-weight-bold servicio-titulo">{{ $titulo }}</h5>
            <h6 class="servicio-precio text-secondary"> $ {{ $precio }}</h6>
            <div class="text-center">
                <img src="{{ asset($imagen) }}" class="img-fluid mb-3 img-servicio" alt="{{ $titulo }}" onerror="this.onerror=null; this.src='images/logo.png';">
            </div>
            <p class="font-weight-normal servicio-descripcion">{{ $descripcion }}</p>
            <button class="btn btn-agregar" data-id="{{ $idServicio }}">
                <i class="bi bi-cart"></i> Agregar al carrito
            </button>
        </div>
    </div>
</div>
