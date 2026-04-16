@extends('layout.layout')

@section('title', 'Listado de Tareas')

@section('content')
    <h2>Jornadas de Trabajo</h2>

    <fieldset style="margin-bottom: 20px;">
        <legend>Total Horas Trabajadas</legend>
        <strong>{{ $totalHours }} h</strong> acumuladas en total (incluyendo horas extra).
    </fieldset>

    <a href="{{ route('tasks.create') }}">Registrar Nueva Jornada</a>
    <br><br>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Hora Entrada</th>
                <th>Hora Salida</th>
                <th>Descanso (min)</th>
                <th>Horas Extra</th>
                <th>Total Horas</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->id_task }}</td>
                    <td>{{ $task->task_date }}</td>
                    <td>{{ $task->entry_time }}</td>
                    <td>{{ $task->exit_time }}</td>
                    <td>{{ $task->break_minutes }} min</td>
                    <td>{{ $task->extra_hours }} h</td>
                    <td><strong>{{ $task->total_hours }} h</strong></td>
                    <td>
                        <a href="{{ route('tasks.show', $task->id_task) }}">Ver Detalle</a> |
                        <a href="{{ route('tasks.edit', $task->id_task) }}">Editar</a> |

                        <form action="{{ route('tasks.destroy', $task->id_task) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Borrar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
