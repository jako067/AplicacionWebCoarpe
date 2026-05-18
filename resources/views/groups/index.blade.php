@extends('layout.layout')

@section('title', 'Gestión de Grupos')

@section('content')
<div class="container-fluid max-w-4xl">

    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4 gap-3">
        <div>
            <h2 class="fw-bold mb-1 text-dark">Grupos de Trabajo</h2>
            <p class="text-muted mb-0">Organiza tu plantilla en equipos, cuadrillas o departamentos operativos.</p>
        </div>

        <a href="{{ route('groups.create') }}" class="btn btn-verde-oscuro fw-semibold shadow-sm rounded-3 px-4 py-2">
            <i class="bi bi-plus-lg me-2"></i> Crear Grupo
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-3 overflow-hidden">

        <div class="card-header bg-white border-bottom p-3 d-flex justify-content-between align-items-center">
            <h6 class="fw-bold text-dark mb-0">
                <i class="bi bi-diagram-3 text-primary me-2"></i> Equipos Configurados
            </h6>
            <span class="badge bg-secondary rounded-pill">{{ $groups->count() }} grupos</span>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="text-muted small fw-semibold ps-4" style="width: 30%">Nombre del Grupo</th>
                        <th class="text-muted small fw-semibold" style="width: 50%">Miembros Asignados</th>
                        <th class="text-muted small fw-semibold text-end pe-4" style="width: 20%">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($groups as $group)
                        <tr>
                            <td class="ps-4 py-3">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="icon-circle-sm bg-light text-secondary rounded shadow-sm d-flex justify-content-center align-items-center flex-shrink-0" style="width: 32px; height: 32px;">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <span class="fw-bold text-dark fs-6">{{ $group->name }}</span>
                                </div>
                            </td>

                            <td>
                                <div class="d-flex flex-wrap gap-1">
                                    @forelse ($group->users as $user)
                                        <span class="badge bg-light text-dark border rounded-pill px-2 py-1 d-inline-flex align-items-center gap-1 fw-medium" style="font-size: 0.8rem;">
                                            <i class="bi bi-person text-secondary" style="font-size: 0.75rem;"></i>
                                            {{ $user->name }}
                                        </span>
                                    @empty
                                        <span class="text-muted small italic">Sin integrantes asignados</span>
                                    @endforelse
                                </div>
                            </td>

                            <td class="text-end pe-4">
                                <div class="d-flex justify-content-end gap-1">
                                    <a href="{{ route('groups.edit', $group) }}" class="btn btn-sm btn-outline-primary" title="Editar Grupo">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <form action="{{ route('groups.destroy', $group) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que quieres eliminar este grupo?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Borrar Grupo">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-5 text-muted">
                                <i class="bi bi-collection fs-1 d-block mb-2 opacity-50"></i>
                                <p class="mb-0 small">No se ha creado ningún grupo operativo todavía.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
