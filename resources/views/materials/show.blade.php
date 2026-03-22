@extends('layout.layout')

@section('title', 'Detalle del Material')

@section('content')
    <h2>SHOW del Material: {{ $material->material_name }}</h2>

    <ul>
        <li><strong>ID:</strong> {{ $material->material_id }}</li>
        <li><strong>Nombre:</strong> {{ $material->material_name }}</li>
        <li><strong>Precio Unitario:</strong> {{ $material->unity_price }} €</li>
        <li><strong>Cantidad Disponible:</strong> {{ $material->quantity }} unidades</li>
        <li><strong>Contacto del Proveedor:</strong> {{ $material->supplier_contact }}</li>
    </ul>

    <br>
    <a href="{{ route('materials.edit', $material->material_id) }}">
        <button>Editar este material</button>
    </a>

    <a href="{{ route('materials.index') }}">
        <button>Volver al listado</button>
    </a>
@endsection
