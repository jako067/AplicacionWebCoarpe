@extends('layout.layout')

@section('title', 'Detalle del Mensaje')

@section('content')
<div class="container-fluid max-w-4xl">

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div class="d-flex align-items-center">
            <a href="{{ route('messages.index') }}" class="btn btn-sm btn-outline-secondary me-3 shadow-sm" title="Volver a la bandeja">
                <i class="bi bi-arrow-left"></i> Volver
            </a>
            <h2 class="fw-bold mb-0 text-dark">Mensaje #{{ $message->id }}</h2>
        </div>

        
    </div>

    <div class="card border-0 shadow-sm overflow-hidden mb-4">

        <div class="card-header bg-white border-bottom p-4">
            <div class="row align-items-center g-3">
                <div class="col-md-8">
                    <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 mb-2">
                        Asunto del Trámite
                    </span>
                    <h4 class="fw-bold text-dark mb-0">{{ $message->subject }}</h4>
                </div>
                <div class="col-md-4 text-md-end text-muted small">
                    <div class="mb-1">
                        <i class="bi bi-person me-1"></i> <strong>Autor:</strong> {{ $message->user->name ?? 'Sin usuario' }}
                    </div>
                    <div>
                        <i class="bi bi-calendar-event me-1"></i> <strong>Enviado:</strong> {{ $message->created_at }}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body p-4 bg-light bg-opacity-25">
            <p class="text-muted fw-semibold small text-uppercase mb-2">Contenido del Mensaje</p>

            <div class="bg-white p-4 border rounded-3 shadow-sm text-dark fs-6" style="white-space: pre-line; line-height: 1.6;">
                {{ $message->body }}
            </div>
        </div>

        <div class="card-footer bg-white p-4 border-top">
            <p class="text-muted fw-semibold small text-uppercase mb-2">Documentación Adjunta</p>

            @if ($message->document)
                <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between p-3 bg-light rounded-3 border gap-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="icon-circle-sm bg-success bg-opacity-10 text-success rounded shadow-sm d-flex align-items-center justify-content-center flex-shrink-0" style="width: 44px; height: 44px;">
                            <i class="bi bi-file-earmark-text-fill fs-4"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark mb-0">Archivo Adjunto</h6>
                            <small class="text-muted">El mensaje incluye un documento justificante.</small>
                        </div>
                    </div>

                    <a href="{{ asset('storage/' . $message->document) }}" target="_blank" class="btn btn-verde-oscuro fw-semibold shadow-sm px-4 py-2 flex-shrink-0">
                        <i class="bi bi-box-arrow-up-right me-2"></i> Ver documento
                    </a>
                </div>
            @else
                <div class="p-3 bg-light rounded-3 text-center text-muted small border border-dashed">
                    <i class="bi bi-paperclip me-1"></i> Este mensaje no contiene ningún archivo o documento adjunto.
                </div>
            @endif
        </div>

    </div>
</div>
@endsection
