@extends('layout.layout')

@section('title', __('Editar Presupuesto'))

@section('content')
<div class="container-fluid max-w-4xl">

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div class="d-flex align-items-center">
            <a href="{{ route('budgets.index') }}" class="btn btn-sm btn-outline-secondary me-3 shadow-sm">
                <i class="bi bi-arrow-left"></i> {{ __('Volver') }}
            </a>
            <h2 class="fw-bold mb-0 text-dark">{{ __('Editar Presupuesto') }} <span class="text-verde-oscuro">#{{ $budget->id_budget }}</span></h2>
        </div>
    </div>

    <div class="card border-0 shadow-sm p-4">

        <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
            <i class="bi bi-pencil-square fs-4 me-2 text-verde-oscuro"></i>
            <h5 class="fw-bold mb-0 text-dark">{{ __('Modificar Datos Base (Mano de Obra y Tiempos)') }}</h5>
        </div>

        <form action="{{ route('budgets.update', $budget->id_budget) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-4 mb-2">
                <div class="col-md-6">
                    <label for="workers_quantity" class="form-label text-muted fw-semibold small mb-1">{{ __('Número de Trabajadores (Peones)') }} <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-muted"><i class="bi bi-people-fill"></i></span>
                        <input type="number" class="form-control @error('workers_quantity') is-invalid @enderror" name="workers_quantity" id="workers_quantity" value="{{ old('workers_quantity', $budget->workers_quantity) }}">
                        @error('workers_quantity')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="price_x_hour" class="form-label text-muted fw-semibold small mb-1">{{ __('Precio por Hora (€)') }} <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-muted"><i class="bi bi-currency-euro"></i></span>
                        <input type="number" step="0.01" class="form-control @error('price_x_hour') is-invalid @enderror" name="price_x_hour" id="price_x_hour" value="{{ old('price_x_hour', $budget->price_x_hour) }}">
                        @error('price_x_hour')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="hours_quantity" class="form-label text-muted fw-semibold small mb-1">{{ __('Horas Totales Estimadas') }} <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-muted"><i class="bi bi-clock-history"></i></span>
                        <input type="number" class="form-control @error('hours_quantity') is-invalid @enderror" name="hours_quantity" id="hours_quantity" value="{{ old('hours_quantity', $budget->hours_quantity) }}">
                        <span class="input-group-text bg-light text-muted">h</span>
                        @error('hours_quantity')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <hr class="my-4 text-muted opacity-25">

            <div class="alert alert-info bg-light border-info border-opacity-25 text-dark d-flex align-items-center mb-4" role="alert">
                <i class="bi bi-info-circle-fill text-info fs-5 me-3"></i>
                <small>{{ __('Al guardar los cambios, el sistema recalculará automáticamente el coste total de la mano de obra para este presupuesto.') }}</small>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('budgets.index') }}" class="btn btn-light border px-4">{{ __('Cancelar') }}</a>
                <button type="submit" class="btn btn-verde-oscuro fw-semibold px-4 shadow-sm">
                    <i class="bi bi-calculator me-2"></i> {{ __('Recalcular y Actualizar') }}
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
