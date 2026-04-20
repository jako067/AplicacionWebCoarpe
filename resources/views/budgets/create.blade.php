@extends('layout.layout')

@section('title', 'Crear Presupuesto')

@section('content')

    <div class="container mt-5">
        <div class="card shadow-sm p-4">
            <h2 class="mb-4 text-center">Nuevo Presupuesto de Obra</h2>

            <form action="{{ route('budgets.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <h5 class="section-title">Mano de Obra (Peones)</h5>

                    <div class="mb-3">
                        <label class="form-label">Número de Trabajadores</label>
                        <input type="number" name="workers_quantity" class="form-control"
                            value="{{ old('workers_quantity') }}">
                        @error('workers_quantity')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Precio Hora Peón (€)</label>
                        <input type="number" step="0.01" name="price_x_hour" class="form-control"
                            value="{{ old('price_x_hour') }}">
                        @error('price_x_hour')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <h5 class="section-title">Personal Especializado</h5>

                    <div class="mb-3">
                        <label class="form-label">Nº de Capataces</label>
                        <input type="number" name="staff_quantity" class="form-control"
                            value="{{ old('staff_quantity', 0) }}">
                        @error('staff_quantity')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Precio Hora Capataz (€)</label>
                        <input type="number" step="0.01" name="staff_price" class="form-control"
                            value="{{ old('staff_price', 0) }}">
                        @error('staff_price')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <h5 class="section-title">Tiempo Estimado</h5>

                    <div class="mb-3">
                        <label class="form-label">Horas Totales Estimadas</label>
                        <input type="number" name="hours_quantity" class="form-control"
                            value="{{ old('hours_quantity') }}">
                        @error('hours_quantity')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-4 material-box p-3">
                    <h5 class="section-title">Material existente (Opcional)</h5>

                    <div class="mb-3">
                        <label class="form-label">Selecciona el Material</label>
                        <select name="existing_material_id" class="form-select">
                            <option value="">-- No añadir ninguno por ahora --</option>
                            @foreach ($materials as $material)
                                <option value="{{ $material->material_id }}">
                                    {{ $material->material_name }} ({{ $material->unity_price }} €)
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Cantidad a usar</label>
                        <input type="number" name="existing_material_quantity" class="form-control" min="1"
                            value="{{ old('existing_material_quantity') }}">
                    </div>
                </div>

                <div class="form-check mb-3 p-3 toggle-box">
                    <input type="checkbox" id="toggleMaterial" name="crear_material_nuevo" class="form-check-input"
                        value="1" {{ old('crear_material_nuevo') ? 'checked' : '' }} onclick="mostrarFormulario()">
                    <label for="toggleMaterial" class="form-check-label fw-bold">
                        Añadir material nuevo
                    </label>
                </div>

                <div id="seccionMaterial" class="p-3 border rounded mb-4"
                    style="display: {{ old('crear_material_nuevo') ? 'block' : 'none' }};">

                    <h5 class="mb-3">Nuevo Material</h5>

                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="new_material_name" class="form-control"
                            value="{{ old('new_material_name') }}">
                        @error('new_material_name')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Proveedor</label>
                        <input type="text" name="new_supplier_contact" class="form-control"
                            value="{{ old('new_supplier_contact') }}">
                        @error('new_supplier_contact')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Precio Unitario (€)</label>
                        <input type="number" step="0.01" name="new_unity_price" class="form-control"
                            value="{{ old('new_unity_price') }}">
                        @error('new_unity_price')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Stock total</label>
                        <input type="number" name="new_stock_quantity" class="form-control"
                            value="{{ old('new_stock_quantity') }}">
                        @error('new_stock_quantity')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-primary">Cantidad para este presupuesto</label>
                        <input type="number" name="quantity_used_in_budget" class="form-control"
                            value="{{ old('quantity_used_in_budget') }}">
                        @error('quantity_used_in_budget')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Guardar Presupuesto</button>
                    <a href="{{ route('budgets.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function mostrarFormulario() {
            var check = document.getElementById("toggleMaterial");
            var formulario = document.getElementById("seccionMaterial");
            formulario.style.display = check.checked ? "block" : "none";
        }
    </script>

@endsection
