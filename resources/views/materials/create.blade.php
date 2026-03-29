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
@endsection
