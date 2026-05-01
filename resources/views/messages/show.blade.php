@extends('layout.layout')

@section('title', 'Detalle del Mensaje')

@section('content')
<div class="container-fluid max-w-4xl">

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div class="d-flex align-items-center">
            <a href="{{ route('messages.index') }}" class="btn btn-sm btn-outline-secondary me-3 shadow-sm">
                <i class="bi bi-arrow-left"></i> Volver
            </a>
            <h2 class="fw-bold mb-0 text-dark">Detalle del Mensaje</h2>
        </div>

        <a href="{{ route('messages.edit', $message->id_message) }}" class="btn btn-sm btn-outline-primary shadow-sm">
            <i class="bi bi-pencil me-1"></i> Editar
        </a>
    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white border-bottom p-4">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary border-opacity-25 mb-2">
                        Ticket #{{ $message->id_message }}
                    </span>
                    <h4 class="fw-bold text-dark mb-0">{{ $message->subject }}</h4>
                </div>
                <div class="text-end text-muted small">
                    <i class="bi bi-calendar3 me-1"></i>
                    {{ \Carbon\Carbon::parse($message->created_at)->format('d/m/Y H:i') }}
                </div>
            </div>
        </div>

        <div class="card-body p-4 bg-light bg-opacity-50">
            <p class="text-muted fw-semibold small mb-2 text-uppercase tracking-wider">Cuerpo del mensaje:</p>
            <div class="bg-white p-3 rounded border text-dark" style="min-height: 150px; white-space: pre-wrap;">{{ $message->body }}</div>
        </div>

        <div class="card-footer bg-white border-top p-4">
            <p class="text-muted fw-semibold small mb-2">Documento adjunto:</p>

            @if($message->document)
                <a href="{{ asset('storage/' . $message->document) }}" target="_blank" class="btn btn-outline-success d-inline-flex align-items-center">
                    <i class="bi bi-file-earmark-pdf fs-4 me-2"></i>
                    <div class="text-start">
                        <span class="d-block fw-semibold">Ver documento adjunto</span>
                        <small class="d-block text-success" style="font-size: 0.75rem;">Abrir en nueva pestaña</small>
                    </div>
                </a>
            @else
                <div class="text-muted small d-flex align-items-center">
                    <i class="bi bi-x-circle me-2"></i> Este mensaje no contiene documentos adjuntos.
                </div>
            @endif
        </div>

    </div>
</div>
@endsection
