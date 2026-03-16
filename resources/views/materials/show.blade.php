@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Material</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $material->Material_name }}</h5>
            <p class="card-text"><strong>Precio Unitario:</strong> {{ $material->Unity_price }}</p>
            <p class="card-text"><strong>Cantidad:</strong> {{ $material->Quantity }}</p>
            <p class="card-text"><strong>Proveedor:</strong> {{ $material->Supplier }}</p>
            <p class="card-text"><strong>Contacto:</strong> {{ $material->Contact }}</p>
            <a href="{{ route('materials.edit', $material->material_id) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('materials.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection
