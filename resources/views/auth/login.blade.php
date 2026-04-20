@extends('layout.layout')
@section('title','Login')
@section('content')

<div class="container mt-5 d-flex justify-content-center">
    <div class="card shadow-sm p-4 login-card">
        <h2 class="mb-4 text-center">Iniciar sesión</h2>

        <form action="{{route('login')}}" method="post">
            @csrf

            <div class="mb-3">
                <label for="username" class="form-label">Nombre de Usuario</label>
                <input type="text" name="username" id="username" class="form-control" value="{{old('username')}}">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>

            <div class="form-check mb-3">
                <input type="checkbox" name="remember" id="remember" class="form-check-input" {{old('remember') ? 'checked' : ''}}>
                <label for="remember" class="form-check-label">Recuérdame</label>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Iniciar sesión</button>
            </div>
        </form>
    </div>
</div>

@endsection
