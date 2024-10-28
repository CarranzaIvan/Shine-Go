<?php $__env->startSection('title', 'Ver Cita'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header" style="background-color: #0D5C75;">
                <h4 class="card-title text-white">Ver Cita</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="usuario"><strong>Usuario</strong></label>
                            <p id="usuario"><?php echo e($cita->usuario->name ?? 'Usuario no disponible'); ?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="servicio"><strong>Nombre del Servicio</strong></label>
                            <p id="servicio"><?php echo e($cita->servicio->nomServicio ?? 'Servicio no disponible'); ?></p>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fecha_cita"><strong>Fecha de la Cita</strong></label>
                            <p id="fecha_cita"><?php echo e($cita->fecha_cita); ?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="hora_cita"><strong>Hora de la Cita</strong></label>
                            <p id="hora_cita"><?php echo e($cita->hora_cita); ?></p>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="estado"><strong>Estado de la Cita</strong></label>
                            <p id="estado"><?php echo e($cita->estado); ?></p>
                        </div>
                    </div>
                </div>
                <br>
                <div class="d-flex justify-content-center">
                    <a href="<?php echo e(route('dashboard.citas.index')); ?>" class="btn btn-secondary mb-3 w-25">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layout.app_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Miguel\IdeaProjects\Shine-Go\resources\views\dashboard\citas\show.blade.php ENDPATH**/ ?>