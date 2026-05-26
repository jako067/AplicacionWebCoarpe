
@extends('layout.layout')

@section('title', __('Historial de Faltas'))

@section('content')
<div class="container-fluid max-w-4xl">

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div class="d-flex align-items-center">
            <a href="{{ route('users.index') }}" class="btn btn-sm btn-outline-secondary me-3 shadow-sm">
                <i class="bi bi-arrow-left"></i> {{ __('Volver') }}
            </a>
            <h2 class="fw-bold mb-0 text-dark">
                {{ __('Faltas de') }} <span class="text-danger">{{ $user->name }}</span>
            </h2>
        </div>

        <a href="{{ route('absences.create', $user->id) }}" class="btn btn-sm btn-danger shadow-sm">
            <i class="bi bi-plus-lg me-1"></i> {{ __('Nueva Falta') }}
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-3 overflow-hidden">

        <div class="card-header bg-white border-bottom p-3 d-flex justify-content-between align-items-center border-top border-danger border-3">
            <h6 class="fw-bold text-dark mb-0">
                <i class="bi bi-journal-x text-danger me-2"></i> {{ __('Registro de Incidencias') }}
            </h6>
            <span class="badge bg-danger rounded-pill">{{ $absences->count() }} {{ __('registros') }}</span>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="text-muted small fw-semibold ps-4" style="width: 20%;">{{ __('Fecha') }}</th>
                        <th class="text-muted small fw-semibold" style="width: 30%;">{{ __('Tipo de Incidencia') }}</th>
                        <th class="text-muted small fw-semibold pe-4">{{ __('Detalles / Motivo') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($absences as $absence)
                        <tr>
                            <td class="ps-4 fw-medium text-dark">
                                <i class="bi bi-calendar-event text-secondary me-2"></i>
                                {{ $absence->fecha }}
                            </td>

                            <td>
                                <span class="badge bg-warning bg-opacity-25 text-dark border border-warning border-opacity-50 px-2 py-1">
                                    <i class="bi bi-tag me-1 text-warning"></i>
                                    {{ $absence->tipo ?: __('Sin clasificar') }}
                                </span>
                            </td>

                            <td class="text-muted small pe-4">
                                {{ $absence->descripcion ?? __('No se añadieron detalles a este registro.') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-5">
                                <i class="bi bi-check-circle-fill fs-1 text-success opacity-75 d-block mb-3"></i>
                                <h6 class="fw-bold text-dark">{{ __('¡Historial limpio!') }}</h6>
                                <p class="text-muted mb-0">{{ __('Este empleado no tiene ninguna falta o incidencia registrada.') }}</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
