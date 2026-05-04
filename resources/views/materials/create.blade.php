@extends('layout.layout')

@section('title', __('materials.title_create'))

@section('content')
    <h2>{{ __('materials.heading_create') }}</h2>

    <form action="{{ route('materials.store') }}" method="POST">
        @csrf

        <label for="material_name">{{ __('materials.label_name') }}:</label><br>
        <input type="text" name="material_name" id="material_name" value="{{ old('material_name') }}">
        @error('material_name') <span>{{ $message }}</span> @enderror
        <br><br>

        <label for="unity_price">{{ __('materials.label_unit_price') }}:</label><br>
        <input type="number" step="0.01" name="unity_price" id="unity_price" value="{{ old('unity_price') }}">
        @error('unity_price') <span>{{ $message }}</span> @enderror
        <br><br>

        <label for="quantity">{{ __('materials.label_quantity') }}:</label><br>
        <input type="number" name="quantity" id="quantity" value="{{ old('quantity') }}">
        @error('quantity') <span>{{ $message }}</span> @enderror
        <br><br>

        <label for="supplier_contact">{{ __('materials.label_supplier') }}:</label><br>
        <input type="text" name="supplier_contact" id="supplier_contact" value="{{ old('supplier_contact') }}">
        @error('supplier_contact') <span>{{ $message }}</span> @enderror
        <br><br>

        <button type="submit">{{ __('materials.save_button') }}</button>
        <a href="{{ route('materials.index') }}">{{ __('general.cancel') }}</a>
    </form>
@endsection
