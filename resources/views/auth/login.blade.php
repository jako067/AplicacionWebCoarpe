@extends('layout.layout')
@section('title', 'Login')
@section('content')

<div class="d-flex align-items-center justify-content-center vh-100">
    <div class="card login-card border-0 shadow-sm">
        <div class="card-body p-4 p-sm-5">

            <div class="text-center mb-4">
                <div class="logo-box d-inline-flex align-items-center justify-content-center text-white fw-bold mb-3 shadow-sm">
                    C
                </div>
                <h2 class="fw-bold mb-1 text-dark">COARPE</h2>
                <p class="text-muted small">Sistema de Gestión Empresarial</p>
            </div>

            <form action="{{ route('login') }}" method="post">
                @csrf

                <div class="mb-3">
                    <label for="username" class="form-label text-muted fw-semibold small mb-1">Nombre de Usuario:</label>
                    <div class="input-group">
                        <span class="input-group-text border-end-0">
                            <i class="bi bi-person"></i>
                        </span>
                        <input type="text" class="form-control border-start-0 ps-0" name="username" id="username" value="{{ old('username') }}" placeholder="Ej: 12345678A" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label text-muted fw-semibold small mb-1">Contraseña:</label>
                    <div class="input-group">
                        <span class="input-group-text border-end-0">
                            <i class="bi bi-lock"></i>
                        </span>
                        <input type="password" class="form-control border-start-0 ps-0" name="password" id="password" placeholder="••••••••" required>
                    </div>
                </div>

                <div class="mb-4 form-check">
                    <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label text-muted small" for="remember">Recuérdame</label>
                </div>

                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-login py-2 fw-semibold shadow-sm">Iniciar Sesión</button>
                </div>
            </form>



        </div>
    </div>
</div>

@endsection
