@extends('layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center" style="background-color: #17a2b8; color: white;">
                    <h4>Registro de Usuario</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('usuario.register') }}" id="registerForm">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="nombre">Nombre Completo</label>
                            <input type="text" class="form-control" id="nombre" name="nombre_completo" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" name="correo" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="direccion">Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="telefono">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required minlength="8">
                            <small class="form-text text-muted">La contraseña debe tener al menos 8 caracteres.</small>
                            <small id="passwordError" class="text-danger" style="display: none;">Las contraseñas no coinciden.</small>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password_confirmation">Confirmar Contraseña</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Registrarse</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = $('#registerForm');
        const passwordInput = $('#password');
        const confirmPasswordInput = $('#password_confirmation');
        const passwordError = $('#passwordError');

        form.on('submit', function(e) {
            e.preventDefault(); // Previene el envío normal del formulario

            if (passwordInput.val() !== confirmPasswordInput.val()) {
                passwordError.show();
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Las contraseñas no coinciden.'
                });
                return;
            } else {
                passwordError.hide();
            }

            $.ajax({
                url: "{{ route('usuario.register') }}",
                type: 'POST',
                data: form.serialize(),
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: '¡Registro exitoso!',
                        text: 'El usuario se ha registrado correctamente.',
                    }).then(() => {
                        window.location.href = "{{ route('login.form') }}";
                    });
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        if (errors.correo) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'El correo ya está en uso. Por favor, elige otro.',
                            });
                        }
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Hubo un problema con el registro. Inténtalo nuevamente.',
                        });
                    }
                }
            });
        });
    });
</script>
@endsection
