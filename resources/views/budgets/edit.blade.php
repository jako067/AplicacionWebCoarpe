@extends('layout.layout')

@section('title', 'Editar Presupuesto')

@section('content')
    <h2>Editar Presupuesto {{ $budget->id_budget }}</h2>

    <form action="{{ route('budgets.update', $budget->id_budget) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="workers_quantity">Número de Trabajadores:</label><br>
        <input type="number" name="workers_quantity" id="workers_quantity" value="{{ old('workers_quantity', $budget->workers_quantity) }}">
        @error('workers_quantity') <span>{{ $message }}</span> @enderror
        <br><br>

        <label for="hours_quantity">Horas Totales Estimadas:</label><br>
        <input type="number" name="hours_quantity" id="hours_quantity" value="{{ old('hours_quantity', $budget->hours_quantity) }}">
        @error('hours_quantity') <span>{{ $message }}</span> @enderror
        <br><br>

        <label for="price_x_hour">Precio por Hora (€):</label><br>
        <input type="number" step="0.01" name="price_x_hour" id="price_x_hour" value="{{ old('price_x_hour', $budget->price_x_hour) }}">
        @error('price_x_hour') <span>{{ $message }}</span> @enderror
        <br><br>

        <button type="submit">Recalcular y Actualizar</button>
        <a href="{{ route('budgets.index') }}">Volver</a>
    </form>
@endsection
