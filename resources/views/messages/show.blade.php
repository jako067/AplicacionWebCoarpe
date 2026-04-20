@extends('layout.layout')

@section('title', 'Detalle del Mensaje')

@section('content')

    <div class="container mt-5">
        <div class="card shadow-sm p-4">
            <h2 class="mb-4 text-center">Mensaje #{{ $message->id }}</h2>

            <ul class="list-group list-group-flush mb-4">
                <li class="list-group-item">
                    <strong>Autor:</strong> {{ $message->user->name ?? 'Sin usuario' }}
                </li>
                <li class="list-group-item">
                    <strong>Asunto:</strong> {{ $message->subject }}
                </li>
                <li class="list-group-item">
                    <strong>Mensaje:</strong> {{ $message->body }}
                </li>
                <li class="list-group-item">
                    <strong>Documento adjunto:</strong>
                    @if ($message->document)
                        <a href="{{ asset('storage/' . $message->document) }}" target="_blank"
                            class="btn btn-sm btn-outline-primary ms-2">
                            Ver documento
                        </a>
                    @else
                        <span class="text-muted">Sin documento adjunto</span>
                    @endif
                </li>
                <li class="list-group-item">
                    <strong>Enviado el:</strong> {{ $message->created_at }}
                </li>
            </ul>

            <div class="d-flex justify-content-between">
                <a href="{{ route('messages.edit', $message->id) }}" class="btn btn-warning">
                    Editar
                </a>

                <a href="{{ route('messages.index') }}" class="btn btn-secondary">
                    Volver
                </a>
            </div>
        </div>
    </div>

@endsection
