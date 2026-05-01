@extends('layout.layout')

@section('title', 'Editar Mensaje')

@section('content')
<div class="container-fluid max-w-4xl">

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div class="d-flex align-items-center">
            <a href="{{ route('messages.index') }}" class="btn btn-sm btn-outline-secondary me-3 shadow-sm" title="Volver a los mensajes">
                <i class="bi bi-arrow-left"></i> Volver
            </a>
            <h2 class="fw-bold mb-0 text-dark">Editar Mensaje <span class="text-primary">#{{ $message->id_message }}</span></h2>
        </div>
    </div>

    <div class="card border-0 shadow-sm p-4">

        <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
            <i class="bi bi-pencil-square fs-4 me-2 text-primary"></i>
            <h5 class="fw-bold mb-0 text-dark">Modificar contenido del mensaje</h5>
        </div>

        <form action="{{ route('messages.update', $message->id_message) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-4">

                <div class="col-12">
                    <label for="subject" class="form-label text-muted fw-semibold small mb-1">Asunto <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" id="subject" value="{{ old('subject', $message->subject) }}" placeholder="Ej: Justificante médico modificado">
                    @error('subject')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="body" class="form-label text-muted fw-semibold small mb-1">Mensaje <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" rows="6" placeholder="Escribe el contenido del mensaje...">{{ old('body', $message->body) }}</textarea>
                    @error('body')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="document" class="form-label text-muted fw-semibold small mb-1">Sustituir Documento Adjunto <span class="fw-normal text-black-50">(Opcional)</span></label>

                    @if($message->document)
                        <div class="d-flex align-items-center gap-2 mb-3 p-2 bg-light rounded border border-secondary border-opacity-25 w-50">
                            <i class="bi bi-file-earmark-check-fill text-success fs-5"></i>
                            <span class="small text-dark fw-medium">Ya hay un documento adjunto:</span>
                            <a href="{{ asset('storage/' . $message->document) }}" target="_blank" class="btn btn-sm btn-outline-secondary py-0 px-2 small shadow-sm">
                                <i class="bi bi-eye me-1"></i> Ver archivo
                            </a>
                        </div>
                    @endif

                    <input class="form-control form-control-sm w-50 @error('document') is-invalid @enderror" type="file" name="document" id="document">
                    <div class="form-text small mt-1" style="font-size: 0.75rem;">Sube un nuevo archivo solo si deseas reemplazar el actual (PDF, JPG, PNG. Max. 2MB).</div>

                    @error('document')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <hr class="my-4 text-muted opacity-25">

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('messages.index') }}" class="btn btn-light border px-4 shadow-sm">Cancelar</a>
                <button type="submit" class="btn btn-primary fw-semibold px-4 shadow-sm">
                    <i class="bi bi-save me-2"></i> Actualizar Mensaje
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
