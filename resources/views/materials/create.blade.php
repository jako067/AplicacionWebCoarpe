@extends('layouts.app')

@section('content')
<h1>Agregar Material</h1>
<form action="{{ route('materials.store') }}" method="POST">
    @csrf
    <label for="Material_name">Nombre</label>
    <input type="text" name="Material_name" class="input"><br>
    <label for="Unity_price">Precio Unitario</label>
    <input type="number" step="0.01" name="Unity_price" class="input"><br>
    <label for="Quantity">Cantidad</label>
    <input type="number" name="Quantity" class="input"><br>
    <label for="Supplier">Proveedor</label>
    <input type="text" name="Supplier" class="input"><br>
    <label for="Contact">Contacto</label>
    <input type="text" name="Contact" class="input"><br>
    <button type="submit" class="button">Guardar</button>
    <a href="{{ route('materials.index') }}" class="link">Cancelar</a>
</form>
@endsection
