@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Material</h1>
    <form action="{{ route('materials.update', $material->material_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="Material_name" class="form-label">Nombre</label>
            <input type="text" name="Material_name" >
        </div>
        <div class="mb-3">
            <label for="Unity_price" class="form-label">Precio Unitario</label>
            <input type="number" name="Unity_price">
        </div>
        <div class="mb-3">
            <label for="Quantity" class="form-label">Cantidad</label>
            <input type="number" name="Quantity">
        </div>
        <div class="mb-3">
            <label for="Supplier" class="form-label">Proveedor</label>
            <input type="text" name="Supplier">
        </div>
        <div class="mb-3">
            <label for="Contact" class="form-label">Contacto</label>
            <input type="text" name="Contact">
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('materials.index') }}">Cancelar</a>
    </form>
</div>
@endsection
