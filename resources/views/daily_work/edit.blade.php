@extends('layouts.app')

@section('content')
<h1>Editar Daily Work</h1>
<form action="{{ route('daily_work.update', $dailyWork->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="work_id">Work ID</label>
    <input type="number" name="work_id" value="{{ $dailyWork->work_id }}"><br>
    <label for="reporte">Reporte</label>
    <input type="text" name="reporte" value="{{ $dailyWork->reporte }}"><br>
    <label for="date">Fecha</label>
    <input type="date" name="date" value="{{ $dailyWork->date }}"><br>
    <label for="evaluation">Evaluación</label>
    <input type="text" name="evaluation" value="{{ $dailyWork->evaluation }}"><br>
    <label for="Incidences">Incidencias</label>
    <input type="text" name="Incidences" value="{{ $dailyWork->Incidences }}"><br>
    <button type="submit" class="button">Actualizar</button>
    <a href="{{ route('daily_work.index') }}" class="link">Cancelar</a>
</form>
@endsection
