<?php $__env->startSection('title', 'Preguntas Frecuentes'); ?>

<?php $__env->startSection('custom_css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/bienvenida.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container text-center">
        <!-- Encabezado de Servicios -->
        <h1 class="font-weight-bold colorEstandarTexto mb-4">¿Cómo podemos ayudarte?</h1>
        <div class="input-group mb-3 input-group-lg">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
            </div>
            <input id="searchInput" placeholder="Ingresa la duda que tienes..." type="text" class="form-control" aria-label="search" aria-describedby="basic-addon1">
        </div>
        <h2 class="font-weight-bold mb-4">Preguntas Destacadas</h2>
        <hr class="mb-4" style="border-top: 2px solid #000;">
    </div>

    <div class="container text-center">
        <div class="row">
            <!-- Columna 1 -->
            <div class="col-md-6">
                <?php $__currentLoopData = $preguntas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $pregunta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($index % 2 == 0): ?> <!-- Columna izquierda -->
                        <div class="mb-4 question-item">
                            <h4 class="text-black font-weight-black mb-1"><?php echo e($pregunta->pregunta); ?></h4>
                            <h5 class="text-black font-weight-light mb-4"><?php echo e($pregunta->respuesta); ?></h5>
                        </div>
                        <hr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        
            <!-- Columna 2 -->
            <div class="col-md-6">
                <?php $__currentLoopData = $preguntas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $pregunta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($index % 2 != 0): ?> <!-- Columna derecha -->
                        <div class="mb-4 question-item">
                            <h4 class="text-black font-weight-black mb-1"><?php echo e($pregunta->pregunta); ?></h4>
                            <h5 class="text-black font-weight-light mb-4"><?php echo e($pregunta->respuesta); ?></h5>
                        </div>
                        <hr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>        
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('custom_js'); ?>
    <script src="<?php echo e(asset('js/preguntas.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Miguel\IdeaProjects\Shine-Go\resources\views\preguntas.blade.php ENDPATH**/ ?>