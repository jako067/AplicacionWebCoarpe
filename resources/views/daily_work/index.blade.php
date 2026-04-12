@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Daily Work</h1>
    <a href="{{ route('daily_work.create') }}" class="btn btn-primary mb-3">Agregar Registro</a>
        <tbody>
            @foreach($dailyWorks as $dailyWork)
            <tr>
                <td>{{ $dailyWork->work_id }}</td>
                <td>{{ $dailyWork->reporte }}</td>
                <td>{{ $dailyWork->date }}</td>
                <td>{{ $dailyWork->evaluation }}</td>
                <td>{{ $dailyWork->Incidences }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
