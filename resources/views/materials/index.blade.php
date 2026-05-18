@extends('layout.layout')

@section('title', 'Listado de Materiales')

@section('content')
<div class="container-fluid max-w-4xl">

    <div class="card border-0 shadow-sm p-4 mb-4">
        <h2 class="fw-bold mb-1 text-dark">Materiales Disponibles</h2>
        <p class="text-muted mb-4">Catálogo general de materiales para presupuestos y obras.</p>

        <ul class="nav custom-tabs mb-4">
            <li class="nav-item">
                <a class="nav-link text-muted" href="{{ route('budgets.index') }}">
                    <i class="bi bi-file-earmark-text me-1"></i> Presupuestos
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link active" href="{{ route('materials.index') }}">
                    <i class="bi bi-box-seam me-1"></i> Materiales
                </a>
            </li>
        </ul>

        <div class="d-flex justify-content-end mb-4">
            <a href="{{ route('materials.create') }}" class="btn btn-verde-oscuro fw-semibold shadow-sm rounded-3 px-4 py-2">
                <i class="bi bi-plus-lg me-2"></i> Nuevo Material
            </a>
        </div>

        <div class="border rounded-3 overflow-hidden">
            <div class="bg-light border-bottom p-3 d-flex justify-content-between align-items-center">
                <span class="text-dark fw-medium">Inventario Actual</span>
                <span class="badge bg-secondary rounded-pill">{{ $materials->count() }} artículos</span>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="text-muted small fw-semibold ps-4">Ref.</th>
                            <th class="text-muted small fw-semibold">Nombre del Material</th>
                            <th class="text-muted small fw-semibold text-center">Stock</th>
                            <th class="text-muted small fw-semibold text-end">Precio Ud.</th>
                            <th class="text-muted small fw-semibold">Proveedor / Contacto</th>
                            <th class="text-muted small fw-semibold text-end pe-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($materials as $material)
                            <tr>
                                <td class="text-muted small ps-4">#{{ $material->material_id }}</td>

                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="icon-circle-sm bg-light text-secondary rounded shadow-sm flex-shrink-0" style="width: 32px; height: 32px;">
                                            <i class="bi bi-box"></i>
                                        </div>
                                        <span class="fw-bold text-dark">{{ $material->material_name }}</span>
                                    </div>
                                </td>

                                <td class="text-center">
                                    <span class="badge {{ $material->quantity > 0 ? 'bg-success bg-opacity-10 text-success border border-success border-opacity-25' : 'bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25' }}">
                                        {{ $material->quantity }} ud.
                                    </span>
                                </td>

                                <td class="text-end fw-semibold text-dark">
                                    {{ number_format($material->unity_price, 2) }} €
                                </td>

                                <td class="text-muted small">
                                    <i class="bi bi-telephone text-secondary me-1"></i> {{ $material->supplier_contact }}
                                </td>

                                <td class="text-end pe-4">
                                    <div class="d-flex justify-content-end gap-1">
                                        <a href="{{ route('materials.show', $material->material_id) }}" class="btn btn-sm btn-outline-secondary" title="Ver Detalle">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('materials.edit', $material->material_id) }}" class="btn btn-sm btn-outline-primary" title="Editar">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('materials.destroy', $material->material_id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Borrar el material {{ $material->material_name }}?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Borrar">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">
                                    <i class="bi bi-box-seam fs-1 d-block mb-2 opacity-50"></i>
                                    <p class="mb-0">No hay materiales en el inventario.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection
