@extends('layout.layout')

@section('title', 'Detalle del Presupuesto')

@section('content')

    <div class="container mt-5">
        <div class="card shadow-sm p-4">
            <h2 class="mb-4 text-center">Presupuesto #{{ $budget->id_budget }}</h2>

            <div class="mb-4">
                <h5 class="section-title">Mano de Obra</h5>
                <ul class="list-group">
                    <li class="list-group-item"><strong>Trabajadores:</strong> {{ $budget->workers_quantity }}</li>
                    <li class="list-group-item"><strong>Horas:</strong> {{ $budget->hours_quantity }} h</li>
                    <li class="list-group-item"><strong>€/Hora:</strong> {{ $budget->price_x_hour }} €</li>
                    <li class="list-group-item fw-bold text-primary">
                        Total: {{ $budget->final_price }} €
                    </li>
                </ul>
            </div>

            <div class="mb-4">
                <h5 class="section-title">Materiales</h5>

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Material</th>
                                <th>Precio Ud.</th>
                                <th>Cantidad</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($budget->materials as $material)
                                <tr>
                                    <td>{{ $material->material_name }}</td>
                                    <td>{{ $material->unity_price }} €</td>
                                    <td>{{ $material->pivot->quantity }}</td>
                                    <td class="fw-bold">
                                        {{ $material->unity_price * $material->pivot->quantity }} €
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">
                                        No hay materiales asignados
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="d-flex gap-2">
                <a href="{{ route('budgets.edit', $budget->id_budget) }}" class="btn btn-primary">
                    Editar
                </a>

                <a href="{{ route('budgets.index') }}" class="btn btn-outline-secondary">
                    Volver
                </a>
            </div>
        </div>
    </div>

@endsection
