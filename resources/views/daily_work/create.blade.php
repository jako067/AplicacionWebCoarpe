@extends('layout.layout')

@section('content')
<h1>Agregar Daily Work</h1>
<form action="{{ route('daily_work.store') }}" method="POST">
    @csrf
    <label for="work_id">Work ID</label>
    <input type="number" name="work_id" class="input"><br>
    <label for="reporte">Reporte</label>
    <input type="text" name="reporte" class="input"><br>
    <label for="date">Fecha</label>
    <input type="date" name="date" class="input"><br>
    <label for="evaluation">Evaluación</label>
    <input type="text" name="evaluation" class="input"><br>
    <label for="Incidences">Incidencias</label>
    <input type="text" name="Incidences" class="input"><br>
    <button type="submit" class="button">Guardar</button>
    <a href="{{ route('daily_work.index') }}" class="link">Cancelar</a>
</form>
@endsection
