@extends('layout.layout')

@section('title', 'Editar Material')

@section('content')

<div class="container mt-5">
    <div class="card shadow-sm p-4">
        <h2 class="mb-4 text-center">Editar Material: {{ $material->material_name }}</h2>

        <form action="{{ route('materials.update', $material->material_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nombre del Material</label>
                <input type="text" name="material_name" class="form-control"
                    value="{{ old('material_name', $material->material_name) }}">
                @error('material_name')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Precio Unitario (€)</label>
                <input type="number" step="0.01" name="unity_price" class="form-control"
                    value="{{ old('unity_price', $material->unity_price) }}">
                @error('unity_price')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Cantidad Inicial</label>
                <input type="number" name="quantity" class="form-control"
                    value="{{ old('quantity', $material->quantity) }}">
                @error('quantity')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Contacto del Proveedor</label>
                <input type="text" name="supplier_contact" class="form-control"
                    value="{{ old('supplier_contact', $material->supplier_contact) }}">
                @error('supplier_contact')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Actualizar Material</button>
                <a href="{{ route('materials.index') }}" class="btn btn-outline-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>

@endsection
