@extends('layout.layout')

@section('title', 'Editar Daily Work')

@section('content')

    <div class="container mt-5">
        <div class="card shadow-sm p-4">
            <h2 class="mb-4 text-center">Editar Daily Work</h2>

            <form action="{{ route('daily_work.update', $dailyWork->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Work ID</label>
                    <input type="number" name="work_id" class="form-control" value="{{ $dailyWork->work_id }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Reporte</label>
                    <input type="text" name="reporte" class="form-control" value="{{ $dailyWork->reporte }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Fecha</label>
                    <input type="date" name="date" class="form-control" value="{{ $dailyWork->date }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Evaluación</label>
                    <input type="text" name="evaluation" class="form-control" value="{{ $dailyWork->evaluation }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Incidencias</label>
                    <input type="text" name="Incidences" class="form-control" value="{{ $dailyWork->Incidences }}">
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="{{ route('daily_work.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

@endsection
