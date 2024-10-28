<?php $__env->startSection('title', 'Ver Promoción'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header" style="background-color: #0D5C75;">
                <h4 class="card-title text-white">Ver promoción</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nombre"><strong>Nombre de la Promoción</strong></label>
                            <p id="nombre"><?php echo e($promocion->nombrePromocion); ?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="descuento"><strong>Descuento (%)</strong></label>
                            <p id="descuento"><?php echo e($promocion->descuento); ?>%</p>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="descripcion"><strong>Descripción</strong></label>
                            <p id="descripcion"><?php echo e($promocion->descripcion); ?></p>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="servicio"><strong>Nombre del Servicio</strong></label>
                            <p id="servicio"><?php echo e($promocion->servicio->nomServicio); ?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fecha_expiracion"><strong>Fecha de Expiración</strong></label>
                            <p id="fecha_expiracion"><?php echo e($promocion->fecha_expiracion); ?></p>
                        </div>
                    </div>
                </div>
                <br>
                <div class="d-flex justify-content-center">
                    <a href="<?php echo e(route('promociones')); ?>" class="btn btn-secondary mb-3 w-25">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layout.app_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Miguel\IdeaProjects\Shine-Go\resources\views\dashboard\promociones\show.blade.php ENDPATH**/ ?>