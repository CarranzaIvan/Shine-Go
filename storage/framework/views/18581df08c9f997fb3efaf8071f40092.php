<?php $__env->startSection('title', 'Servicios || Gestión'); ?>

<?php $__env->startSection('custom_css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/styleServicio.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<?php if(session('error')): ?>
    <div class="alert alert-danger">
        <?php echo e(session('error')); ?>

    </div>
<?php endif; ?>


    <div class="container text-center">
        <!-- Encabezado de Servicios -->
        <h1 class="font-weight-bold colorEstandarTexto mb-4">Gestión de Servicios de Carwash</h1>
        <h5 class="text-black font-weight-light mb-4">Actualiza, verifica y descarta los servicios vigentes en Shine & Go.
            <br>
            Crea nuevos servicios e innova con tus ideas para los clientes.
        </h5>

        <!-- Botón para Nuevo Servicio -->
        <div class="d-flex justify-content-end mb-4">
            <button class="btn btn-agregar" data-bs-toggle="modal" data-bs-target="#nuevoServicioModal">
                <i class="bi bi-plus"></i> Nuevo Servicio
            </button>
        </div>

        <!-- Listado de Servicios -->
        <div class="row">
            <?php $__currentLoopData = $servicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servicio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if (isset($component)) { $__componentOriginalae5b9f0f88290efc9a4c12d9c59e0209 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalae5b9f0f88290efc9a4c12d9c59e0209 = $attributes; } ?>
<?php $component = App\View\Components\ServicioCardGestion::resolve(['titulo' => ''.e($servicio->nomServicio).'','precio' => ''.e($servicio->precio).'','descripcion' => ''.e($servicio->descripcion).'','idServicio' => ''.e($servicio->id).'','imagen' => ''.e($servicio->imagen ?? 'images/default.png').''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('servicio-card-gestion'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\ServicioCardGestion::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalae5b9f0f88290efc9a4c12d9c59e0209)): ?>
<?php $attributes = $__attributesOriginalae5b9f0f88290efc9a4c12d9c59e0209; ?>
<?php unset($__attributesOriginalae5b9f0f88290efc9a4c12d9c59e0209); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalae5b9f0f88290efc9a4c12d9c59e0209)): ?>
<?php $component = $__componentOriginalae5b9f0f88290efc9a4c12d9c59e0209; ?>
<?php unset($__componentOriginalae5b9f0f88290efc9a4c12d9c59e0209); ?>
<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        
    </div>

    <!-- Modal para Agregar Nuevo Servicio -->
    <div class="modal fade" id="nuevoServicioModal" tabindex="-1" aria-labelledby="nuevoServicioModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="nuevoServicioModalLabel">Crear Nuevo Servicio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="nuevoServicioForm" action="/servicios/gestion/guardar" method="POST"
                        enctype="multipart/form-data" novalidate>
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label for="nomServicio" class="form-label">Nombre del Servicio</label>
                            <input type="text" class="form-control" id="nomServicio" name="nomServicio"
                                placeholder="Ingrese el nombre del servicio..." required>
                            <div class="invalid-feedback">
                                El nombre del servicio es obligatorio.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio del Servicio</label>
                            <input type="number" class="form-control" id="precio" name="precio"
                                placeholder="Ingrese el precio del servicio..." step="0.01" min="0" required>
                            <div class="invalid-feedback">
                                El precio del servicio es obligatorio y debe ser un valor positivo a dos decimales.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese la descripción del servicio..."
                                required></textarea>
                            <div class="invalid-feedback">
                                La descripción del servicio es obligatoria.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="imagen">Imagen</label>
                            <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Crear Servicio</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para Editar Servicio -->
    <div class="modal fade" id="editarServicioModal" tabindex="-1" aria-labelledby="editarServicioModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarServicioModalLabel">Editar Servicio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editarServicioForm" action="" method="POST" enctype="multipart/form-data" novalidate>
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="mb-3">
                            <label for="editarTitulo" class="form-label">Nombre del Servicio</label>
                            <input type="text" class="form-control" id="editarTitulo" name="nomServicio" required>
                            <div class="invalid-feedback">
                                El nombre del servicio es obligatorio.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="editarPrecio" class="form-label">Precio del Servicio</label>
                            <input type="number" class="form-control" id="editarPrecio" name="precio" step="0.01"
                                min="0" required>
                            <div class="invalid-feedback">
                                El precio del servicio es obligatorio y debe ser un valor positivo a dos decimales.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="editarDescripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="editarDescripcion" name="descripcion" required></textarea>
                            <div class="invalid-feedback">
                                La descripción del servicio es obligatoria.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="imagen">Imagen</label>
                            <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
                    
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Confirmación de Eliminación -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro que deseas eliminar este servicio? Esta acción no se puede deshacer.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteButton">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('custom_js'); ?>
    <script src="<?php echo e(asset('js/servicio.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Miguel\IdeaProjects\Shine-Go\resources\views\VistaServicios\gestionServicios.blade.php ENDPATH**/ ?>