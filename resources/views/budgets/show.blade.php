@extends('layout.layout')

@section('title', 'Detalle del Presupuesto')

@section('content')
    <h2>Presupuesto #{{ $budget->id_budget }}</h2>

    <h3>Datos de Mano de Obra:</h3>
    <ul>
        <li><strong>Nº de Trabajadores:</strong> {{ $budget->workers_quantity }}</li>
        <li><strong>Horas Estimadas:</strong> {{ $budget->hours_quantity }} h</li>
        <li><strong>Precio por Hora:</strong> {{ $budget->price_x_hour }} €</li>
        <li><strong >Coste Total Calculado: {{ $budget->final_price }} €</strong></li>
    </ul>

    <hr>
    <h3>Materiales Asignados:</h3>
   <table border="1">
        <thead>
            <tr>
                <th>Nombre del Material</th>
                <th>Precio Ud.</th>
                <th>Cantidad Usada</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($budget->materials as $material)
                <tr>
                    <td>{{ $material->material_name }}</td>
                    <td>{{ $material->unity_price }} €</td>
                    <td>{{ $material->pivot->quantity }}</td>
                    <td>{{ $material->unity_price * $material->pivot->quantity }} €</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No hay materiales asignados a este presupuesto todavía.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <br>
    <a href="{{ route('budgets.edit', $budget->id_budget) }}">
        <button>Editar </button>
    </a>

    <a href="{{ route('budgets.index') }}">
        <button>Volver</button>
    </a>
@endsection
