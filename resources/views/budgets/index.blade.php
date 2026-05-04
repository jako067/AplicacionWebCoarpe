@extends('layout.layout')

@section('title', __('budgets.title_list'))

@section('content')
    <h2>{{ __('budgets.heading') }}</h2>

    <a href="{{ route('budgets.create') }}">{{ __('budgets.create_new') }}</a>
    <br><br>

    <table border="1">
        <thead>
            <tr>
                <th>{{ __('general.id') }}</th>
                <th>{{ __('budgets.col_workers') }}</th>
                <th>{{ __('budgets.col_hours') }}</th>
                <th>{{ __('budgets.col_price_hour') }}</th>
                <th>{{ __('budgets.col_labor_cost') }}</th>
                <th>{{ __('general.actions') }}</th>
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
                        <a href="{{ route('budgets.show', $budget->id_budget) }}">{{ __('budgets.view_detail') }}</a> |
                        <a href="{{ route('budgets.edit', $budget->id_budget) }}">{{ __('general.edit') }}</a> |

                        <form action="{{ route('budgets.destroy', $budget->id_budget) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">{{ __('general.delete') }}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
