<!-- Tarjeta de mostrar producto -->
<div class="col-md-4 mb-4">
    <div class="card h-100 shadow-sm d-flex flex-column"> 
        <div class="card-body text-start d-flex flex-column flex-grow-1"> 
            <h5 class="card-title font-weight-bold servicio-titulo"><?php echo e($titulo); ?></h5>
            <h6 class="servicio-precio text-secondary"> $ <?php echo e($precio); ?></h6>
            <div class="text-center mb-3"> 
                <img src="<?php echo e(asset($imagen ? 'storage/' . $imagen : 'images/default.png')); ?>" 
                     class="img-fluid img-servicio" 
                     alt="<?php echo e($titulo); ?>" 
                     onerror="this.onerror=null; this.src='<?php echo e(asset('images/logo.png')); ?>';"
                     style="width: 100%; height: 200px; object-fit: cover;">
            </div>
            <p class="font-weight-normal servicio-descripcion flex-grow-1"><?php echo e($descripcion); ?></p>
            <div class="mt-auto"> 
                <button class="btn btn-agregar" data-id="<?php echo e($idServicio); ?>"
                        onclick="toggleCarrito('<?php echo e($idServicio); ?>', '<?php echo e($titulo); ?>', '<?php echo e($descripcion); ?>', this)">
                    Agregar al carrito
                </button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\Miguel\IdeaProjects\Shine-Go\resources\views\components\servicio-card.blade.php ENDPATH**/ ?>