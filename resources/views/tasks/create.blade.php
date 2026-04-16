@extends('layout.layout')

@section('title', 'Registrar Jornada')

@section('content')
    <h2>Registrar Nueva Jornada</h2>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <fieldset>
            <legend>Datos de la Jornada</legend>

            <label for="task_date">Fecha:</label><br>
            <input type="date" name="task_date" id="task_date" value="{{ old('task_date', now()->format('Y-m-d')) }}">
            @error('task_date') <span style="color: red;">{{ $message }}</span> @enderror
            <br><br>

            <label for="entry_time">Hora de Entrada:</label><br>
            <input type="time" name="entry_time" id="entry_time" value="{{ old('entry_time') }}">
            @error('entry_time') <span style="color: red;">{{ $message }}</span> @enderror
            <br><br>

            <label for="exit_time">Hora de Salida:</label><br>
            <input type="time" name="exit_time" id="exit_time" value="{{ old('exit_time') }}">
            @error('exit_time') <span style="color: red;">{{ $message }}</span> @enderror
        </fieldset>

        <fieldset style="margin-top: 15px;">
            <legend>Descansos y Horas Extra</legend>

            <label for="break_minutes">Minutos de Descanso:</label><br>
            <input type="number" name="break_minutes" id="break_minutes" min="0" value="{{ old('break_minutes', 0) }}">
            @error('break_minutes') <span style="color: red;">{{ $message }}</span> @enderror
            <br><br>

            <label for="extra_hours">Horas Extra (marcadas por el capataz):</label><br>
            <input type="number" step="0.25" name="extra_hours" id="extra_hours" min="0" value="{{ old('extra_hours', 0) }}">
            @error('extra_hours') <span style="color: red;">{{ $message }}</span> @enderror
        </fieldset>

        <br>
        <button type="submit">Guardar Jornada</button>
        <a href="{{ route('tasks.index') }}" style="margin-left: 10px;">Cancelar</a>
    </form>
@endsection
