@extends('layout.layout')

@section('title', 'Editar Grupo')

@section('content')
<div class="container-fluid max-w-4xl">

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div class="d-flex align-items-center">
            <a href="{{ route('groups.index') }}" class="btn btn-sm btn-outline-secondary me-3 shadow-sm" title="Volver al listado">
                <i class="bi bi-arrow-left"></i> Volver
            </a>
            <h2 class="fw-bold mb-0 text-dark">Editar Grupo <span class="text-verde-oscuro">#{{ $group->id }}</span></h2>
        </div>
    </div>

    <div class="card border-0 shadow-sm p-4 rounded-3">

        <form method="POST" action="{{ route('groups.update', $group) }}">
            @csrf
            @method('PUT')

            <div class="mb-4 pb-3 border-bottom">
                <div class="d-flex align-items-center mb-3">
                    <i class="bi bi-info-circle-fill fs-5 me-2 text-verde-oscuro"></i>
                    <h5 class="fw-bold mb-0 text-dark">Modificar Datos de Identificación</h5>
                </div>

                <div class="row g-3">
                    <div class="col-12">
                        <label for="name" class="form-label text-muted fw-semibold small mb-1">Nombre del Grupo <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name', $group->name) }}" placeholder="Ej: Cuadrilla de Jardinería / Mantenimiento Norte" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="description" class="form-label text-muted fw-semibold small mb-1">Descripción u Objetivo <span class="fw-normal text-black-50">(Opcional)</span></label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="3" placeholder="Escribe una breve nota sobre las funciones o la ubicación de este equipo...">{{ old('description', $group->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-person-check-fill fs-5 me-2 text-verde-oscuro"></i>
                        <h5 class="fw-bold mb-0 text-dark">Gestionar Miembros del Equipo</h5>
                    </div>
                </div>

                <div class="border rounded-3 p-3 bg-light bg-opacity-25 overflow-auto" style="max-height: 450px; padding-right: 4px;">

                    @forelse ($users->groupBy('rol') as $rol => $groupedUsers)

                        <div class="col-12 {{ !$loop->first ? 'mt-4' : '' }} mb-2">
                            <span class="badge bg-secondary bg-opacity-10 text-dark border border-secondary border-opacity-25 fw-bold text-uppercase tracking-wider px-3 py-1" style="font-size: 0.75rem;">
                                <i class="bi bi-tags-fill me-1 text-secondary"></i>
                                {{ match($rol) {
                                    'admin' => 'Administradores',
                                    'foreman' => 'Capataces / Jefes de Equipo',
                                    'laborer' => 'Operarios / Trabajadores',
                                    default => 'Sin Rol Asignado'
                                } }}
                            </span>
                        </div>

                        <div class="row g-2">
                            @foreach ($groupedUsers as $user)
                                <div class="col-xl-4 col-md-6">
                                    <div class="card h-100 border border-secondary border-opacity-10 bg-white rounded-3 p-2 shadow-xs transition-hover">
                                        <div class="form-check d-flex align-items-center gap-2 m-0 w-100">

                                            <input class="form-check-input flex-shrink-0 m-0" type="checkbox" name="users[]"
                                                   value="{{ $user->id }}" id="user{{ $user->id }}"
                                                   {{ (is_array(old('users')) && in_array($user->id, old('users'))) || (!is_array(old('users')) && $group->users->contains($user->id)) ? 'checked' : '' }}>

                                            <label class="form-check-label w-100 ps-1 cursor-pointer" for="user{{ $user->id }}" style="user-select: none;">
                                                <span class="fw-bold text-dark d-block small text-truncate" style="max-width: 180px;">{{ $user->name }}</span>
                                                <span class="text-muted text-opacity-75 d-block" style="font-size: 0.75rem;">{{ '@' . $user->username }}</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    @empty
                        <div class="text-center py-4 text-muted">
                            <i class="bi bi-people fs-3 d-block mb-1 opacity-50"></i>
                            <p class="mb-0 small">No hay usuarios disponibles para asignar al grupo.</p>
                        </div>
                    @endforelse

                </div>

                @error('users')
                    <div class="text-danger small mt-2 d-block" style="font-size: 0.8rem;">{{ $message }}</div>
                @enderror
            </div>

            <hr class="my-4 text-muted opacity-25">

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('groups.index') }}" class="btn btn-light border px-4 shadow-sm">Cancelar</a>
                <button type="submit" class="btn btn-verde-oscuro fw-semibold px-4 shadow-sm">
                    <i class="bi bi-save me-2"></i> Guardar Cambios
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
