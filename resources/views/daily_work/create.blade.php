@extends('layout.layout')

@section('title', __('Agregar Daily Work'))

@section('content')

    <div class="container mt-5">
        <div class="card shadow-sm p-4">
            <h2 class="mb-4 text-center">{{ __('Agregar Daily Work') }}</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('daily_work.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">{{ __('Fecha') }}</label>
                    <input type="date" name="date" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('Grupo') }}</label>
                    <select name="group_id" class="form-control">
                        <option value="">{{ __('Selecciona un grupo') }}</option>
                        @foreach ($groups as $group)
                            <option value="{{ $group->id }}">{{ $group->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('Reporte') }}</label>
                    <input type="text" name="reporte" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('Evaluación') }}</label>
                    <input type="text" name="evaluation" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('Incidencias') }}</label>
                    <input type="text" name="incidences" class="form-control">
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
                    <a href="{{ route('daily_work.index') }}" class="btn btn-outline-secondary">{{ __('Cancelar') }}</a>
                </div>
            </form>
        </div>
    </div>

@endsection
