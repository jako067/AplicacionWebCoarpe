@extends('layout.layout')

@section('title', 'Trámites y Mensajes')

@section('content')

    <div class="container mt-5">
        <div class="card shadow-sm p-4">
            <h2 class="mb-4 text-center">Trámites y Mensajes</h2>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="mb-0">Mis Mensajes al Administrador</h5>
                <a href="{{ route('messages.create') }}" class="btn btn-primary">
                    Enviar Mensaje
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Autor</th>
                            <th>Asunto</th>
                            <th>Documento</th>
                            <th>Fecha</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($messages as $message)
                            <tr>
                                <td>{{ $message->id }}</td>

                                <td>
                                    {{ $message->user->name ?? 'Sin usuario' }}
                                </td>

                                <td>{{ $message->subject }}</td>

                                <td>
                                    @if ($message->document)
                                        <span class="badge bg-success">Sí</span>
                                    @else
                                        <span class="badge bg-secondary">No</span>
                                    @endif
                                </td>

                                <td>{{ $message->created_at }}</td>

                                <td class="text-end">
                                    <a href="{{ route('messages.show', $message->id) }}"
                                        class="btn btn-sm btn-outline-primary">
                                        Ver
                                    </a>

                                    <a href="{{ route('messages.edit', $message->id) }}"
                                        class="btn btn-sm btn-outline-secondary">
                                        Editar
                                    </a>

                                    <form action="{{ route('messages.destroy', $message->id) }}" method="POST"
                                        class="d-inline">
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
                                    No hay mensajes aún
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
