<?php $__env->startSection('title', 'Terminos y Condiciones'); ?>

<?php $__env->startSection('custom_css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/bienvenida.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container text-center">
        <!-- Encabezado de Servicios -->
        <h1 class="font-weight-bold colorEstandarTexto mb-4">Terminos y condiciones</h1>
    </div>

    <div class="container">
        <h3 class="text-black font-weight-black mb-1">
            Información general
        </h3>
        <h4 class="text-black font-weight-light mb-4">Actualiza, verifica y descarta los servicios vigentes en Shine & Go.
            Este sitio web es operado por Shine&Go. 
            En todo el sitio, los términos "nosotros",
            "nos" y "nuestro" se refieren a Shine&Go.
            Al acceder y utilizar nuestro sitio web y
            nuestros servicios, aceptas los siguientes
            términos y condiciones. Si no estás de acuerdo
            con todos los términos, te recomendamos no
            utilizar nuestros servicios.
        </h4>
    </div>
    <div class="container">
        <h3 class="text-black font-weight-black mb-1">
            Terminos del servicio
        </h3>
        <h4 class="text-black font-weight-light mb-4">
            <ul>
                <li>
                    El servicio de carwash a domicilio de Shine&Go se proporciona en las áreas especificadas en nuestro sitio web.
                </li>
                <li>
                    Nos reservamos el derecho de rechazar cualquier servicio si consideramos que las condiciones no son seguras o adecuadas para realizar el trabajo (e.g., clima adverso o ubicación no accesible).
                </li>
                <li>
                    Shine&Go no se hace responsable de daños preexistentes en los vehículos que atendemos. Recomendamos que informes cualquier daño existente antes de que comience el servicio.
                </li>
            </ul>
        </h4>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Miguel\IdeaProjects\Shine-Go\resources\views\terminos.blade.php ENDPATH**/ ?>