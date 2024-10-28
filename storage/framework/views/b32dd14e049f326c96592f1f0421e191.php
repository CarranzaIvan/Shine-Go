<?php $__env->startSection('title', 'Citas'); ?>
<?php $__env->startSection('content'); ?>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header" style="background-color: #0D5C75;">
                <h4 class="card-title text-white">Listado de Citas</h4>
            </div>
            <div class="card-body">
                <!--<a href="<?php echo e(route('crear_promocion')); ?>" class="btn mb-3 text-white" style="background-color: #0D5C75;">
                    <i class="fa fa-plus"></i> Agregar Cita</a>-->
                <div class="table-responsive">
                    <table id="example" class="table">
                        <thead>
                            <tr>
                                <th class="text-center">Usuario</th>
                                <th class="text-center">Nombre del Servicio</th>
                                <th class="text-center">Fecha de Cita</th>
                                <th class="text-center">Hora de Cita</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $citas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="text-center"><?php echo e($cita->id_usuario); ?></td>
                                <td class="text-center"><?php echo e($cita->servicio->nomServicio ?? 'Servicio no disponible'); ?></td>
                                <td class="text-center"><?php echo e($cita->fecha_cita); ?></td>
                                <td class="text-center"><?php echo e($cita->hora_cita); ?></td>
                                <td class="text-center"><?php echo e($cita->estado); ?></td>
                                <td class="text-center">
                                    <center>
                                        <a href="<?php echo e(route('dashboard.citas.show', $cita->id_cita)); ?>" class="btn btn-info shadow btn-xs sharp mr-1"><i class="fa fa-eye"></i></a>
                                        <button class="btn btn-danger shadow btn-xs sharp" data-toggle="modal" data-target="#deleteModal" data-action="<?php echo e(route('dashboard.citas.destroy', $cita->id_cita)); ?>"><i class="fa fa-trash"></i></button>
                                    </center>
                                </td>

                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>

                    <!-- Modal de Confirmación de Eliminación -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminación</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ¿Estás seguro de que deseas eliminar esta cita?
                                </div>
                                <div class="modal-footer">
                                    <form id="deleteForm" method="POST" action="">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));

                            $('#deleteModal').on('show.bs.modal', function(event) {
                                var button = $(event.relatedTarget);
                                var action = button.data('action');
                                var modal = $(this);
                                modal.find('#deleteForm').attr('action', action);
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
        <!-- SweetAlert para mensajes de éxito -->
        <?php if(session('success')): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: "<?php echo e(session('success')); ?>",
                    showConfirmButton: false,
                    timer: 3000
                });
            });
        </script>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layout.app_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Miguel\IdeaProjects\Shine-Go\resources\views\dashboard\citas\index.blade.php ENDPATH**/ ?>