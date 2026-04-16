@extends('layout.layout')

@section('title', 'Enviar Mensaje')

@section('content')
    <h2>Enviar Mensaje al Administrador</h2>

    <form action="{{ route('messages.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <fieldset>
            <legend>Datos del Mensaje</legend>

            <label for="subject">Asunto:</label><br>
            <input type="text" name="subject" id="subject" value="{{ old('subject') }}">
            @error('subject') <span style="color: red;">{{ $message }}</span> @enderror
            <br><br>

            <label for="body">Mensaje:</label><br>
            <textarea name="body" id="body" rows="6" cols="50">{{ old('body') }}</textarea>
            @error('body') <span style="color: red;">{{ $message }}</span> @enderror
        </fieldset>

        <fieldset style="margin-top: 15px;">
            <legend>Justificante / Documento (Opcional)</legend>

            <label for="document">Adjuntar Archivo (PDF, JPG, PNG - máx. 2MB):</label><br>
            <input type="file" name="document" id="document">
            @error('document') <span style="color: red;">{{ $message }}</span> @enderror
        </fieldset>

        <br>
        <button type="submit">Enviar Mensaje</button>
        <a href="{{ route('messages.index') }}" style="margin-left: 10px;">Cancelar</a>
    </form>
@endsection
