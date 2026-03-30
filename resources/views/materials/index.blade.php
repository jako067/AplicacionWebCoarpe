@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Materiales</h1>
    <a href="{{ route('materials.create') }}">Agregar Material</a>

        <tbody>
            @foreach($materials as $material)
            <tr>
                <td>{{ $material->material_id }}</td>
                <td>{{ $material->Material_name }}</td>
                <td>{{ $material->Unity_price }}</td>
                <td>{{ $material->Quantity }}</td>
                <td>{{ $material->Supplier }}</td>
                <td>{{ $material->Contact }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
