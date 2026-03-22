@extends('layout.layout')

@section('title', 'Listado de Presupuestos')

@section('content')
    <h2>Presupuestos de Obras</h2>

    <a href="{{ route('budgets.create') }}">Crear Nuevo Presupuesto</a>
    <br><br>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nº Trabajadores</th>
                <th>Horas Estimadas</th>
                <th>Precio/Hora</th>
                <th>Coste Mano de Obra</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($budgets as $budget)
                <tr>
                    <td>{{ $budget->id_budget }}</td>
                    <td>{{ $budget->workers_quantity }}</td>
                    <td>{{ $budget->hours_quantity }} h</td>
                    <td>{{ $budget->price_x_hour }} €</td>
                    <td><strong>{{ $budget->final_price }} €</strong></td>
                    <td>
                        <a href="{{ route('budgets.show', $budget->id_budget) }}">Ver Detalle</a> |
                        <a href="{{ route('budgets.edit', $budget->id_budget) }}">Editar</a> |

                        <form action="{{ route('budgets.destroy', $budget->id_budget) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Borrar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
