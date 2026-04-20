@extends('layout.layout')

@section('title', 'Listado de Presupuestos')

@section('content')

    <div class="container mt-5">
        <div class="card shadow-sm p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">Presupuestos de Obras</h2>
                <a href="{{ route('budgets.create') }}" class="btn btn-primary">Nuevo Presupuesto</a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Trabajadores</th>
                            <th>Horas</th>
                            <th>€/Hora</th>
                            <th>Total</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($budgets as $budget)
                            <tr>
                                <td>{{ $budget->id_budget }}</td>
                                <td>{{ $budget->workers_quantity }}</td>
                                <td>{{ $budget->hours_quantity }} h</td>
                                <td>{{ $budget->price_x_hour }} €</td>
                                <td class="fw-bold text-primary">{{ $budget->final_price }} €</td>
                                <td class="text-end">
                                    <a href="{{ route('budgets.show', $budget->id_budget) }}"
                                        class="btn btn-sm btn-outline-primary">Ver</a>
                                    <a href="{{ route('budgets.edit', $budget->id_budget) }}"
                                        class="btn btn-sm btn-outline-secondary">Editar</a>

                                    <form action="{{ route('budgets.destroy', $budget->id_budget) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Borrar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if ($budgets->isEmpty())
                <p class="text-center text-muted mt-3">No hay presupuestos aún</p>
            @endif
        </div>
    </div>

@endsection
