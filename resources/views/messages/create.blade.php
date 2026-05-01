@extends('layout.layout')

@section('title', 'Enviar Mensaje')

@section('content')
    <h2>Enviar Mensaje al Administrador</h2>

    <form action="{{ route('messages.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="type">Tipo de comunicación:</label><br>
        <select name="type" id="type">
            <option value="aviso" {{ old('type') == 'aviso' ? 'selected' : '' }}>Aviso de imprevisto</option>
            <option value="justificante" {{ old('type') == 'justificante' ? 'selected' : '' }}>Justificante de falta</option>
        </select>
        @error('type') <span>{{ $message }}</span> @enderror
        <br><br>

        <label for="subject">Asunto:</label><br>
        <input type="text" name="subject" id="subject" value="{{ old('subject') }}">
        @error('subject') <span>{{ $message }}</span> @enderror
        <br><br>

        <label for="body">Mensaje:</label><br>
        <textarea name="body" id="body">{{ old('body') }}</textarea>
        @error('body') <span>{{ $message }}</span> @enderror
        <br><br>

        <label for="document">Adjuntar Archivo (PDF, JPG, PNG):</label><br>
        <input type="file" name="document" id="document">
        @error('document') <span>{{ $message }}</span> @enderror
        <br><br>

        <button type="submit">Enviar Mensaje</button>
        <a href="{{ route('messages.index') }}">Cancelar</a>
    </form>
@endsection
