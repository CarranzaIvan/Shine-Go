<?php $__env->startSection('title', 'Mis Citas'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <center><h1 class="mb-4">Mis Citas</h1></center>
    

    <!-- Descripción o introducción a la página -->
    <div class="alert alert-info">
        Aquí podrás ver todas las citas que has registrado en nuestro sistema. Puedes revisar los detalles de cada cita y su estado.
    </div>

    <?php if($citas->isEmpty()): ?>
        <div class="alert alert-warning">
            No tienes citas registradas.
        </div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table-info table table-striped table-hover text-center">
                <thead>
                    <tr>
                        <th>Servicio</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $citas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($cita->servicio->nomServicio); ?></td>
                            <td><?php echo e(\Carbon\Carbon::parse($cita->fecha_cita)->format('d/m/Y')); ?></td>
                            <td><?php echo e($cita->hora_cita); ?></td>
                            <td>
                                <span class="badge <?php echo e($cita->estado === 'pendiente' ? 'bg-warning' : 'bg-success'); ?>">
                                    <?php echo e(ucfirst($cita->estado)); ?>

                                </span>
                            </td>
                            <td>
                                <button class="btn btn-info btn-sm" onclick="verDetalles('<?php echo e($cita->id_cita); ?>')">
                                    Ver Detalles
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

<!-- Script para mostrar detalles de la cita -->
<script>
    function verDetalles(citaId) {
        $.ajax({
            url: '/citas/detalle',
            type: 'GET',
            data: { id: citaId },
            success: function(response) {
                if (response.error) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        text: response.error
                    });
                } else {
                    Swal.fire({
                        title: 'Detalles de la Cita',
                        html: `
                            <div style="text-align: center;">
                                <b>Servicio:</b> ${response.servicio}<br>
                                <b>Fecha:</b> ${response.fecha}<br>
                                <b>Hora:</b> ${response.hora}<br>
                                <b>Estado:</b> ${response.estado}<br>
                            </div>
                        `,
                        icon: 'info'
                    });
                }
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se pudo cargar los detalles de la cita.'
                });
            }
        });
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Miguel\IdeaProjects\Shine-Go\resources\views\seguimiento.blade.php ENDPATH**/ ?>