@extends('layout.layout')

@section('title', 'Crear Presupuesto')

@section('content')
    <h2>Nuevo Presupuesto de Obra</h2>

    <form action="{{ route('budgets.store') }}" method="POST">
        @csrf

        <fieldset>
            <legend>Mano de Obra (Peones)</legend>
            <label for="workers_quantity">Número de Trabajadores:</label><br>
            <input type="number" name="workers_quantity" id="workers_quantity" value="{{ old('workers_quantity') }}">
            @error('workers_quantity') <span style="color: red;">{{ $message }}</span> @enderror
            <br><br>

            <label for="price_x_hour">Precio Hora Peón (€):</label><br>
            <input type="number" step="0.01" name="price_x_hour" id="price_x_hour" value="{{ old('price_x_hour') }}">
            @error('price_x_hour') <span style="color: red;">{{ $message }}</span> @enderror
        </fieldset>

        <fieldset style="margin-top: 15px;">
            <legend>Personal Especializado (Capataces/Staff)</legend>
            <label for="staff_quantity">Nº de Capataces:</label><br>
            <input type="number" name="staff_quantity" id="staff_quantity" value="{{ old('staff_quantity', 0) }}">
            @error('staff_quantity') <span style="color: red;">{{ $message }}</span> @enderror
            <br><br>

            <label for="staff_price">Precio Hora Capataz (€):</label><br>
            <input type="number" step="0.01" name="staff_price" id="staff_price" value="{{ old('staff_price', 0) }}">
            @error('staff_price') <span style="color: red;">{{ $message }}</span> @enderror
        </fieldset>

        <fieldset style="margin-top: 15px;">
            <legend>Tiempo Estimado</legend>
            <label for="hours_quantity">Horas Totales Estimadas:</label><br>
            <input type="number" name="hours_quantity" id="hours_quantity" value="{{ old('hours_quantity') }}">
            @error('hours_quantity') <span style="color: red;">{{ $message }}</span> @enderror
        </fieldset>
        <fieldset style="margin-top: 15px; background: #eef8ff; padding: 15px;">
            <legend>Añadir un material existente del almacén (Opcional)</legend>

            <label for="existing_material_id">Selecciona el Material:</label><br>
            <select name="existing_material_id" id="existing_material_id">
                <option value="">-- No añadir ninguno por ahora --</option>
                @foreach($materials as $material)
                    <option value="{{ $material->material_id }}">{{ $material->material_name }} ({{ $material->unity_price }} €)</option>
                @endforeach
            </select>
            <br><br>

            <label for="existing_material_quantity">Cantidad a usar en la obra:</label><br>
            <input type="number" name="existing_material_quantity" id="existing_material_quantity" min="1" value="{{ old('existing_material_quantity') }}">
        </fieldset>

        <div style="background: #f9f9f9; padding: 15px; border: 1px solid #ccc; margin-top: 20px;">
            <label style="font-weight: bold; cursor: pointer;">
                <input type="checkbox" id="toggleMaterial" name="crear_material_nuevo" value="1" {{ old('crear_material_nuevo') ? 'checked' : '' }} onclick="mostrarFormulario()">
                ¿Añadir también un material nuevo que no está en la base de datos?
            </label>
        </div>

        <div id="seccionMaterial" style="display: {{ old('crear_material_nuevo') ? 'block' : 'none' }}; border: 1px solid #ccc; border-top: none; padding: 15px; margin-bottom: 20px;">
            <h4>Datos del Nuevo Material</h4>

            <label>Nombre del Material:</label><br>
            <input type="text" name="new_material_name" value="{{ old('new_material_name') }}"><br>
            @error('new_material_name') <span style="color: red;">{{ $message }}</span><br> @enderror
            <br>

            <label>Distribuidor / Proveedor (Opcional):</label><br>
            <input type="text" name="new_supplier_contact" value="{{ old('new_supplier_contact') }}"><br>
            @error('new_supplier_contact') <span style="color: red;">{{ $message }}</span><br> @enderror
            <br>

            <label>Precio Unitario (€):</label><br>
            <input type="number" step="0.01" name="new_unity_price" value="{{ old('new_unity_price') }}"><br>
            @error('new_unity_price') <span style="color: red;">{{ $message }}</span><br> @enderror
            <br>

            <label>Cantidad total comprada (Stock general):</label><br>
            <input type="number" name="new_stock_quantity" value="{{ old('new_stock_quantity') }}"><br>
            @error('new_stock_quantity') <span style="color: red;">{{ $message }}</span><br> @enderror
            <br>

            <label style="color: blue;">Cantidad a usar en este presupuesto:</label><br>
            <input type="number" name="quantity_used_in_budget" value="{{ old('quantity_used_in_budget') }}">
            @error('quantity_used_in_budget') <span style="color: red;">{{ $message }}</span> @enderror
        </div>

        <br>
        <button type="submit">Guardar Presupuesto</button>
        <a href="{{ route('budgets.index') }}" style="margin-left: 10px;">Cancelar</a>
    </form>

    <script>
        function mostrarFormulario() {
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
