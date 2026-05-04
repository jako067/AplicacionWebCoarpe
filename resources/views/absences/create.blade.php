
@extends('layout.layout')

@section('title', 'Registrar Ausencia')

@section('content')
    <h2>Añadir falta a {{ $user->name }}</h2>

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

    <div>
        <label>Tipo</label>
        <input type="text" name="tipo" placeholder="Ej: ausencia, retraso">
    </div>

    <div>
        <label>Descripción</label>
        <textarea name="descripcion"></textarea>
    </div>

    <button type="submit">Guardar falta</button>
</form>
{{-- ESTILOS PERO ESPERANDO A LOS GRUPOS
 <div class="container-fluid max-w-4xl">

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div class="d-flex align-items-center">
            <a href="{{ route('users.index') }}" class="btn btn-sm btn-outline-secondary me-3 shadow-sm" title="Volver al listado">
                <i class="bi bi-arrow-left"></i> Volver
            </a>
            <h2 class="fw-bold mb-0 text-dark">
                Añadir Falta a <span class="text-danger">{{ $user->name }}</span>
            </h2>
        </div>
    </div>

    <div class="card border-0 shadow-sm p-4 border-top border-danger border-3">

        <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
            <div class="icon-circle-sm bg-danger bg-opacity-10 text-danger rounded me-3 d-flex align-items-center justify-content-center flex-shrink-0" style="width: 40px; height: 40px;">
                <i class="bi bi-calendar-x fs-5"></i>
            </div>
            <h5 class="fw-bold mb-0 text-dark">Detalles del Incidente / Ausencia</h5>
        </div>

        <form method="POST" action="{{ route('absences.store', $user) }}">
            @csrf

            <div class="row g-4">

                <div class="col-md-6">
                    <label for="fecha" class="form-label text-muted fw-semibold small mb-1">Fecha <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-muted"><i class="bi bi-calendar-event"></i></span>
                        <input type="date" class="form-control @error('fecha') is-invalid @enderror" name="fecha" id="fecha" value="{{ old('fecha', now()->format('Y-m-d')) }}" required>
                        @error('fecha')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="tipo" class="form-label text-muted fw-semibold small mb-1">Tipo de Falta</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-muted"><i class="bi bi-tag"></i></span>
                        <input type="text" class="form-control @error('tipo') is-invalid @enderror" name="tipo" id="tipo" value="{{ old('tipo') }}" placeholder="Ej: Ausencia, Retraso, Incidencia...">
                        @error('tipo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <label for="descripcion" class="form-label text-muted fw-semibold small mb-1">Descripción / Motivo</label>
                    <textarea class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" id="descripcion" rows="4" placeholder="Detalla aquí lo ocurrido (opcional)...">{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <hr class="my-4 text-muted opacity-25">

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('users.index') }}" class="btn btn-light border px-4 shadow-sm">Cancelar</a>
                <button type="submit" class="btn btn-danger fw-semibold px-4 shadow-sm">
                    <i class="bi bi-shield-exclamation me-2"></i> Guardar Falta
                </button>
            </div>

        </form>
    </div>
</div> --}}
@endsection
