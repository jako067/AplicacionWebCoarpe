@extends('layout.layout')

@section('title', 'Detalle del Presupuesto')

@section('content')
<div class="container-fluid max-w-4xl">

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div class="d-flex align-items-center">
            <a href="{{ route('budgets.index') }}" class="btn btn-sm btn-outline-secondary me-3 shadow-sm" title="Volver al listado">
                <i class="bi bi-arrow-left"></i> Volver
            </a>
            <h2 class="fw-bold mb-0 text-dark">
                Presupuesto <span class="text-verde-oscuro">#{{ $budget->id_budget }}</span>
            </h2>
        </div>

        <a href="{{ route('budgets.edit', $budget->id_budget) }}" class="btn btn-sm btn-outline-primary shadow-sm fw-semibold px-3">
            <i class="bi bi-pencil me-1"></i> Editar Presupuesto
        </a>
    </div>

    @php
        // Cálculos locales para desglosar la información en la vista de detalle
        $costePeones = $budget->workers_quantity * $budget->hours_quantity * $budget->price_x_hour;
        $costeStaff = ($budget->staff_quantity ?? 0) * $budget->hours_quantity * ($budget->staff_price ?? 0);
        $totalManoObra = $costePeones + $costeStaff;
        $totalMateriales = $budget->materials->sum(function($material) {
            return $material->unity_price * $material->pivot->quantity;
        });
    @endphp

    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-md-3">
            <div class="bg-white p-3 border rounded-3 shadow-sm h-100">
                <p class="text-muted fw-semibold small mb-1 text-uppercase tracking-wider" style="font-size: 0.75rem;">Tiempo Estimado</p>
                <h4 class="fw-bold text-dark mb-0"><i class="bi bi-clock text-secondary me-1"></i> {{ $budget->hours_quantity }} <span class="fs-6 text-muted fw-normal">h</span></h4>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="bg-white p-3 border rounded-3 shadow-sm h-100">
                <p class="text-muted fw-semibold small mb-1 text-uppercase tracking-wider" style="font-size: 0.75rem;">Total Personal</p>
                <h4 class="fw-bold text-dark mb-0"><i class="bi bi-cash-stack text-secondary me-1"></i> {{ number_format($totalManoObra, 2) }} €</h4>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="bg-white p-3 border rounded-3 shadow-sm h-100">
                <p class="text-muted fw-semibold small mb-1 text-uppercase tracking-wider" style="font-size: 0.75rem;">Total Materiales</p>
                <h4 class="fw-bold text-dark mb-0"><i class="bi bi-bricks text-secondary me-1"></i> {{ number_format($totalMateriales, 2) }} €</h4>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="bg-verde-oscuro text-white p-3 rounded-3 shadow-sm h-100">
                <p class="text-white text-opacity-75 fw-bold small mb-1 text-uppercase tracking-wider" style="font-size: 0.75rem;">Total Presupuesto</p>
                <h4 class="fw-bold mb-0"><i class="bi bi-currency-euro me-1"></i> {{ number_format($budget->final_price, 2) }} €</h4>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm overflow-hidden mb-4 border">
        <div class="card-header bg-white border-bottom p-3">
            <h5 class="fw-bold text-dark mb-0 fs-6">
                <i class="bi bi-people-fill fs-5 me-2 text-verde-oscuro"></i> Desglose de Costes de Personal
            </h5>
        </div>

        <div class="card-body p-4 bg-light bg-opacity-25">
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="bg-white p-3 border rounded-3 shadow-sm h-100">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="badge bg-secondary">Mano de Obra Base</span>
                            <span class="fw-bold text-dark">{{ number_format($costePeones, 2) }} €</span>
                        </div>
                        <p class="mb-1 small text-muted"><i class="bi bi-person me-1"></i> <strong>Cantidad:</strong> {{ $budget->workers_quantity }} peones</p>
                        <p class="mb-0 small text-muted"><i class="bi bi-tag me-1"></i> <strong>Ratio por hora:</strong> {{ number_format($budget->price_x_hour, 2) }} €/h</p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="bg-white p-3 border rounded-3 shadow-sm h-100">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-10">Personal Especializado</span>
                            <span class="fw-bold text-dark">{{ number_format($costeStaff, 2) }} €</span>
                        </div>
                        <p class="mb-1 small text-muted"><i class="bi bi-person-badge me-1"></i> <strong>Cantidad:</strong> {{ $budget->staff_quantity ?? 0 }} capataces</p>
                        <p class="mb-0 small text-muted"><i class="bi bi-tag me-1"></i> <strong>Ratio por hora:</strong> {{ number_format($budget->staff_price ?? 0, 2) }} €/h</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm overflow-hidden border">
        <div class="card-header bg-white border-bottom p-3 d-flex justify-content-between align-items-center">
            <h5 class="fw-bold text-dark mb-0 fs-6">
                <i class="bi bi-bricks fs-5 me-2 text-primary"></i> Materiales Asignados en Obra
            </h5>
            <span class="badge bg-secondary rounded-pill">{{ $budget->materials->count() }} materiales</span>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="text-muted small fw-semibold ps-4">Nombre del Material</th>
                        <th class="text-muted small fw-semibold text-end">Precio Ud.</th>
                        <th class="text-muted small fw-semibold text-center">Cantidad Requerida</th>
                        <th class="text-muted small fw-semibold text-end pe-4">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($budget->materials as $material)
                        <tr>
                            <td class="ps-4 fw-medium text-dark">
                                <i class="bi bi-box-seam text-secondary me-2"></i> {{ $material->material_name }}
                            </td>
                            <td class="text-end text-muted small">
                                {{ number_format($material->unity_price, 2) }} €
                            </td>
                            <td class="text-center">
                                <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-10 px-2 py-1">
                                    {{ $material->pivot->quantity }} uds.
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
                                <p class="mb-0">No hay materiales asignados a este presupuesto todavía.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
