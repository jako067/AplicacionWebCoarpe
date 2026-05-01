@extends('layout.layout')

@section('title', 'Crear Presupuesto')

@section('content')






<div class="container-fluid max-w-4xl">

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div class="d-flex align-items-center">
            <a href="{{ route('budgets.index') }}" class="btn btn-sm btn-outline-secondary me-3 shadow-sm" title="Volver a presupuestos">
                <i class="bi bi-arrow-left"></i> Volver
            </a>
            <h2 class="fw-bold mb-0 text-dark">Nuevo Presupuesto de Obra</h2>
        </div>
    </div>

    <form action="{{ route('budgets.store') }}" method="POST">
        @csrf

        <div class="row g-4">

            <div class="col-lg-7 d-flex flex-column gap-4">

                <div class="card border-0 shadow-sm p-4">
                    <div class="d-flex align-items-center mb-3 pb-2 border-bottom">
                        <i class="bi bi-people-fill fs-5 me-2 text-verde-oscuro"></i>
                        <h5 class="fw-bold mb-0 text-dark">Mano de Obra (Peones)</h5>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="workers_quantity" class="form-label text-muted fw-semibold small mb-1">Número de Trabajadores</label>
                            <input type="number" class="form-control @error('workers_quantity') is-invalid @enderror" name="workers_quantity" id="workers_quantity" value="{{ old('workers_quantity') }}" placeholder="Ej: 3">
                            @error('workers_quantity') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="price_x_hour" class="form-label text-muted fw-semibold small mb-1">Precio Hora Peón</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-currency-euro"></i></span>
                                <input type="number" step="0.01" class="form-control @error('price_x_hour') is-invalid @enderror" name="price_x_hour" id="price_x_hour" value="{{ old('price_x_hour') }}" placeholder="0.00">
                                @error('price_x_hour') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm p-4">
                    <div class="d-flex align-items-center mb-3 pb-2 border-bottom">
                        <i class="bi bi-person-badge fs-5 me-2 text-verde-oscuro"></i>
                        <h5 class="fw-bold mb-0 text-dark">Personal Especializado</h5>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="staff_quantity" class="form-label text-muted fw-semibold small mb-1">Nº de Capataces / Staff</label>
                            <input type="number" class="form-control @error('staff_quantity') is-invalid @enderror" name="staff_quantity" id="staff_quantity" value="{{ old('staff_quantity', 0) }}">
                            @error('staff_quantity') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="staff_price" class="form-label text-muted fw-semibold small mb-1">Precio Hora Capataz</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-currency-euro"></i></span>
                                <input type="number" step="0.01" class="form-control @error('staff_price') is-invalid @enderror" name="staff_price" id="staff_price" value="{{ old('staff_price', 0) }}">
                                @error('staff_price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm p-4">
                    <div class="d-flex align-items-center mb-3 pb-2 border-bottom">
                        <i class="bi bi-clock-history fs-5 me-2 text-verde-oscuro"></i>
                        <h5 class="fw-bold mb-0 text-dark">Tiempo Estimado</h5>
                    </div>
                    <div>
                        <label for="hours_quantity" class="form-label text-muted fw-semibold small mb-1">Horas Totales Estimadas</label>
                        <div class="input-group w-50">
                            <input type="number" class="form-control @error('hours_quantity') is-invalid @enderror" name="hours_quantity" id="hours_quantity" value="{{ old('hours_quantity') }}" placeholder="Ej: 120">
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
                        <h5 class="fw-bold mb-0 text-dark">Gestión de Materiales</h5>
                    </div>

                    <div class="mb-4">
                        <p class="text-muted small fw-semibold text-uppercase mb-2">Añadir del inventario</p>

                        <div class="mb-3">
                            <label for="existing_material_id" class="form-label text-muted small mb-1">Selecciona el Material</label>
                            <select class="form-select border-secondary border-opacity-25 shadow-sm" name="existing_material_id" id="existing_material_id">
                                <option value="">-- No añadir ninguno por ahora --</option>
                                @foreach($materials as $material)
                                    <option value="{{ $material->material_id }}">{{ $material->material_name }} ({{ $material->unity_price }} €)</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="existing_material_quantity" class="form-label text-muted small mb-1">Cantidad a usar en la obra</label>
                            <input type="number" class="form-control border-secondary border-opacity-25 w-50" name="existing_material_quantity" id="existing_material_quantity" min="1" value="{{ old('existing_material_quantity') }}" placeholder="0">
                        </div>
                    </div>

                    <hr class="text-secondary opacity-25">

                    <div class="form-check form-switch p-3 bg-white border rounded shadow-sm mb-3 d-flex align-items-center gap-2 cursor-pointer" onclick="document.getElementById('toggleMaterial').click();">
                        <input class="form-check-input fs-5 m-0 cursor-pointer" type="checkbox" role="switch" id="toggleMaterial" name="crear_material_nuevo" value="1" {{ old('crear_material_nuevo') ? 'checked' : '' }} onclick="mostrarFormulario(event)">
                        <label class="form-check-label fw-bold text-dark cursor-pointer ms-2" for="toggleMaterial" style="user-select: none;">
                            Añadir material nuevo al catálogo AÑADIR AL JS MIRAR FINAL CÓDIGO
                        </label>
                    </div>

                    <div id="seccionMaterial" class="bg-white p-3 border rounded shadow-sm" style="display: {{ old('crear_material_nuevo') ? 'block' : 'none' }}; border-left: 4px solid var(--color-verde-oscuro) !important;">
                        <h6 class="fw-bold text-verde-oscuro mb-3"><i class="bi bi-plus-circle me-1"></i> Datos del Nuevo Material</h6>

                        <div class="mb-2">
                            <label class="form-label text-muted small mb-1">Nombre del Material</label>
                            <input type="text" class="form-control form-control-sm @error('new_material_name') is-invalid @enderror" name="new_material_name" value="{{ old('new_material_name') }}">
                            @error('new_material_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label text-muted small mb-1">Proveedor (Opcional)</label>
                            <input type="text" class="form-control form-control-sm @error('new_supplier_contact') is-invalid @enderror" name="new_supplier_contact" value="{{ old('new_supplier_contact') }}">
                            @error('new_supplier_contact') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="row g-2 mb-2">
                            <div class="col-6">
                                <label class="form-label text-muted small mb-1">Precio Unid. (€)</label>
                                <input type="number" step="0.01" class="form-control form-control-sm @error('new_unity_price') is-invalid @enderror" name="new_unity_price" value="{{ old('new_unity_price') }}">
                                @error('new_unity_price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-6">
                                <label class="form-label text-muted small mb-1">Stock Comprado</label>
                                <input type="number" class="form-control form-control-sm @error('new_stock_quantity') is-invalid @enderror" name="new_stock_quantity" value="{{ old('new_stock_quantity') }}">
                                @error('new_stock_quantity') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="p-2 bg-light border rounded mt-3">
                            <label class="form-label text-primary fw-semibold small mb-1">Cant. a usar en esta obra</label>
                            <input type="number" class="form-control form-control-sm border-primary border-opacity-25 @error('quantity_used_in_budget') is-invalid @enderror" name="quantity_used_in_budget" value="{{ old('quantity_used_in_budget') }}">
                            @error('quantity_used_in_budget') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                </div>
            </div>

        </div> <div class="card border-0 shadow-sm p-3 mt-4">
            <div class="d-flex justify-content-end gap-3">
                <a href="{{ route('budgets.index') }}" class="btn btn-light border px-4 py-2 fw-medium">Cancelar</a>
                <button type="submit" class="btn btn-verde-oscuro fw-semibold px-4 py-2 shadow-sm">
                    <i class="bi bi-save me-2"></i> Generar Presupuesto
                </button>
            </div>
        </div>

    </form>
</div>

{{-- ESTO PARA EL JS DIEGO MÉTELO DONDE LO TENGAS --}}

            <script>
                function mostrarFormulario(event) {
                    if(event) event.stopPropagation();

                    var check = document.getElementById("toggleMaterial");
                    var formulario = document.getElementById("seccionMaterial");

                    if (check.checked) {
                        formulario.style.display = "block";
                    } else {
                        formulario.style.display = "none";
                    }
                }
            </script>
@endsection
