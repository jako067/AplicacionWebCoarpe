@extends('layout.layout')

@section('title', 'Editar Presupuesto')

@section('content')

    <div class="container mt-5">
        <div class="card shadow-sm p-4">
            <h2 class="mb-4 text-center">Editar Presupuesto {{ $budget->id_budget }}</h2>

            <form action="{{ route('budgets.update', $budget->id_budget) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Número de Trabajadores</label>
                    <input type="number" name="workers_quantity" class="form-control"
                        value="{{ old('workers_quantity', $budget->workers_quantity) }}">
                    @error('workers_quantity')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Horas Totales Estimadas</label>
                    <input type="number" name="hours_quantity" class="form-control"
                        value="{{ old('hours_quantity', $budget->hours_quantity) }}">
                    @error('hours_quantity')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Precio por Hora (€)</label>
                    <input type="number" step="0.01" name="price_x_hour" class="form-control"
                        value="{{ old('price_x_hour', $budget->price_x_hour) }}">
                    @error('price_x_hour')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Actualizar Presupuesto</button>
                    <a href="{{ route('budgets.index') }}" class="btn btn-outline-secondary">Volver</a>
                </div>
            </form>
        </div>
    </div>

@endsection
