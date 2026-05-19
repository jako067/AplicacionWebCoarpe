@extends('layout.layout')

@section('title', __('Editar Daily Work'))

@section('content')

<div class="container mt-5">
    <div class="card shadow-sm p-4">
        <h2 class="mb-4 text-center">{{ __('Editar Daily Work') }}</h2>

        <form action="{{ route('daily_work.update', $dailyWork->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">{{ __('Grupo') }}</label>
                <select name="group_id" class="form-control">
                    @foreach ($groups as $group)
                        <option value="{{ $group->id }}"
                            {{ $dailyWork->group_id == $group->id ? 'selected' : '' }}>
                            {{ $group->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('Fecha') }}</label>
                <input type="date" name="date" class="form-control" value="{{ $dailyWork->date }}">
            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('Reporte') }}</label>
                <input type="text" name="reporte" class="form-control" value="{{ $dailyWork->reporte }}">
            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('Evaluación') }}</label>
                <input type="text" name="evaluation" class="form-control" value="{{ $dailyWork->evaluation }}">
            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('Incidencias') }}</label>
                <input type="text" name="incidences" class="form-control" value="{{ $dailyWork->incidences }}">
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">{{ __('Actualizar') }}</button>
                <a href="{{ route('daily_work.index') }}" class="btn btn-outline-secondary">{{ __('Cancelar') }}</a>
            </div>
        </form>
    </div>
</div>

@endsection
