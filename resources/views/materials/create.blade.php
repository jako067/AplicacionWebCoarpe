@extends('layout.layout')

@section('title', __('Añadir Nuevo Material'))

@section('content')
<div class="container-fluid max-w-4xl">

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div class="d-flex align-items-center">
            <a href="{{ route('materials.index') }}" class="btn btn-sm btn-outline-secondary me-3 shadow-sm">
                <i class="bi bi-arrow-left"></i> {{ __('Volver') }}
            </a>
            <h2 class="fw-bold mb-0 text-dark">{{ __('Añadir Nuevo Material') }}</h2>
        </div>
    </div>

    <div class="card border-0 shadow-sm p-4">
        <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
            <i class="bi bi-box-seam fs-4 me-2 text-verde-oscuro"></i>
            <h5 class="fw-bold mb-0 text-dark">{{ __('Datos del Material') }}</h5>
        </div>

        <form action="{{ route('materials.store') }}" method="POST">
            @csrf
            <div class="row g-4">
                <div class="col-md-6">
                    <label for="material_name" class="form-label text-muted fw-semibold small mb-1">{{ __('Nombre del Material') }} <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('material_name') is-invalid @enderror" name="material_name" id="material_name" value="{{ old('material_name') }}" placeholder="{{ __('Ej: Sacos de Cemento Portland') }}">
                    @error('material_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6">
                    <label for="supplier_contact" class="form-label text-muted fw-semibold small mb-1">{{ __('Contacto / Proveedor') }} <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('supplier_contact') is-invalid @enderror" name="supplier_contact" id="supplier_contact" value="{{ old('supplier_contact') }}" placeholder="{{ __('Ej: Materiales Paco (600123456)') }}">
                    @error('supplier_contact') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6">
                    <label for="unity_price" class="form-label text-muted fw-semibold small mb-1">{{ __('Precio Unitario (€)') }} <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-muted"><i class="bi bi-currency-euro"></i></span>
                        <input type="number" step="0.01" class="form-control @error('unity_price') is-invalid @enderror" name="unity_price" id="unity_price" value="{{ old('unity_price') }}" placeholder="0.00">
                        @error('unity_price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="quantity" class="form-label text-muted fw-semibold small mb-1">{{ __('Cantidad Inicial (Stock)') }} <span class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" id="quantity" value="{{ old('quantity') }}" placeholder="0">
                    @error('quantity') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <hr class="my-4 text-muted opacity-25">

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('materials.index') }}" class="btn btn-light border px-4">{{ __('Cancelar') }}</a>
                <button type="submit" class="btn btn-verde-oscuro fw-semibold px-4 shadow-sm">
                    <i class="bi bi-save me-2"></i> {{ __('Guardar Material') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
