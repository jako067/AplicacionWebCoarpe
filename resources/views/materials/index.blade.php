@extends('layout.layout')

@section('title', 'Listado de Materiales')

@section('content')

<div class="container mt-5">
    <div class="card shadow-sm p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Materiales Disponibles</h2>
            <a href="{{ route('materials.create') }}" class="btn btn-primary">
                Añadir Material
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio Ud.</th>
                        <th>Cantidad</th>
                        <th>Proveedor</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($materials as $material)
                        <tr>
                            <td>{{ $material->material_id }}</td>
                            <td>{{ $material->material_name }}</td>
                            <td>{{ $material->unity_price }} €</td>
                            <td>{{ $material->quantity }}</td>
                            <td>{{ $material->supplier_contact }}</td>
                            <td class="text-end">
                                <a href="{{ route('materials.show', $material->material_id) }}" class="btn btn-sm btn-outline-primary">
                                    Ver
                                </a>

                                <a href="{{ route('materials.edit', $material->material_id) }}" class="btn btn-sm btn-outline-secondary">
                                    Editar
                                </a>

                                <form action="{{ route('materials.destroy', $material->material_id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        Borrar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                No hay materiales registrados
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
