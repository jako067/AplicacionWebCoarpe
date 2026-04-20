@extends('layout.layout')

@section('title', 'Daily Work')

@section('content')

<div class="container mt-5">
    <div class="card shadow-sm p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Lista de Daily Work</h2>
            <a href="{{ route('daily_work.create') }}" class="btn btn-primary">Agregar Registro</a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Work ID</th>
                        <th>Reporte</th>
                        <th>Fecha</th>
                        <th>Evaluación</th>
                        <th>Incidencias</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dailyWorks as $dailyWork)
                        <tr>
                            <td>{{ $dailyWork->work_id }}</td>
                            <td>{{ $dailyWork->reporte }}</td>
                            <td>{{ $dailyWork->date }}</td>
                            <td>{{ $dailyWork->evaluation }}</td>
                            <td>{{ $dailyWork->Incidences }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">
                                No hay registros aún
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
