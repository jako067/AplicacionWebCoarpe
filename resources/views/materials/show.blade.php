@extends('layout.layout')

@section('title', __('Detalle del Material'))

@section('content')
<div class="container-fluid max-w-4xl">

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div class="d-flex align-items-center">
            <a href="{{ route('materials.index') }}" class="btn btn-sm btn-outline-secondary me-3 shadow-sm">
                <i class="bi bi-arrow-left"></i> {{ __('Volver') }}
            </a>
            <h2 class="fw-bold mb-0 text-dark">{{ __('Ficha del Material') }}</h2>
        </div>

        <a href="{{ route('materials.edit', $material->material_id) }}" class="btn btn-sm btn-outline-primary shadow-sm">
            <i class="bi bi-pencil me-1"></i> {{ __('Editar Material') }}
        </a>
    </div>

    <div class="card border-0 shadow-sm overflow-hidden">

        <div class="card-header bg-white border-bottom p-4">
            <div class="d-flex align-items-start gap-3">
                <div class="icon-circle-sm bg-light text-secondary rounded shadow-sm d-flex align-items-center justify-content-center flex-shrink-0" style="width: 50px; height: 50px;">
                    <i class="bi bi-box-seam fs-3"></i>
                </div>
                <div>
                    <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary border-opacity-25 mb-2">
                        {{ __('Referencia') }} #{{ $material->material_id }}
                    </span>
                    <h4 class="fw-bold text-dark mb-0">{{ $material->material_name }}</h4>
                </div>
            </div>
        </div>

        <div class="card-body p-4 bg-light bg-opacity-50">
            <div class="row g-4">

                <div class="col-sm-6 col-md-4">
                    <div class="bg-white p-3 border rounded-3 h-100">
                        <p class="text-muted fw-semibold small mb-1 text-uppercase">{{ __('Precio Unitario') }}</p>
                        <h4 class="fw-bold text-dark mb-0">
                            {{ number_format($material->unity_price, 2) }} €
                        </h4>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="bg-white p-3 border rounded-3 h-100">
                        <p class="text-muted fw-semibold small mb-1 text-uppercase">{{ __('Stock Disponible') }}</p>
                        <h4 class="fw-bold mb-0 {{ $material->quantity > 0 ? 'text-success' : 'text-danger' }}">
                            {{ $material->quantity }} <span class="fs-6 text-muted fw-normal">{{ __('unidades') }}</span>
                        </h4>
                    </div>
                </div>

                <div class="col-sm-12 col-md-4">
                    <div class="bg-white p-3 border rounded-3 h-100">
                        <p class="text-muted fw-semibold small mb-1 text-uppercase">{{ __('Proveedor / Contacto') }}</p>
                        <div class="d-flex align-items-center mt-1">
                            <i class="bi bi-truck fs-4 text-secondary me-2"></i>
                            <span class="fw-medium text-dark">{{ $material->supplier_contact }}</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection
