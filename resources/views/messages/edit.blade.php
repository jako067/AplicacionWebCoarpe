@extends('layout.layout')

@section('title', 'Editar Mensaje')

@section('content')
    <h2>Editar Mensaje {{ $message->id_message }}</h2>

    <form action="{{ route('messages.update', $message->id_message) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="subject">Asunto:</label><br>
        <input type="text" name="subject" id="subject" value="{{ old('subject', $message->subject) }}">
        @error('subject') <span>{{ $message }}</span> @enderror
        <br><br>

        <label for="body">Mensaje:</label><br>
        <textarea name="body" id="body" rows="6" cols="50">{{ old('body', $message->body) }}</textarea>
        @error('body') <span>{{ $message }}</span> @enderror
        <br><br>

        <label for="document">Sustituir Documento (opcional):</label><br>
        @if($message->document)
            <p>Documento actual: <a href="{{ asset('storage/' . $message->document) }}" target="_blank">Ver</a></p>
        @endif
        <input type="file" name="document" id="document">
        @error('document') <span>{{ $message }}</span> @enderror
        <br><br>

        <button type="submit">Actualizar Mensaje</button>
        <a href="{{ route('messages.index') }}">Volver</a>
    </form>
@endsection
