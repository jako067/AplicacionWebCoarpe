@extends('layout.layout')

@section('title', 'Enviar Mensaje')

@section('content')

<div class="container mt-5">
    <div class="card shadow-sm p-4">
        <h2 class="mb-4 text-center">Enviar Mensaje al Administrador</h2>

        <form action="{{ route('messages.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <h5 class="section-title">Datos del Mensaje</h5>

                <div class="mb-3">
                    <label class="form-label">Asunto</label>
                    <input type="text" name="subject" class="form-control" value="{{ old('subject') }}">
                    @error('subject')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Mensaje</label>
                    <textarea name="body" class="form-control" rows="6">{{ old('body') }}</textarea>
                    @error('body')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-4">
                <h5 class="section-title">Documento (Opcional)</h5>

                <div class="mb-3">
                    <label class="form-label">Adjuntar archivo (PDF, JPG, PNG - máx. 2MB)</label>
                    <input type="file" name="document" class="form-control">
                    @error('document')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
                <a href="{{ route('messages.index') }}" class="btn btn-outline-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>

@endsection
