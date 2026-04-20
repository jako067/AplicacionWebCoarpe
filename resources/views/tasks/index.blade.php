@extends('layout.layout')

@section('title', 'Listado de Tareas')

@section('content')

<div class="container mt-5">
    <div class="card shadow-sm p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Jornadas de Trabajo</h2>
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">
                Registrar Jornada
            </a>
        </div>

        <div class="mb-4 p-3 bg-light rounded">
            <h5 class="mb-1">Total Horas Trabajadas</h5>
            <strong class="text-primary">{{ $totalHours }} h</strong>
            <span class="text-muted">acumuladas (incluyendo horas extra)</span>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Entrada</th>
                        <th>Salida</th>
                        <th>Descanso</th>
                        <th>Extra</th>
                        <th>Total</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($tasks as $task)
                        <tr>
                            <td>{{ $task->id_task }}</td>
                            <td>{{ $task->task_date }}</td>
                            <td>{{ $task->entry_time }}</td>
                            <td>{{ $task->exit_time }}</td>
                            <td>{{ $task->break_minutes }} min</td>
                            <td>{{ $task->extra_hours }} h</td>
                            <td class="fw-bold text-primary">
                                {{ $task->total_hours }} h
                            </td>
                            <td class="text-end">
                                <a href="{{ route('tasks.show', $task->id_task) }}" class="btn btn-sm btn-outline-primary">
                                    Ver
                                </a>

                                <a href="{{ route('tasks.edit', $task->id_task) }}" class="btn btn-sm btn-outline-secondary">
                                    Editar
                                </a>

                                <form action="{{ route('tasks.destroy', $task->id_task) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        Borrar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted">
                                No hay jornadas registradas
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
