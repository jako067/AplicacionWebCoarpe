@extends('layout.layout')
@section('title', __('Registro de Usuario'))

@section('content')
<div class="d-flex align-items-center justify-content-center min-vh-100 py-5">
    <div class="card register-card border-0 shadow-sm">
        <div class="card-body p-4 p-sm-5">

            <div class="text-center mb-5">
                <div class="logo-box d-inline-flex align-items-center justify-content-center text-white fw-bold mb-3 shadow-sm">
                    C
                </div>
                <h2 class="fw-bold mb-1 text-dark">{{ __('Registro de Usuario') }}</h2>
                <p class="text-muted small">COARPE - {{ __('Sistema de Gestión Empresarial') }}</p>
            </div>

            <form action="{{ route('signup') }}" method="post">
                @csrf

                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="username" class="form-label text-muted fw-semibold small mb-1">{{ __('Nombre de Usuario') }}</label>
                        <div class="input-group">
                            <span class="input-group-text border-end-0"><i class="bi bi-person-badge"></i></span>
                            <input type="text" class="form-control border-start-0 ps-0 @error('username') is-invalid @enderror" name="username" id="username" value="{{ old('username') }}" placeholder="Ej: admin123" required>
                            @error('username')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="name" class="form-label text-muted fw-semibold small mb-1">{{ __('Nombre Completo') }}</label>
                        <div class="input-group">
                            <span class="input-group-text border-end-0"><i class="bi bi-person"></i></span>
                            <input type="text" class="form-control border-start-0 ps-0 @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" placeholder="{{ __('Ej: Juan Pérez') }}" required>
                            @error('name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label text-muted fw-semibold small mb-1">{{ __('Correo Electrónico') }}</label>
                        <div class="input-group">
                            <span class="input-group-text border-end-0"><i class="bi bi-envelope"></i></span>
                            <input type="email" class="form-control border-start-0 ps-0 @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" placeholder="correo@ejemplo.com" required>
                            @error('email')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="phone" class="form-label text-muted fw-semibold small mb-1">{{ __('Número de Teléfono') }}</label>
                        <div class="input-group">
                            <span class="input-group-text border-end-0"><i class="bi bi-telephone"></i></span>
                            <input type="text" class="form-control border-start-0 ps-0 @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ old('phone') }}" placeholder="Ej: 600123456" required>
                            @error('phone')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="DNI" class="form-label text-muted fw-semibold small mb-1">{{ __('Número de DNI') }}</label>
                        <div class="input-group">
                            <span class="input-group-text border-end-0"><i class="bi bi-card-text"></i></span>
                            <input type="text" class="form-control border-start-0 ps-0 @error('DNI') is-invalid @enderror" name="DNI" id="DNI" value="{{ old('DNI') }}" placeholder="{{ __('Ej: 12345678A') }}" required>
                            @error('DNI')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="password" class="form-label text-muted fw-semibold small mb-1">{{ __('Contraseña') }}</label>
                        <div class="input-group">
                            <span class="input-group-text border-end-0"><i class="bi bi-lock"></i></span>
                            <input type="password" class="form-control border-start-0 ps-0 @error('password') is-invalid @enderror" name="password" id="password" placeholder="••••••••" required>
                            @error('password')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 mt-3">
                        <label for="password_confirmation" class="form-label text-muted fw-semibold small mb-1">{{ __('Confirmar Contraseña') }}</label>
                        <div class="input-group">
                            <span class="input-group-text border-end-0"><i class="bi bi-lock-fill"></i></span>
                            <input type="password" class="form-control border-start-0 ps-0" name="password_confirmation" id="password_confirmation" placeholder="••••••••" required>
                        </div>
                    </div>
                </div>

                <div class="d-grid mt-4 pt-2">
                    <button type="submit" class="btn btn-login py-2 fw-semibold shadow-sm">{{ __('Registrarse') }}</button>
                </div>
            </form>

            <div class="text-center mt-4">
                <p class="small text-muted mb-0">{{ __('¿Ya tienes cuenta?') }} <a href="{{ route('login') }}" class="link-registro fw-semibold text-decoration-none">{{ __('Inicia sesión aquí') }}</a></p>
            </div>

        </div>
    </div>
</div>
<script src="{{ asset('js/signup.js') }}"></script>
@endsection
