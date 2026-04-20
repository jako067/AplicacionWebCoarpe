@extends('layout.layout')
@section('title', 'Falta')
@section('content')

<div class="container mt-5">
    <div class="card shadow-sm p-4">
        <h2 class="mb-4 text-center">Añadir falta a {{ $user->name }}</h2>

        <form method="POST" action="{{ route('absences.store', $user) }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Fecha</label>
                <input type="date" name="fecha" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tipo</label>
                <input type="text" name="tipo" class="form-control" placeholder="Ej: ausencia, retraso">
            </div>

            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <textarea name="descripcion" class="form-control" rows="3"></textarea>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Guardar falta</button>
            </div>
        </form>
    </div>
</div>

@endsection
