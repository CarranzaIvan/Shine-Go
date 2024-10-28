<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('templates/xhtml/css/style.css')); ?>" rel="stylesheet">
<div class="authincation d-flex align-items-center justify-content-center" style="height: 80vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="authincation-content">
                    <div class="row no-gutters">
                        <div class="col-md-5 d-none d-md-flex align-items-center justify-content-center pl-5">
                            <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Login Image" class="img-fluid mb-4">
                        </div>
                        <div class="col-md-7">
                            <div class="auth-form">
                                <h3 class="text-center mb-4">Iniciar sesión</h3>
                                <form action="<?php echo e(route('usuario.login')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <label class="mb-1"><strong>Correo</strong></label>
                                        <input type="email" name="correo" class="form-control" placeholder="correo" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1"><strong>Contraseña</strong></label>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
                                    </div>
                                </form>
                                <div class="new-account mt-3 text-center">
                                    <p>No tienes cuenta? <a class="text-primary" href="<?php echo e(route('usuario.register.form')); ?>">Registrate</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if(session('success')): ?>
<script>
    Swal.fire({
        icon: 'success',
        title: '¡Éxito!',
        text: "<?php echo e(session('success')); ?>",
        showConfirmButton: false,
        timer: 3000
    });
</script>
<?php endif; ?>

<?php if(session('error')): ?>
<script>
    Swal.fire({
        icon: 'error',
        title: 'Error',
        text: "<?php echo e(session('error')); ?>",
        showConfirmButton: true
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
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Miguel\IdeaProjects\Shine-Go\resources\views\auth\login.blade.php ENDPATH**/ ?>