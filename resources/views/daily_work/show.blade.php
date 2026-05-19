@extends('layout.layout')

@section('title', 'Detalle del Parte Diario')

@section('content')
<div class="container-fluid max-w-4xl">

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div class="d-flex align-items-center">
            <a href="{{ route('daily_work.index') }}" class="btn btn-sm btn-outline-secondary me-3 shadow-sm" title="Volver al listado">
                <i class="bi bi-arrow-left"></i> Volver
            </a>
            <h2 class="fw-bold mb-0 text-dark">
                Parte Diario <span class="text-verde-oscuro">#{{ $dailyWork->id }}</span>
            </h2>
        </div>

        <a href="{{ route('daily_work.edit', $dailyWork->id) }}" class="btn btn-sm btn-outline-primary shadow-sm fw-semibold px-3">
            <i class="bi bi-pencil me-1"></i> Editar Parte
        </a>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="bg-white p-3 border rounded-3 shadow-sm h-100">
                <p class="text-muted fw-semibold small mb-1 text-uppercase tracking-wider" style="font-size: 0.75rem;">Grupo / Cuadrilla</p>
                <h5 class="fw-bold text-dark mb-0">
                    <i class="bi bi-building text-secondary me-1"></i> {{ $dailyWork->group->name ?? 'Sin grupo' }}
                </h5>
            </div>
        </div>
        <div class="col-md-4">
            <div class="bg-white p-3 border rounded-3 shadow-sm h-100">
                <p class="text-muted fw-semibold small mb-1 text-uppercase tracking-wider" style="font-size: 0.75rem;">Fecha del Informe</p>
                <h5 class="fw-bold text-dark mb-0">
                    <i class="bi bi-calendar3 text-secondary me-1"></i> {{ \Carbon\Carbon::parse($dailyWork->date)->format('d/m/Y') }}
                </h5>
            </div>
        </div>
        <div class="col-md-4">
            <div class="bg-white p-3 border rounded-3 shadow-sm h-100">
                <p class="text-muted fw-semibold small mb-1 text-uppercase tracking-wider" style="font-size: 0.75rem;">Rendimiento Evaluado</p>
                <h5 class="fw-bold mb-0">
                    <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-10 px-2 py-1 fs-6 fw-bold">
                        {{ $dailyWork->evaluation ?? 'Sin evaluar' }}
                    </span>
                </h5>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm p-4">

        <div class="mb-4">
            <h5 class="fw-bold text-dark border-bottom pb-2 mb-3">
                <i class="bi bi-journal-text me-2 text-verde-oscuro"></i> Reporte de Tareas Ejecutadas
            </h5>
            <div class="bg-light bg-opacity-50 p-3 rounded-3 border text-secondary" style="white-space: pre-line; min-height: 120px; line-height: 1.6;">
                {{ $dailyWork->reporte }}
            </div>
        </div>

        <div>
            <h5 class="fw-bold text-dark border-bottom pb-2 mb-3">
                <i class="bi bi-exclamation-triangle me-2 text-danger"></i> Registro de Incidencias
            </h5>
            @if($dailyWork->incidences)
                <div class="bg-danger bg-opacity-10 p-3 rounded-3 border border-danger border-opacity-25 text-danger" style="white-space: pre-line; line-height: 1.6;">
                    <i class="bi bi-shield-exclamation me-1 fw-bold"></i> {{ $dailyWork->incidences }}
                </div>
            @else
                <div class="bg-light bg-opacity-50 p-3 rounded-3 border text-muted small">
                    <i class="bi bi-check-circle-fill text-success me-2 fs-6"></i> Jornada completada sin registrar contratiempos operativos.
                </div>
            @endif
        </div>

    </div>

</div>
@endsection
