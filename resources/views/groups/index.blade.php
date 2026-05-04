@extends('layout.layout')

@section('title', 'Grupos')

@section('content')

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-3">
        <h3>Grupos</h3>
        <a href="{{ route('groups.create') }}" class="btn btn-primary">
            + Crear grupo
        </a>
    </div>

    <div class="card shadow">
        <div class="card-body">

            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Usuarios</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($groups as $group)
                        <tr>
                            <td class="fw-bold">
                                {{ $group->name }}
                            </td>
                            <td>
                                @foreach ($group->users as $user)
                                    <span class="badge bg-primary">
                                        {{ $user->name }}
                                    </span>
                                @endforeach
                            </td>
                            <td class="text-end">
                                <a href="{{ route('groups.edit', $group) }}"
                                   class="btn btn-warning btn-sm">
                                    Editar
                                </a>
                                <form action="{{ route('groups.destroy', $group) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('¿Seguro que quieres eliminar este grupo?')">
                                        Borrar
                                    </button>

                                </form>

                            </td>

                        </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
    </div>

</div>

@endsection
