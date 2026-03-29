<<<<<<< HEAD
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Materiales</h1>
    <a href="{{ route('materials.create') }}" class="btn btn-primary mb-3">Agregar Material</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
=======
@extends('layout.layout')

@section('title', 'Listado de Materiales')

@section('content')
    <h2>Materiales Disponibles</h2>

    <a href="{{ route('materials.create') }}">Añadir Nuevo Material</a>
    <br><br>

    <table border="1">
>>>>>>> sole
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
<<<<<<< HEAD
                <th>Precio Unitario</th>
                <th>Cantidad</th>
                <th>Proveedor</th>
                <th>Contacto</th>
=======
                <th>Precio Ud.</th>
                <th>Cantidad</th>
                <th>Contacto Proveedor</th>
>>>>>>> sole
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($materials as $material)
<<<<<<< HEAD
            <tr>
                <td>{{ $material->material_id }}</td>
                <td>{{ $material->Material_name }}</td>
                <td>{{ $material->Unity_price }}</td>
                <td>{{ $material->Quantity }}</td>
                <td>{{ $material->Supplier }}</td>
                <td>{{ $material->Contact }}</td>
                <td>
                    <a href="{{ route('materials.show', $material->material_id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('materials.edit', $material->material_id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('materials.destroy', $material->material_id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
=======
                <tr>
                    <td>{{ $material->material_id }}</td>
                    <td>{{ $material->material_name }}</td>
                    <td>{{ $material->unity_price }}</td>
                    <td>{{ $material->quantity }}</td>
                    <td>{{ $material->supplier_contact }}</td>
                    <td>
                        <a href="{{ route('materials.show', $material->material_id) }}">Ver</a> |
                        <a href="{{ route('materials.edit', $material->material_id) }}">Editar</a> |

                        <form action="{{ route('materials.destroy', $material->material_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Borrar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
>>>>>>> sole
@endsection
