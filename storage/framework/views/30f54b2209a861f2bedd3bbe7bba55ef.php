<?php $__env->startSection('title', 'Servicios'); ?>

<!-- Aquí se carga el CSS personalizado para esta vista -->
<?php $__env->startSection('custom_css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/styleServicio.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div aria-live="polite" aria-atomic="true" style="position: relative;">
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <!-- Aquí se generarán los toasts -->
    </div>
</div>

<div class="container text-center">
    <!--ENCABEZADO DE SERVICIOS-->
    <h1 class="font-weight-bold colorEstandarTexto">Selecciona tus servicios...</h1>
    <h5 class="text-black font-weight-light">Agregar a tu carrito los servicios que consideres que son cruciales a tus
        tendencias y aptos para tu cartera.</h5>

    <div class="d-flex justify-content-end mb-4">
        <button class="btn btnVerCarrito">
            <i class="bi bi-cart"></i> Ver carrito  <span id="contadorCarrito" class="badge text-dark">0</span>
        </button>
    </div>
    <!--Listado de servicios-->
    <div class="row">
        <?php $__currentLoopData = $servicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servicio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if (isset($component)) { $__componentOriginal1806b94d4791478f2b96e743cb558947 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1806b94d4791478f2b96e743cb558947 = $attributes; } ?>
<?php $component = App\View\Components\ServicioCard::resolve(['titulo' => ''.e($servicio->nomServicio).'','precio' => ''.e($servicio->precio).'','descripcion' => ''.e($servicio->descripcion).'','idServicio' => ''.e($servicio->id).'','imagen' => ''.e($servicio->imagen ?? 'images/default.png').''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('servicio-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\ServicioCard::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1806b94d4791478f2b96e743cb558947)): ?>
<?php $attributes = $__attributesOriginal1806b94d4791478f2b96e743cb558947; ?>
<?php unset($__attributesOriginal1806b94d4791478f2b96e743cb558947); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1806b94d4791478f2b96e743cb558947)): ?>
<?php $component = $__componentOriginal1806b94d4791478f2b96e743cb558947; ?>
<?php unset($__componentOriginal1806b94d4791478f2b96e743cb558947); ?>
<?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('custom_js'); ?>
    <script src="<?php echo e(asset('js/carrito.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Include Bootstrap JS (para los toasts) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Miguel\IdeaProjects\Shine-Go\resources\views\VistaServicios\servicios.blade.php ENDPATH**/ ?>