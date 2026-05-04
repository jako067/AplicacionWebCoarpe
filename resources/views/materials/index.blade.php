@extends('layout.layout')

@section('title', __('materials.title_list'))

@section('content')
    <h2>{{ __('materials.heading') }}</h2>

    <a href="{{ route('materials.create') }}">{{ __('materials.add_new') }}</a>
    <br><br>

    <table border="1">
        <thead>
            <tr>
                <th>{{ __('general.id') }}</th>
                <th>{{ __('materials.col_name') }}</th>
                <th>{{ __('materials.col_unit_price') }}</th>
                <th>{{ __('materials.col_quantity') }}</th>
                <th>{{ __('materials.col_supplier') }}</th>
                <th>{{ __('general.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($materials as $material)
                <tr>
                    <td>{{ $material->material_id }}</td>
                    <td>{{ $material->material_name }}</td>
                    <td>{{ $material->unity_price }}</td>
                    <td>{{ $material->quantity }}</td>
                    <td>{{ $material->supplier_contact }}</td>
                    <td>
                        <a href="{{ route('materials.show', $material->material_id) }}">{{ __('general.view') }}</a> |
                        <a href="{{ route('materials.edit', $material->material_id) }}">{{ __('general.edit') }}</a> |

                        <form action="{{ route('materials.destroy', $material->material_id) }}" method="POST" style="display:inline;">
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
