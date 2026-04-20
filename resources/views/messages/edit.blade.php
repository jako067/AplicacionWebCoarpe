@extends('layout.layout')

@section('title', 'Editar Mensaje')

@section('content')

<div class="container mt-5">
    <div class="card shadow-sm p-4">
        <h2 class="mb-4 text-center">Editar Mensaje #{{ $message->id }}</h2>

        <form action="{{ route('messages.update', $message->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <h5 class="section-title">Datos del Mensaje</h5>

                <div class="mb-3">
                    <label class="form-label">Asunto</label>
                    <input type="text" name="subject" class="form-control"
                        value="{{ old('subject', $message->subject) }}">
                    @error('subject')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Mensaje</label>
                    <textarea name="body" class="form-control" rows="6">{{ old('body', $message->body) }}</textarea>
                    @error('body')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-4">
                <h5 class="section-title">Documento</h5>

                @if($message->document)
                    <div class="mb-3">
                        <a href="{{ asset('storage/' . $message->document) }}" target="_blank" class="btn btn-outline-info btn-sm">
                            Ver documento actual
                        </a>
                    </div>
                @endif

                <div class="mb-3">
                    <label class="form-label">Sustituir documento (opcional)</label>
                    <input type="file" name="document" class="form-control">
                    @error('document')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('messages.index') }}" class="btn btn-outline-secondary">Volver</a>
            </div>
        </form>
    </div>
</div>

@endsection
