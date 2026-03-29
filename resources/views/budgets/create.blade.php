@extends('layout.layout')

@section('title', 'Crear Presupuesto')

@section('content')
    <h2>Nuevo Presupuesto (Cálculo de Mano de Obra)</h2>

    <form action="{{ route('budgets.store') }}" method="POST">
        @csrf

        <label for="workers_quantity">Número de Trabajadores:</label><br>
        <input type="number" name="workers_quantity" id="workers_quantity" value="{{ old('workers_quantity') }}">
        @error('workers_quantity') <span>{{ $message }}</span> @enderror
        <br><br>

        <label for="hours_quantity">Horas Totales Estimadas:</label><br>
        <input type="number" name="hours_quantity" id="hours_quantity" value="{{ old('hours_quantity') }}">
        @error('hours_quantity') <span>{{ $message }}</span> @enderror
        <br><br>

        <label for="price_x_hour">Precio por Hora (€):</label><br>
        <input type="number" step="0.01" name="price_x_hour" id="price_x_hour" value="{{ old('price_x_hour') }}">
        @error('price_x_hour') <span>{{ $message }}</span> @enderror
        <br><br>

        <button type="submit"> Guardar Presupuesto</button>
        <a href="{{ route('budgets.index') }}">Cancelar</a>
    </form>
@endsection
