@extends('layout.layout')

@section('title', __('materials.title_show'))

@section('content')
    <h2>{{ __('materials.heading_show') }}: {{ $material->material_name }}</h2>

    <ul>
        <li><strong>{{ __('general.id') }}:</strong> {{ $material->material_id }}</li>
        <li><strong>{{ __('materials.detail_name') }}:</strong> {{ $material->material_name }}</li>
        <li><strong>{{ __('materials.detail_unit_price') }}:</strong> {{ $material->unity_price }} €</li>
        <li><strong>{{ __('materials.detail_quantity') }}:</strong> {{ $material->quantity }} {{ __('materials.detail_units') }}</li>
        <li><strong>{{ __('materials.detail_supplier') }}:</strong> {{ $material->supplier_contact }}</li>
    </ul>

    <br>
    <a href="{{ route('materials.edit', $material->material_id) }}">
        <button>{{ __('materials.edit_button') }}</button>
    </a>

    <a href="{{ route('materials.index') }}">
        <button>{{ __('materials.back_button') }}</button>
    </a>
@endsection
