@extends('layout.layout')

@section('title', 'Editar Grupo')

@section('content')

    <div class="container mt-5">

        <div class="card shadow rounded-4">
            <div class="card-body">

                <h4 class="mb-4 fw-bold">Editar Grupo</h4>

                <form method="POST" action="{{ route('groups.update', $group) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Nombre del grupo</label>
                        <input type="text" name="name" class="form-control" value="{{ $group->name }}"
                            placeholder="Nombre">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripción</label>
                        <textarea name="description" class="form-control" placeholder="Descripción">{{ $group->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Seleccionar usuarios</label>

                        <div class="row">
                            @foreach ($users as $user)
                                <div class="col-md-4 mb-2">

                                    <div class="card border shadow-sm">
                                        <div class="card-body py-2">

                                            <div class="form-check">

                                                <input class="form-check-input" type="checkbox" name="users[]"
                                                    value="{{ $user->id }}" id="user{{ $user->id }}"
                                                    {{ $group->users->contains($user->id) ? 'checked' : '' }}>

                                                <label class="form-check-label w-100" for="user{{ $user->id }}">
                                                    <strong>{{ $user->name }}</strong><br>
                                                    <small class="text-muted">{{ $user->username }}</small>
                                                </label>

                                            </div>

                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        </div>

                    </div>

                    <button class="btn btn-success w-100">
                        Guardar cambios
                    </button>

                </form>

            </div>
        </div>

    </div>

@endsection
