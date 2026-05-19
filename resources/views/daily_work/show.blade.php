@extends('layout.layout')

@section('title', __('Detalle Daily Work'))

@section('content')

<div class="container mt-5">
    <div class="card shadow-sm p-4">

        <h2 class="mb-3">{{ __('Detalle del Daily Work') }}</h2>

        <p><strong>{{ __('Grupo:') }}</strong> {{ $dailyWork->group->name ?? __('Sin grupo') }}</p>
        <p><strong>{{ __('Fecha:') }}</strong> {{ \Carbon\Carbon::parse($dailyWork->date)->format('d/m/Y') }}</p>

        <hr>

        <p><strong>{{ __('Reporte:') }}</strong></p>
        <p>{{ $dailyWork->reporte }}</p>

        <hr>

        <p><strong>{{ __('Evaluación:') }}</strong> {{ $dailyWork->evaluation }}</p>

        <hr>

        <p><strong>{{ __('Incidencias:') }}</strong></p>
        <p>{{ $dailyWork->incidences }}</p>

        <a href="{{ route('daily_work.index') }}" class="btn btn-secondary mt-3">
            {{ __('Volver') }}
        </a>

    </div>
</div>

@endsection
