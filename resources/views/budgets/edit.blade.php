@extends('layout.layout')

@section('title', 'Editar Presupuesto')

@section('content')
<div class="container-fluid max-w-4xl">

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div class="d-flex align-items-center">
            <a href="{{ route('budgets.index') }}" class="btn btn-sm btn-outline-secondary me-3 shadow-sm" title="Volver al listado">
                <i class="bi bi-arrow-left"></i> Volver
            </a>
            <h2 class="fw-bold mb-0 text-dark">Editar Presupuesto <span class="text-verde-oscuro">#{{ $budget->id_budget }}</span></h2>
        </div>
    </div>

    <div class="container mt-5">
        <div class="card shadow-sm p-4">
            <h2 class="mb-4 text-center">Modificar Presupuesto de Obra</h2>

            <form action="{{ route('budgets.update', $budget->id_budget) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-4">

                    <div class="col-lg-7 d-flex flex-column gap-4">

                        <div class="card border-0 shadow-sm p-4 border">
                            <div class="d-flex align-items-center mb-3 pb-2 border-bottom">
                                <i class="bi bi-people-fill fs-5 me-2 text-verde-oscuro"></i>
                                <h5 class="fw-bold mb-0 text-dark">Mano de Obra (Peones)</h5>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="workers_quantity" class="form-label text-muted fw-semibold small mb-1">Número de Trabajadores</label>
                                    <input type="number" class="form-control @error('workers_quantity') is-invalid @enderror" name="workers_quantity" id="workers_quantity" value="{{ old('workers_quantity', $budget->workers_quantity) }}">
                                    @error('workers_quantity') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="price_x_hour" class="form-label text-muted fw-semibold small mb-1">Precio Hora Peón</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-currency-euro"></i></span>
                                        <input type="number" step="0.01" class="form-control @error('price_x_hour') is-invalid @enderror" name="price_x_hour" id="price_x_hour" value="{{ old('price_x_hour', $budget->price_x_hour) }}">
                                        @error('price_x_hour') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card border-0 shadow-sm p-4 border">
                            <div class="d-flex align-items-center mb-3 pb-2 border-bottom">
                                <i class="bi bi-person-badge fs-5 me-2 text-verde-oscuro"></i>
                                <h5 class="fw-bold mb-0 text-dark">Personal Especializado</h5>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="staff_quantity" class="form-label text-muted fw-semibold small mb-1">Nº de Capataces / Staff</label>
                                    <input type="number" class="form-control @error('staff_quantity') is-invalid @enderror" name="staff_quantity" id="staff_quantity" value="{{ old('staff_quantity', $budget->staff_quantity ?? 0) }}">
                                    @error('staff_quantity') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="staff_price" class="form-label text-muted fw-semibold small mb-1">Precio Hora Capataz</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-currency-euro"></i></span>
                                        <input type="number" step="0.01" class="form-control @error('staff_price') is-invalid @enderror" name="staff_price" id="staff_price" value="{{ old('staff_price', $budget->staff_price ?? 0) }}">
                                        @error('staff_price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card border-0 shadow-sm p-4 border">
                            <div class="d-flex align-items-center mb-3 pb-2 border-bottom">
                                <i class="bi bi-clock-history fs-5 me-2 text-verde-oscuro"></i>
                                <h5 class="fw-bold mb-0 text-dark">Tiempo Estimado</h5>
                            </div>
                            <div>
                                <label for="hours_quantity" class="form-label text-muted fw-semibold small mb-1">Horas Totales Estimadas</label>
                                <div class="input-group w-50">
                                    <input type="number" class="form-control @error('hours_quantity') is-invalid @enderror" name="hours_quantity" id="hours_quantity" value="{{ old('hours_quantity', $budget->hours_quantity) }}">
                                    <span class="input-group-text bg-light">horas</span>
                                    @error('hours_quantity') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="card border-0 shadow-sm p-4 h-100 bg-light bg-opacity-50 border border-primary border-opacity-10">

                            <div class="d-flex align-items-center mb-3 pb-2 border-bottom border-secondary border-opacity-25">
                                <i class="bi bi-bricks fs-5 me-2 text-primary"></i>
                                <h5 class="fw-bold mb-0 text-dark">Materiales del Presupuesto</h5>
                            </div>

                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <p class="text-muted small fw-semibold text-uppercase mb-0">Materiales Añadidos</p>
                                    <button type="button" class="btn btn-sm btn-outline-primary fw-semibold" onclick="agregarFilaMaterial()">
                                        <i class="bi bi-plus-lg"></i> Añadir otro
                                    </button>
                                </div>

                                <div id="contenedor-materiales">
                                    @forelse($budget->materials as $index => $attachedMaterial)
                                        <div class="row g-2 mb-2 fila-material">
                                            <div class="col-8">
                                                <select class="form-select border-secondary border-opacity-25 shadow-sm small" name="materials[{{ $index }}][id]">
                                                    @foreach($materials as $material)
                                                        <option value="{{ $material->material_id }}"
                                                            {{ $attachedMaterial->material_id == $material->material_id ? 'selected' : '' }}>
                                                            {{ $material->material_name }} ({{ $material->unity_price }} €)
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <input type="number" class="form-control border-secondary border-opacity-25 shadow-sm" name="materials[{{ $index }}][quantity]" min="1" value="{{ $attachedMaterial->pivot->quantity }}" placeholder="Cant.">
                                            </div>
                                            <div class="col-1 d-flex align-items-center">
                                                <button type="button" class="btn btn-sm btn-outline-danger border-0" onclick="eliminarFila(this)" title="Quitar">
                                                    <i class="bi bi-x-lg"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="row g-2 mb-2 fila-material">
                                            <div class="col-8">
                                                <select class="form-select border-secondary border-opacity-25 shadow-sm small" name="materials[0][id]">
                                                    <option value="">-- Selecciona Material --</option>
                                                    @foreach($materials as $material)
                                                        <option value="{{ $material->material_id }}">{{ $material->material_name }} ({{ $material->unity_price }} €)</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <input type="number" class="form-control border-secondary border-opacity-25 shadow-sm" name="materials[0][quantity]" min="1" placeholder="Cant.">
                                            </div>
                                            <div class="col-1 d-flex align-items-center">
                                                <button type="button" class="btn btn-sm btn-outline-danger border-0" onclick="eliminarFila(this)" title="Quitar">
                                                    <i class="bi bi-x-lg"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @endforelse
                                </div>
                            </div>

                            <div class="alert alert-warning bg-white border-warning border-opacity-50 small text-dark p-2 rounded-3 shadow-sm mb-0">
                                <i class="bi bi-exclamation-triangle-fill text-warning me-1"></i>
                                Si elimina una fila de material y guarda, dicho recurso se desvinculará permanentemente de la obra.
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm p-3 mt-4">
                    <div class="d-flex justify-content-end gap-3">
                        <a href="{{ route('budgets.index') }}" class="btn btn-light border px-4 py-2 fw-medium">Cancelar</a>
                        <button type="submit" class="btn btn-verde-oscuro fw-semibold px-4 py-2 shadow-sm">
                            <i class="bi bi-calculator-fill me-2"></i> Recalcular y Actualizar
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    // El índice inicial para el array dinámico de JS arranca basándose en la cantidad de elementos cargados desde el servidor
    let materialIndex = {{ $budget->materials->count() > 0 ? $budget->materials->count() : 1 }};

    function agregarFilaMaterial() {
        const contenedor = document.getElementById('contenedor-materiales');
        const nuevaFila = document.createElement('div');
        nuevaFila.className = 'row g-2 mb-2 fila-material';

        nuevaFila.innerHTML = `
            <div class="col-8">
                <select class="form-select border-secondary border-opacity-25 shadow-sm small" name="materials[${materialIndex}][id]">
                    <option value="">-- Selecciona Material --</option>
                    @foreach($materials as $material)
                        <option value="{{ $material->material_id }}">{{ $material->material_name }} ({{ $material->unity_price }} €)</option>
                    @endforeach
                </select>
            </div>
            <div class="col-3">
                <input type="number" class="form-control border-secondary border-opacity-25 shadow-sm" name="materials[${materialIndex}][quantity]" min="1" placeholder="Cant.">
            </div>
            <div class="col-1 d-flex align-items-center">
                <button type="button" class="btn btn-sm btn-outline-danger border-0" onclick="eliminarFila(this)" title="Quitar">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
        `;

        contenedor.appendChild(nuevaFila);
        materialIndex++;
    }

    function eliminarFila(boton) {
        boton.closest('.fila-material').remove();
    }
</script>
@endsection
