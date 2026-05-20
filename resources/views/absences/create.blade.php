@extends('layout.layout')

@section('title', __('Registrar Ausencia'))

@section('content')
<div class="container-fluid max-w-4xl">

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div class="d-flex align-items-center">
            <a href="{{ route('users.index') }}" class="btn btn-sm btn-outline-secondary me-3 shadow-sm">
                <i class="bi bi-arrow-left"></i> {{ __('Volver') }}
            </a>
            <h2 class="fw-bold mb-0 text-dark">
                {{ __('Añadir Falta a') }} <span class="text-danger">{{ $user->name }}</span>
            </h2>
        </div>
    </div>

    <div class="card border-0 shadow-sm p-4 border-top border-danger border-3 rounded-3">

        <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
            <div class="icon-circle-sm bg-danger bg-opacity-10 text-danger rounded me-3 d-flex align-items-center justify-content-center flex-shrink-0" style="width: 40px; height: 40px;">
                <i class="bi bi-calendar-x fs-5"></i>
            </div>
            <h5 class="fw-bold mb-0 text-dark">{{ __('Detalles del Incidente / Ausencia') }}</h5>
        </div>

        <form method="POST" action="{{ route('absences.store', $user) }}">
            @csrf

            <div class="row g-4">

                <div class="col-md-6">
                    <label for="fecha" class="form-label text-muted fw-semibold small mb-1">{{ __('Fecha del Incidente') }} <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-muted"><i class="bi bi-calendar-event"></i></span>
                        <input type="date" class="form-control @error('fecha') is-invalid @enderror" name="fecha" id="fecha" value="{{ old('fecha', now()->format('Y-m-d')) }}" required>
                        @error('fecha')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="tipo" class="form-label text-muted fw-semibold small mb-1">{{ __('Tipo de Falta') }}</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-muted"><i class="bi bi-tag"></i></span>
                        <input type="text" class="form-control @error('tipo') is-invalid @enderror" name="tipo" id="tipo" value="{{ old('tipo') }}" placeholder="{{ __('Ej: Ausencia, Retraso, Abandono de puesto...') }}">
                        @error('tipo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <label for="descripcion" class="form-label text-muted fw-semibold small mb-1">{{ __('Descripción / Motivo Detallado') }}</label>
                    <textarea class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" id="descripcion" rows="4" placeholder="{{ __('Escribe aquí los motivos o comentarios adicionales sobre la incidencia del trabajador...') }}"></textarea>
                    @error('descripcion')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <hr class="my-4 text-muted opacity-25">

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('users.index') }}" class="btn btn-light border px-4 shadow-sm">{{ __('Cancelar') }}</a>
                <button type="submit" class="btn btn-danger fw-semibold px-4 shadow-sm">
                    <i class="bi bi-shield-exclamation me-2"></i> {{ __('Guardar Falta') }}
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
