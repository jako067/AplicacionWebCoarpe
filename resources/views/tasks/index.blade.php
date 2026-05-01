@extends('layout.layout')

@section('title', 'Listado de Tareas y Jornadas')

@section('content')
<div class="container-fluid max-w-4xl">

    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4 gap-3">
        <div>
            <h2 class="fw-bold mb-0 text-dark">Jornadas de Trabajo</h2>
            <p class="text-muted mb-0">Registro diario de entradas, salidas y horas extra.</p>
        </div>
        <a href="{{ route('tasks.create') }}" class="btn btn-verde-oscuro fw-semibold shadow-sm rounded-3 px-4 py-2">
            <i class="bi bi-plus-lg me-2"></i> Registrar Jornada
        </a>
    </div>

    <div class="row mb-4">
        <div class="col-md-5 col-lg-4">
            <div class="card border-0 shadow-sm bg-verde-oscuro text-white p-3 h-100 rounded-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-circle-sm bg-white bg-opacity-25 rounded-3 d-flex align-items-center justify-content-center flex-shrink-0" style="width: 48px; height: 48px;">
                        <i class="bi bi-stopwatch fs-4 text-white"></i>
                    </div>
                    <div>
                        <p class="mb-0 small text-white text-opacity-75 text-uppercase tracking-wider">Total Acumulado</p>
                        <h3 class="fw-bold mb-0">{{ $totalHours }} <span class="fs-6 fw-normal text-white text-opacity-75">h totales</span></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-3 overflow-hidden">

        <div class="card-header bg-white border-bottom p-3 d-flex justify-content-between align-items-center">
            <h6 class="fw-bold text-dark mb-0"><i class="bi bi-calendar-check text-primary me-2"></i> Historial de Jornadas</h6>
            <span class="badge bg-secondary rounded-pill">{{ $tasks->count() }} registros</span>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="text-muted small fw-semibold ps-4">Fecha</th>
                        <th class="text-muted small fw-semibold text-center">Horario</th>
                        <th class="text-muted small fw-semibold text-center">Descanso</th>
                        <th class="text-muted small fw-semibold text-center">Extra</th>
                        <th class="text-muted small fw-semibold text-end">Total</th>
                        <th class="text-muted small fw-semibold text-end pe-4">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tasks as $task)
                        <tr>
                            <td class="ps-4 text-dark fw-medium">
                                <i class="bi bi-calendar-event text-secondary me-2"></i>
                                {{ $task->task_date }}
                            </td>

                            <td class="text-center text-muted small">
                                {{ $task->entry_time }} - {{ $task->exit_time }}
                            </td>

                            <td class="text-center text-muted small">
                                <i class="bi bi-cup-hot text-secondary me-1"></i> {{ $task->break_minutes }} min
                            </td>

                            <td class="text-center">
                                @if($task->extra_hours > 0)
                                    <span class="badge bg-warning bg-opacity-25 text-dark border border-warning border-opacity-50">
                                        +{{ $task->extra_hours }} h
                                    </span>
                                @else
                                    <span class="text-muted small">-</span>
                                @endif
                            </td>

                            <td class="text-end fw-bold text-verde-oscuro">
                                {{ $task->total_hours }} h
                            </td>

                            <td class="text-end pe-4">
                                <div class="d-flex justify-content-end gap-1">
                                    <a href="{{ route('tasks.show', $task->id_task) }}" class="btn btn-sm btn-outline-secondary" title="Ver Detalle">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('tasks.edit', $task->id_task) }}" class="btn btn-sm btn-outline-primary" title="Editar">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('tasks.destroy', $task->id_task) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Borrar este registro?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Borrar">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="bi bi-calendar-x fs-2 d-block mb-2 opacity-50"></i>
                                <p class="mb-0">No hay jornadas registradas.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
