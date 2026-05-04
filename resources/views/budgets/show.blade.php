@extends('layout.layout')

@section('title', __('budgets.title_show'))

@section('content')
    <h2>{{ __('budgets.heading_show', ['number' => $budget->id_budget]) }}</h2>

    <h3>{{ __('budgets.heading_labor') }}:</h3>
    <ul>
        <li><strong>{{ __('budgets.detail_workers') }}:</strong> {{ $budget->workers_quantity }}</li>
        <li><strong>{{ __('budgets.detail_hours') }}:</strong> {{ $budget->hours_quantity }} h</li>
        <li><strong>{{ __('budgets.detail_price_hour') }}:</strong> {{ $budget->price_x_hour }} €</li>
        <li><strong>{{ __('budgets.detail_total_cost') }}: {{ $budget->final_price }} €</strong></li>
    </ul>

    <hr>
    <h3>{{ __('budgets.heading_materials') }}:</h3>
   <table border="1">
        <thead>
            <tr>
                <th>{{ __('budgets.col_material_name') }}</th>
                <th>{{ __('materials.col_unit_price') }}</th>
                <th>{{ __('budgets.col_qty_used') }}</th>
                <th>{{ __('budgets.col_subtotal') }}</th>
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
                    <td colspan="4">{{ __('budgets.no_materials') }}</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <br>
    <a href="{{ route('budgets.edit', $budget->id_budget) }}">
        <button>{{ __('budgets.edit_button') }}</button>
    </a>

    <a href="{{ route('budgets.index') }}">
        <button>{{ __('budgets.back_button') }}</button>
    </a>
@endsection
