@extends('layout.layout')

@section('title', 'Trámites y Mensajes')

@section('content')
<div class="container-fluid">

    <div class="mb-4">
        <h2 class="fw-bold mb-1 text-dark">Mensajes y Trámites</h2>
        <p class="text-muted">Comunícate con el equipo y consulta notificaciones</p>
    </div>
{{-- 
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card msg-stat-card border-blue-soft bg-blue-soft shadow-sm h-100">
                <div class="card-body d-flex align-items-center p-3">
                    <div class="icon-circle-sm bg-blue-icon me-3">
                        <i class="bi bi-bell-fill"></i>
                    </div>
                    <div>
                        <h4 class="fw-bold mb-0 text-blue-dark">1</h4>
                        <p class="mb-0 small text-blue-dark">Notificaciones</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card msg-stat-card border-green-soft bg-green-soft shadow-sm h-100">
                <div class="card-body d-flex align-items-center p-3">
                    <div class="icon-circle-sm bg-green-icon me-3">
                        <i class="bi bi-file-earmark-text-fill"></i>
                    </div>
                    <div>
                        <h4 class="fw-bold mb-0 text-green-dark">1</h4>
                        <p class="mb-0 small text-green-dark">Justificantes</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card msg-stat-card border-teal-soft bg-teal-soft shadow-sm h-100">
                <div class="card-body d-flex align-items-center p-3">
                    <div class="icon-circle-sm bg-teal-icon me-3">
                        <i class="bi bi-exclamation-circle-fill"></i>
                    </div>
                    <div>
                        <h4 class="fw-bold mb-0 text-teal-dark">1</h4>
                        <p class="mb-0 small text-teal-dark">Avisos</p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="row g-4">

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm p-4 h-100">
                <div class="d-flex align-items-center mb-3">
                    <i class="bi bi-send fs-4 me-2 text-dark"></i>
                    <h5 class="fw-bold mb-0 text-dark">Enviar Mensaje al Administrador</h5>
                </div>
                <p class="text-muted small mb-4">Redacta un aviso o envía un justificante de ausencia al equipo de administración.</p>

                <form action="{{ route('messages.store') }}" method="POST" enctype="multipart/form-data" class="d-flex flex-column h-100">
                    @csrf

                    <div class="mb-3">
                        <label for="subject" class="form-label text-muted fw-semibold small mb-1">Asunto</label>
                        <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" id="subject" value="{{ old('subject') }}" placeholder="Ej: Justificante médico">
                        @error('subject')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="body" class="form-label text-muted fw-semibold small mb-1">Mensaje</label>
                        <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" rows="4" placeholder="Escribe tu mensaje aquí...">{{ old('body') }}</textarea>
                        @error('body')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="document" class="form-label text-muted fw-semibold small mb-1">Documento Adjunto <span class="fw-normal text-black-50">(Opcional)</span></label>
                        <input class="form-control form-control-sm @error('document') is-invalid @enderror" type="file" name="document" id="document">
                        <div class="form-text small" style="font-size: 0.75rem;">PDF, JPG, PNG (Max. 2MB)</div>
                        @error('document')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-auto">
                        <button type="submit" class="btn btn-login w-100 py-2 fw-semibold shadow-sm">
                            <i class="bi bi-send-fill me-2"></i> Enviar Mensaje
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-lg-8 d-flex flex-column gap-4">

            <div class="card border-0 shadow-sm p-4">
                <div class="d-flex align-items-center mb-4">
                    <i class="bi bi-bell fs-4 me-2 text-dark"></i>
                    <h5 class="fw-bold mb-0 text-dark">Notificaciones</h5>
                </div>

                <div class="d-flex flex-column gap-3">

                    <a href="#" class="text-decoration-none">
                        <div class="p-3 rounded-3 border border-blue-soft bg-blue-soft d-flex gap-3 align-items-start position-relative msg-stat-card">
                            <div class="icon-circle-sm bg-blue-icon flex-shrink-0 mt-1 shadow-sm">
                                <i class="bi bi-bell-fill"></i>
                            </div>
                            <div>
                                <p class="mb-1 text-dark fw-medium">Recordatorio: Mañana habrá reunión de seguridad a las 7:00 AM</p>
                                <small class="text-muted">11/4/2026</small>
                            </div>
                            <i class="bi bi-chevron-right text-blue-dark position-absolute top-50 end-0 translate-middle-y me-3"></i>
                        </div>
                    </a>

                </div>
            </div>

            <div class="card border-0 shadow-sm p-4 h-100">
                <div class="d-flex align-items-center mb-4">
                    <i class="bi bi-clock-history fs-4 me-2 text-dark"></i>
                    <h5 class="fw-bold mb-0 text-dark">Mis Mensajes Enviados</h5>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="text-muted small fw-semibold">ID</th>
                                <th class="text-muted small fw-semibold">Asunto</th>
                                <th class="text-muted small fw-semibold text-center">Documento</th>
                                <th class="text-muted small fw-semibold">Fecha</th>
                                <th class="text-muted small fw-semibold text-end">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($messages as $message)
                                <tr>
                                    <td class="fw-medium text-dark">#{{ $message->id_message }}</td>
                                    <td>{{ $message->subject }}</td>
                                    <td class="text-center">
                                        @if($message->document)
                                            <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25"><i class="bi bi-paperclip"></i> Sí</span>
                                        @else
                                            <span class="text-muted small">-</span>
                                        @endif
                                    </td>
                                    <td class="text-muted small">
                                        {{ \Carbon\Carbon::parse($message->created_at)->format('d/m/Y') }}
                                    </td>
                                    <td class="text-end">
                                        <div class="d-flex justify-content-end gap-1">
                                            <a href="{{ route('messages.show', $message->id_message) }}" class="btn btn-sm btn-outline-secondary" title="Ver Detalle">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('messages.edit', $message->id_message) }}" class="btn btn-sm btn-outline-primary" title="Editar">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('messages.destroy', $message->id_message) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de que deseas borrar este mensaje?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Borrar">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if($messages->isEmpty())
                    <div class="text-center py-5 text-muted">
                        <i class="bi bi-inbox fs-1 d-block mb-2 opacity-50"></i>
                        <p class="mb-0">No has enviado ningún mensaje todavía.</p>
                    </div>
                @endif

            </div>
        </div>

    </div>
</div>
@endsection
