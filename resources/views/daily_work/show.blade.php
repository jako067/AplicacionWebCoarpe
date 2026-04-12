@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle de Daily Work</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Work ID: {{ $dailyWork->work_id }}</h5>
            <p class="card-text"><strong>Reporte:</strong> {{ $dailyWork->reporte }}</p>
            <p class="card-text"><strong>Fecha:</strong> {{ $dailyWork->date }}</p>
            <p class="card-text"><strong>Evaluación:</strong> {{ $dailyWork->evaluation }}</p>
            <p class="card-text"><strong>Incidencias:</strong> {{ $dailyWork->Incidences }}</p>
            <a href="{{ route('daily_work.edit', $dailyWork->id) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('daily_work.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection
