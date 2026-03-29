<<<<<<< HEAD
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Material</h1>
    <form action="{{ route('materials.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="Material_name" class="form-label">Nombre</label>
            <input type="text" name="Material_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="Unity_price" class="form-label">Precio Unitario</label>
            <input type="number" step="0.01" name="Unity_price" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="Quantity" class="form-label">Cantidad</label>
            <input type="number" name="Quantity" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="Supplier" class="form-label">Proveedor</label>
            <input type="text" name="Supplier" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="Contact" class="form-label">Contacto</label>
            <input type="text" name="Contact" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('materials.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
=======
@extends('layout.layout')

@section('title', 'Crear Material')

@section('content')
    <h2>CREAR Material</h2>

    <form action="{{ route('materials.store') }}" method="POST">
        @csrf

        <label for="material_name">Nombre del Material:</label><br>
        <input type="text" name="material_name" id="material_name" value="{{ old('material_name') }}">
        @error('material_name') <span>{{ $message }}</span> @enderror
        <br><br>

        <label for="unity_price">Precio Unitario (€):</label><br>
        <input type="number" step="0.01" name="unity_price" id="unity_price" value="{{ old('unity_price') }}">
        @error('unity_price') <span>{{ $message }}</span> @enderror
        <br><br>

        <label for="quantity">Cantidad Inicial:</label><br>
        <input type="number" name="quantity" id="quantity" value="{{ old('quantity') }}">
        @error('quantity') <span>{{ $message }}</span> @enderror
        <br><br>

        <label for="supplier_contact">Contacto del Proveedor:</label><br>
        <input type="text" name="supplier_contact" id="supplier_contact" value="{{ old('supplier_contact') }}">
        @error('supplier_contact') <span>{{ $message }}</span> @enderror
        <br><br>

        <button type="submit">Guardar Material</button>
        <a href="{{ route('materials.index') }}">Cancelar</a>
    </form>
>>>>>>> sole
@endsection
