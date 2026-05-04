@extends('layout.layout')

@section('title', __('budgets.title_edit'))

@section('content')
    <h2>{{ __('budgets.heading_edit', ['number' => $budget->id_budget]) }}</h2>

    <form action="{{ route('budgets.update', $budget->id_budget) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="workers_quantity">{{ __('budgets.label_workers') }}:</label><br>
        <input type="number" name="workers_quantity" id="workers_quantity" value="{{ old('workers_quantity', $budget->workers_quantity) }}">
        @error('workers_quantity') <span>{{ $message }}</span> @enderror
        <br><br>

        <label for="hours_quantity">{{ __('budgets.label_hours') }}:</label><br>
        <input type="number" name="hours_quantity" id="hours_quantity" value="{{ old('hours_quantity', $budget->hours_quantity) }}">
        @error('hours_quantity') <span>{{ $message }}</span> @enderror
        <br><br>

        <label for="price_x_hour">{{ __('budgets.label_price_hour') }}:</label><br>
        <input type="number" step="0.01" name="price_x_hour" id="price_x_hour" value="{{ old('price_x_hour', $budget->price_x_hour) }}">
        @error('price_x_hour') <span>{{ $message }}</span> @enderror
        <br><br>

        <button type="submit">{{ __('budgets.update_button') }}</button>
        <a href="{{ route('budgets.index') }}">{{ __('general.back') }}</a>
    </form>
@endsection
