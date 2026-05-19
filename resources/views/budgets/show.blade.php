@extends('layout.layout')

@section('title', __('Detalle del Presupuesto'))

@section('content')
<div class="container-fluid max-w-4xl">

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div class="d-flex align-items-center">
            <a href="{{ route('budgets.index') }}" class="btn btn-sm btn-outline-secondary me-3 shadow-sm">
                <i class="bi bi-arrow-left"></i> {{ __('Volver') }}
            </a>
            <h2 class="fw-bold mb-0 text-dark">
                {{ __('Presupuesto') }} <span class="text-verde-oscuro">#{{ $budget->id_budget }}</span>
            </h2>
        </div>

        <a href="{{ route('budgets.edit', $budget->id_budget) }}" class="btn btn-sm btn-outline-primary shadow-sm">
            <i class="bi bi-pencil me-1"></i> {{ __('Editar') }}
        </a>
    </div>

    <div class="card border-0 shadow-sm overflow-hidden mb-4">

        <div class="card-header bg-white border-bottom p-4">
            <h5 class="fw-bold text-dark mb-0">
                <i class="bi bi-people-fill fs-5 me-2 text-verde-oscuro"></i> {{ __('Datos de Mano de Obra') }}
            </h5>
        </div>

        <div class="card-body p-4 bg-light bg-opacity-50">
            <div class="row g-4">

                <div class="col-sm-6 col-md-3">
                    <div class="bg-white p-3 border rounded-3 h-100 shadow-sm">
                        <p class="text-muted fw-semibold small mb-1 text-uppercase">{{ __('Nº Trabajadores') }}</p>
                        <h4 class="fw-bold text-dark mb-0">
                            {{ $budget->workers_quantity }} <span class="fs-6 text-muted fw-normal">{{ __('peones') }}</span>
                        </h4>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3">
                    <div class="bg-white p-3 border rounded-3 h-100 shadow-sm">
                        <p class="text-muted fw-semibold small mb-1 text-uppercase">{{ __('Horas Estimadas') }}</p>
                        <h4 class="fw-bold text-dark mb-0">
                            {{ $budget->hours_quantity }} <span class="fs-6 text-muted fw-normal">h</span>
                        </h4>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3">
                    <div class="bg-white p-3 border rounded-3 h-100 shadow-sm">
                        <p class="text-muted fw-semibold small mb-1 text-uppercase">{{ __('Precio / Hora') }}</p>
                        <h4 class="fw-bold text-dark mb-0">
                            {{ number_format($budget->price_x_hour, 2) }} €
                        </h4>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3">
                    <div class="bg-white p-3 border rounded-3 border-success border-opacity-50 h-100 shadow-sm">
                        <p class="text-success fw-bold small mb-1 text-uppercase">{{ __('Coste Total (M.O.)') }}</p>
                        <h4 class="fw-bold text-success mb-0">
                            {{ number_format($budget->final_price, 2) }} €
                        </h4>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm overflow-hidden">

        <div class="card-header bg-white border-bottom p-4 d-flex justify-content-between align-items-center">
            <h5 class="fw-bold text-dark mb-0">
                <i class="bi bi-bricks fs-5 me-2 text-primary"></i> {{ __('Materiales Asignados') }}
            </h5>
            <span class="badge bg-secondary rounded-pill">{{ $budget->materials->count() }} {{ __('en la lista') }}</span>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="text-muted small fw-semibold ps-4">{{ __('Nombre del Material') }}</th>
                        <th class="text-muted small fw-semibold text-end">{{ __('Precio Ud.') }}</th>
                        <th class="text-muted small fw-semibold text-center">{{ __('Cantidad Usada') }}</th>
                        <th class="text-muted small fw-semibold text-end pe-4">{{ __('Subtotal') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($budget->materials as $material)
                        <tr>
                            <td class="ps-4 fw-medium text-dark">
                                <i class="bi bi-box-seam text-secondary me-2"></i> {{ $material->material_name }}
                            </td>
                            <td class="text-end text-muted">
                                {{ number_format($material->unity_price, 2) }} €
                            </td>
                            <td class="text-center">
                                <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 px-2 py-1">
                                    {{ $material->pivot->quantity }} ud.
                                </span>
                            </td>
                            <td class="text-end pe-4 fw-bold text-dark">
                                {{ number_format($material->unity_price * $material->pivot->quantity, 2) }} €
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">
                                <i class="bi bi-clipboard-x fs-2 d-block mb-2 opacity-50"></i>
                                <p class="mb-0">{{ __('No hay materiales asignados a este presupuesto todavía.') }}</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

</div>
@endsection
