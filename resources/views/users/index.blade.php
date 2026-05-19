@extends('layout.layout')

@section('title', __('Gestión de Faltas'))

@section('content')
<div class="container-fluid max-w-4xl">

    <div class="mb-4">
        <h2 class="fw-bold mb-1 text-dark">{{ __('Gestión de Faltas y Asistencia') }}</h2>
        <p class="text-muted mb-0">{{ __('Selecciona un miembro de la plantilla para revisar su historial o registrar una nueva incidencia.') }}</p>
    </div>

    <div class="card border-0 shadow-sm p-4 rounded-3 bg-white">

        @forelse ($users->groupBy('rol') as $rol => $groupedUsers)

            <div class="col-12 {{ !$loop->first ? 'mt-5' : '' }} mb-3">
                <span class="badge bg-secondary bg-opacity-10 text-dark border border-secondary border-opacity-25 fw-bold text-uppercase tracking-wider px-3 py-1" style="font-size: 0.75rem;">
                    <i class="bi bi-person-workspace me-1 text-secondary"></i>
                    {{ match($rol) {
                        'admin' => __('Administradores'),
                        'foreman' => __('Capataces / Jefes de Equipo'),
                        'laborer' => __('Operarios / Trabajadores'),
                        default => __('Sin Rol Asignado')
                    } }}
                </span>
            </div>

            <div class="row g-3">
                @foreach ($groupedUsers as $user)
                    <div class="col-xl-4 col-md-6">
                        <div class="card h-100 border border-secondary border-opacity-10 bg-light bg-opacity-25 rounded-3 p-3 text-center transition-hover shadow-xs">

                            <div class="mx-auto mb-2">
                                <div class="icon-circle-sm bg-white text-secondary border rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 48px; height: 48px; margin: 0 auto;">
                                    <i class="bi bi-person-badge fs-5"></i>
                                </div>
                            </div>

                            <h6 class="fw-bold text-dark mb-0 text-truncate" title="{{ $user->name }}">
                                {{ $user->name }}
                            </h6>
                            <small class="text-muted d-block mb-3">ID: #{{ $user->id }}</small>

                            <div class="d-flex flex-column gap-2 mt-auto">
                                <a href="{{ route('absences.index', $user->id) }}"
                                   class="btn btn-sm btn-white border text-dark fw-medium shadow-xs">
                                    <i class="bi bi-calendar3 me-1 text-muted"></i> {{ __('Ver historial') }}
                                </a>

                                <a href="{{ route('absences.create', $user->id) }}"
                                   class="btn btn-sm btn-outline-danger fw-medium shadow-xs">
                                    <i class="bi bi-calendar-x me-1"></i> {{ __('Añadir falta') }}
                                </a>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

        @empty
            <div class="text-center py-5 text-muted">
                <i class="bi bi-people fs-1 d-block mb-2 opacity-50"></i>
                <p class="mb-0">{{ __('No se encontraron miembros en la plantilla para gestionar.') }}</p>
            </div>
        @endforelse

    </div>
</div>
@endsection
