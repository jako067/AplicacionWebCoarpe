@extends('layout.layout')

@section('title', 'Detalle del Mensaje')

@section('content')
    <h2>Mensaje #{{ $message->id_message }}</h2>

    <h3>Datos del Mensaje:</h3>
    <ul>
        <li><strong>Asunto:</strong> {{ $message->subject }}</li>
        <li><strong>Mensaje:</strong> {{ $message->body }}</li>
        <li><strong>Documento adjunto:</strong>
            @if($message->document)
                <a href="{{ asset('storage/' . $message->document) }}" target="_blank">Ver documento</a>
            @else
                Sin documento adjunto
            @endif
        </li>
        <li><strong>Enviado el:</strong> {{ $message->created_at }}</li>
    </ul>

    <br>
    <a href="{{ route('messages.edit', $message->id_message) }}">
        <button>Editar</button>
    </a>

    <a href="{{ route('messages.index') }}">
        <button>Volver</button>
    </a>
@endsection
