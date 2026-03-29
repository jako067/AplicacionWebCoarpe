@extends('layout.layout')

@section('title', 'Listado de Materiales')

@section('content')
    <h2>Materiales Disponibles</h2>

    <a href="{{ route('materials.create') }}">Añadir Nuevo Material</a>
    <br><br>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio Ud.</th>
                <th>Cantidad</th>
                <th>Contacto Proveedor</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($materials as $material)
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
@endsection
