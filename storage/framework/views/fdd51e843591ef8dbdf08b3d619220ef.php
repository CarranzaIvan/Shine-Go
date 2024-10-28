<?php $__env->startSection('title', 'Ir al chatbot'); ?>

<?php $__env->startSection('custom_css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/bienvenida.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/chatbot.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid d-flex align-items-center justify-content-between mt-5">
        <div class="text-right">
            <h1 class="font-weight-bold colorEstandarTexto">Descubre nuestro Bot de Telegram</h1>
            <p class="informacion-chatbot">Descubre la forma más rápida y fácil de resolver tus dudas sobre nuestro servicio
                de carwash a domicilio con nuestro Bot de Consultas en Telegram. Diseñado para responder automáticamente las
                preguntas más comunes, este bot está disponible las 24 horas, los 7 días de la semana, para brindarte la
                información que necesitas en cuestión de segundos.</p>
            <a href="https://t.me/tu_chatbot" class="btn btn-telegram">Ir al Chatbot</a>
            <!-- Cambia la URL al enlace de tu chatbot -->
        </div>
        <img src="<?php echo e(asset('images/telegram.png')); ?>" alt="Logo de Telegram" class="logo-telegram">
        <!-- Cambia la ruta por la de tu logo -->
    </div>

    <?php if(session('success')): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: "<?php echo e(session('success')); ?>",
                    showConfirmButton: false,
                    timer: 3000
                });
            });
        </script>
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: "<?php echo e($errors->first()); ?>",
                    showConfirmButton: true,
                });
            });
        </script>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Miguel\IdeaProjects\Shine-Go\resources\views\chatbot.blade.php ENDPATH**/ ?>