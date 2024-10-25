@extends('layout.app')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Shine&Go</b> Login</a>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Inicia sesión para continuar</p>

            <form action="{{ route('usuario.login') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" name="correo" class="form-control" placeholder="Correo" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">

                    </div>



                    <div class="col-4">
                        
                        <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                        <a href="{{ url('/') }}" class="btn btn-danger btn-block">Cancelar</a>
                        <center>
                        <a href="{{ route('usuario.register.form') }}" class="btn btn-link">¿No tienes una cuenta? Regístrate</a>
                        </center>
                       

                    </div>


                    <div class="col-4">

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: '¡Éxito!',
        text: "{{ session('success') }}",
        showConfirmButton: false,
        timer: 3000
    });
</script>
@endif

@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Error',
        text: "{{ session('error') }}",
        showConfirmButton: true
    });
</script>
@endif

@if(session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 3000
        });
    });
</script>
@endif

@if($errors->any())
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: "{{ $errors->first() }}",
            showConfirmButton: true,
        });
    });
</script>
@endif


@endsection