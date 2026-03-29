<<<<<<< HEAD
@extends('layout.layout')
@section('title', 'Bienvenido')
@section('body')
    <h1>Bienvenido a nuestra aplicación</h1>

@endsection
=======
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div style="margin: 50px auto; padding: 20px; border: 3px dashed #e74c3c; max-width: 600px; font-family: sans-serif;">
    <h2 style="color: #c0392b;">🛠️ Zona de Pruebas Rápidas de Sole</h2>
    <p>Enlaces directos para probar los CRUDs:</p>

    <ul>
        <li style="margin-bottom: 15px;">
            <strong>Materiales:</strong>
            <a href="{{ route('materials.index') }}" style="margin-left: 10px;">📋 Ir al Listado</a> |
            <a href="{{ route('materials.create') }}">➕ Crear Material</a>
        </li>

        <li>
            <strong>Presupuestos:</strong>
            <a href="{{ route('budgets.index') }}" style="margin-left: 10px;">📋 Ir al Listado</a> |
            <a href="{{ route('budgets.create') }}">➕ Crear Presupuesto</a>
        </li>
    </ul>
</div>
</body>
</html>
>>>>>>> sole
