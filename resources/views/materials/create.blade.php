@extends('layout.layout')

@section('title', 'Crear Material')

@section('content')

<div class="container mt-5">
    <div class="card shadow-sm p-4">
        <h2 class="mb-4 text-center">Crear Material</h2>

        <form action="{{ route('materials.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nombre del Material</label>
                <input type="text" name="material_name" class="form-control"
                    value="{{ old('material_name') }}">
                @error('material_name')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Precio Unitario (€)</label>
                <input type="number" step="0.01" name="unity_price" class="form-control"
                    value="{{ old('unity_price') }}">
                @error('unity_price')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Cantidad Inicial</label>
                <input type="number" name="quantity" class="form-control"
                    value="{{ old('quantity') }}">
                @error('quantity')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Contacto del Proveedor</label>
                <input type="text" name="supplier_contact" class="form-control"
                    value="{{ old('supplier_contact') }}">
                @error('supplier_contact')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Guardar Material</button>
                <a href="{{ route('materials.index') }}" class="btn btn-outline-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>

@endsection
