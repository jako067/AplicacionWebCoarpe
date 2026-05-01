

@extends('layout.layout')

@section('title', 'Gestión de Personal')

@section('content')
{{--ESTILOS DE LOS USERS PERO FALTA LO DE LOS GRUPOS PA NO LIAR MUCHO SI TENEIS QUE HACER PRUEBAS

<div class="container-fluid max-w-4xl">

    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4 gap-3">
        <div>
            <h2 class="fw-bold mb-0 text-dark">Gestión de Personal</h2>
            <p class="text-muted mb-0">Listado de empleados y control de ausencias.</p>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-3 overflow-hidden">

        <div class="card-header bg-white border-bottom p-3 d-flex justify-content-between align-items-center">
            <h6 class="fw-bold text-dark mb-0">
                <i class="bi bi-people-fill text-verde-oscuro me-2"></i> Plantilla Activa
            </h6>
            <span class="badge bg-secondary rounded-pill">{{ $users->count() }} empleados</span>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="text-muted small fw-semibold ps-4">Empleado</th>
                        <th class="text-muted small fw-semibold text-end pe-4">Gestión de Asistencia</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td class="ps-4 py-3">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="icon-circle-sm bg-light text-secondary rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 40px; height: 40px;">
                                        <i class="bi bi-person-fill fs-5"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold text-dark mb-0">{{ $user->name }}</h6>
                                        <small class="text-muted">ID: #{{ $user->id }}</small>
                                    </div>
                                </div>
                            </td>

                            <td class="text-end pe-4">
                                <div class="d-flex justify-content-end gap-2">

                                    <a href="{{ route('absences.index', $user->id) }}" class="btn btn-sm btn-light border text-dark shadow-sm">
                                        <i class="bi bi-calendar3 me-1 text-secondary"></i> Ver faltas
                                    </a>

                                    <a href="{{ route('absences.create', $user->id) }}" class="btn btn-sm btn-outline-danger shadow-sm">
                                        <i class="bi bi-calendar-x me-1"></i> Añadir falta
                                    </a>

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="text-center py-5 text-muted">
                                <i class="bi bi-people fs-2 d-block mb-2 opacity-50"></i>
                                <p class="mb-0">No hay usuarios registrados en el sistema.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div> --}}
@foreach($users as $user)
    <p>{{ $user->name }}</p>

    <a href="{{ route('absences.index', $user->id) }}">
        Ver faltas
    </a>

    <a href="{{ route('absences.create', $user->id) }}">
        Añadir falta
    </a>
@endforeach
@endsection
