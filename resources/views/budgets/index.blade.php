@extends('layout.layout')

@section('title', 'Listado de Presupuestos')

@section('content')
<div class="container-fluid max-w-4xl">

    <div class="card border-0 shadow-sm p-4 mb-4">
        <h2 class="fw-bold mb-1 text-dark">Presupuestos de Obras</h2>
        <p class="text-muted mb-4">Gestión de presupuestos, horas estimadas y costes de mano de obra.</p>

        <ul class="nav custom-tabs mb-4">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('budgets.index') }}">
                    <i class="bi bi-file-earmark-text me-1"></i> Presupuestos
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-muted" href="{{ route('materials.index') }}">
                    <i class="bi bi-box-seam me-1"></i> Materiales
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-muted" href="#">
                    <i class="bi bi-truck me-1"></i> Proveedores
                </a>
            </li>
        </ul>

        <div class="d-flex justify-content-end mb-4">
            <a href="{{ route('budgets.create') }}" class="btn btn-verde-oscuro fw-semibold shadow-sm rounded-3 px-4 py-2">
                <i class="bi bi-plus-lg me-2"></i> Nuevo Presupuesto
            </a>
        </div>

        <div class="border rounded-3">
            <div class="bg-light border-bottom p-3 d-flex justify-content-between align-items-center">
                <span class="text-dark fw-medium">Presupuestos Guardados</span>
                <span class="badge bg-secondary rounded-pill">{{ $budgets->count() }} totales</span>
            </div>

            <div class="p-0">
                @forelse($budgets as $budget)
                    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between p-3 border-bottom hover-bg-light transition-all gap-3">

                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-circle-sm bg-icon-green-soft rounded-3 shadow-sm d-flex align-items-center justify-content-center flex-shrink-0" style="width: 45px; height: 45px;">
                                <i class="bi bi-file-earmark-text fs-5"></i>
                            </div>

                            <div>
                                <h6 class="fw-bold text-dark mb-1">Presupuesto #{{ $budget->id_budget }}</h6>
                                <div class="d-flex flex-wrap gap-2 text-muted small">
                                    <span><i class="bi bi-people me-1"></i> {{ $budget->workers_quantity }} Trab.</span>
                                    <span>&bull;</span>
                                    <span><i class="bi bi-clock me-1"></i> {{ $budget->hours_quantity }}h</span>
                                    <span>&bull;</span>
                                    <span><i class="bi bi-currency-euro me-1"></i> {{ $budget->price_x_hour }}/h</span>
                                </div>
                            </div>
                        </div>

                        <div class="text-md-end text-start mt-2 mt-md-0">
                            <small class="text-muted d-block mb-1">Coste Total (Mano de Obra)</small>
                            <h5 class="fw-bold text-verde-oscuro mb-0">{{ number_format($budget->final_price, 2) }} €</h5>
                        </div>

                        <div class="d-flex gap-2 justify-content-end mt-2 mt-md-0 border-start ps-md-3">

                            <a href="{{ route('budgets.show', $budget->id_budget) }}" class="btn btn-sm btn-outline-secondary" title="Ver Detalle">
                                <i class="bi bi-eye"></i>
                            </a>

                            <a href="{{ route('budgets.edit', $budget->id_budget) }}" class="btn btn-sm btn-outline-primary" title="Editar">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <form action="{{ route('budgets.destroy', $budget->id_budget) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de que deseas borrar el presupuesto #{{ $budget->id_budget }}?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Borrar">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>

                        </div>

                    </div>
                @empty
                    <div class="text-center py-5 text-muted">
                        <i class="bi bi-folder2-open fs-1 d-block mb-2 opacity-50"></i>
                        <p class="mb-0">No hay presupuestos registrados en el sistema.</p>
                        <a href="{{ route('budgets.create') }}" class="btn btn-sm btn-outline-success mt-3">Crear el primero</a>
                    </div>
                @endforelse
            </div>
        </div>

    </div>
</div>
@endsection
