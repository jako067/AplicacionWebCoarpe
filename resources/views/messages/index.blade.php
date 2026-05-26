@extends('layout.layout')

@section('title', __('Trámites y Mensajes'))

@section('content')
<div class="container-fluid px-4 py-4">

    <div class="mb-4 d-flex align-items-center justify-content-between bg-white p-3 rounded-3 shadow-sm">
        <div>
            <h2 class="fw-bold mb-1 text-dark">{{ __('Trámites y Mensajes') }}</h2>
            <p class="text-muted mb-0 small">{{ __('Gestiona tu comunicación directa con el administrador y adjunta documentación.') }}</p>
        </div>
        <div class="bg-light p-2 rounded-3 border">
            <span class="text-muted small fw-semibold">{{ __('Estado global:') }}</span>
            <span class="badge bg-secondary rounded-pill ms-1">{{ $messages->count() }} {{ __('Mensajes') }}</span>
        </div>
    </div>

    <div class="row g-4">

        <div class="col-xl-8 col-lg-7">
            <div class="card border-0 shadow-sm rounded-3 overflow-hidden bg-white">

                <div class="card-header bg-white border-bottom p-3 d-flex justify-content-between align-items-center">
                    <h6 class="fw-bold text-dark mb-0">
                        <i class="bi bi-envelope-paper text-primary me-2"></i> {{ __('Historial de Mensajes') }}
                    </h6>

                    <div class="form-check form-switch mb-0 d-flex align-items-center gap-2">
                        <label class="form-check-label small fw-bold text-muted" for="typeToggle" id="toggleLabel">
                            <i class="bi bi-box-arrow-in-down text-primary"></i> {{ __('Bandeja de Entrada') }}
                        </label>
                        <input class="form-check-input fs-5 m-0 shadow-sm" type="checkbox" role="switch" id="typeToggle">
                    </div>
                </div>

                <div class="card-body bg-light border-bottom p-3">
                    <div class="row g-3">
                        <div class="col-md-5">
                            <label class="form-label text-muted small fw-bold mb-1">{{ __('Buscar por Contenido') }}</label>
                            <div class="input-group input-group-sm shadow-sm">
                                <span class="input-group-text bg-white text-muted border-end-0"><i class="bi bi-search"></i></span>
                                <input type="text" id="searchInput" class="form-control border-start-0" placeholder="{{ __('Palabra en asunto o cuerpo...') }}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label text-muted small fw-bold mb-1">{{ __('Buscar por Empleado') }}</label>
                            <div class="input-group input-group-sm shadow-sm">
                                <span class="input-group-text bg-white text-muted border-end-0"><i class="bi bi-person"></i></span>
                                <input type="text" id="userSearchInput" class="form-control border-start-0" placeholder="{{ __('Nombre o usuario del autor...') }}">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label text-muted small fw-bold mb-1">{{ __('Orden Cronológico') }}</label>
                            <select id="sortSelect" class="form-select form-select-sm shadow-sm">
                                <option value="desc">{{ __('Más recientes primero') }}</option>
                                <option value="asc">{{ __('Más antiguos primero') }}</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="text-muted small fw-semibold ps-4" style="width: 8%">ID</th>
                                <th class="text-muted small fw-semibold" style="width: 22%">{{ __('Autor/Destinatario') }}</th>
                                <th class="text-muted small fw-semibold" style="width: 35%">{{ __('Asunto') }}</th>
                                <th class="text-muted small fw-semibold text-center" style="width: 12%">{{ __('Adjunto') }}</th>
                                <th class="text-muted small fw-semibold" style="width: 13%">{{ __('Fecha') }}</th>
                                <th class="text-muted small fw-semibold text-end pe-4" style="width: 10%">{{ __('Acciones') }}</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            @include('messages.partials._table_rows')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-5">
            <div class="card border-0 shadow-sm rounded-3 p-4 bg-white">

                <div class="d-flex align-items-center mb-3 pb-2 border-bottom">
                    <i class="bi bi-pencil-square fs-5 me-2 text-verde-oscuro"></i>
                    <h5 class="fw-bold mb-0 text-dark">{{ __('Nuevo Trámite / Mensaje') }}</h5>
                </div>

                <form action="{{ route('messages.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @if(auth()->user()->rol === 'admin' || auth()->user()->rol === 'foreman')
                        <div class="mb-3 p-3 bg-light rounded border">
                            <label class="form-label text-dark fw-bold small mb-2"><i class="bi bi-person-lines-fill text-primary"></i> {{ __('Seleccionar Destinatario') }}</label>

                            <select name="group_id" id="group_id" class="form-select form-select-sm mb-2 shadow-sm">
                                <option value="">-- {{ __('Enviar a una Cuadrilla') }} --</option>
                                @foreach($groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @endforeach
                            </select>

                            <div class="text-center text-muted small my-1 fw-bold">{{ __('O') }}</div>

                            <select name="recipient_id" id="recipient_id" class="form-select form-select-sm shadow-sm">
                                <option value="">-- {{ __('Enviar a un Trabajador concreto') }} --</option>
                                @foreach($workers as $worker)
                                    <option value="{{ $worker->id }}">{{ $worker->name }} ({{ ucfirst($worker->rol) }})</option>
                                @endforeach
                            </select>
                        </div>
                    @else
                        <div class="alert alert-info py-2 px-3 small shadow-sm d-flex align-items-center mb-3">
                            <i class="bi bi-info-circle-fill me-2 fs-5"></i>
                            <span>{{ __('Este trámite se enviará directamente de forma privada al') }} <strong>{{ __('Administrador') }}</strong>.</span>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="subject" class="form-label text-muted fw-semibold small mb-1">{{ __('Asunto del Mensaje') }} <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" id="subject" value="{{ old('subject') }}" placeholder="{{ __('Ej: Solicitud de Vacaciones') }}">
                        @error('subject')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="body" class="form-label text-muted fw-semibold small mb-1">{{ __('Mensaje / Explicación') }} <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" rows="5" placeholder="{{ __('Detalles del trámite...') }}"></textarea>
                        @error('body')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="document" class="form-label text-muted fw-semibold small mb-1">{{ __('Adjuntar Documento') }}</label>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text bg-light text-muted"><i class="bi bi-file-earmark-arrow-up"></i></span>
                            <input class="form-control @error('document') is-invalid @enderror" type="file" name="document" id="document">
                        </div>
                        @error('document')
                            <div class="text-danger small mt-1" style="font-size: 0.8rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-verde-oscuro w-100 fw-semibold py-2 shadow-sm">
                        <i class="bi bi-send-fill me-2"></i> {{ __('Enviar') }}
                    </button>
                </form>

            </div>
        </div>

    </div>
</div>

<script src="{{ asset('js/searchMess.js') }}"></script>
@endsection
