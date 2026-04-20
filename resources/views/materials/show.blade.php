@extends('layout.layout')

@section('title', 'Detalle del Material')

@section('content')

<div class="container mt-5">
    <div class="card shadow-sm p-4">
        <h2 class="mb-4 text-center">Detalle del Material</h2>

        <h5 class="mb-3 text-primary">
            {{ $material->material_name }}
        </h5>

        <ul class="list-group mb-4">
            <li class="list-group-item"><strong>ID:</strong> {{ $material->material_id }}</li>
            <li class="list-group-item"><strong>Nombre:</strong> {{ $material->material_name }}</li>
            <li class="list-group-item"><strong>Precio Unitario:</strong> {{ $material->unity_price }} €</li>
            <li class="list-group-item"><strong>Cantidad Disponible:</strong> {{ $material->quantity }} unidades</li>
            <li class="list-group-item"><strong>Proveedor:</strong> {{ $material->supplier_contact }}</li>
        </ul>

        <div class="d-flex gap-2">
            <a href="{{ route('materials.edit', $material->material_id) }}" class="btn btn-primary">
                Editar
            </a>

            <a href="{{ route('materials.index') }}" class="btn btn-outline-secondary">
                Volver
            </a>
        </div>
    </div>
</div>

@endsection
