@extends('layout.layout')

@section('title', __('tasks.title_edit'))

@section('content')
    <h2>{{ __('tasks.heading_edit', ['number' => $task->id_task]) }}</h2>

    <form action="{{ route('tasks.update', $task->id_task) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="task_date">{{ __('tasks.label_date') }}:</label><br>
        <input type="date" name="task_date" id="task_date" value="{{ old('task_date', $task->task_date) }}">
        @error('task_date') <span>{{ $message }}</span> @enderror
        <br><br>

        <label for="entry_time">{{ __('tasks.label_entry') }}:</label><br>
        <input type="time" name="entry_time" id="entry_time" value="{{ old('entry_time', $task->entry_time) }}">
        @error('entry_time') <span>{{ $message }}</span> @enderror
        <br><br>

        <label for="exit_time">{{ __('tasks.label_exit') }}:</label><br>
        <input type="time" name="exit_time" id="exit_time" value="{{ old('exit_time', $task->exit_time) }}">
        @error('exit_time') <span>{{ $message }}</span> @enderror
        <br><br>

        <label for="break_minutes">{{ __('tasks.label_break') }}:</label><br>
        <input type="number" name="break_minutes" id="break_minutes" min="0" value="{{ old('break_minutes', $task->break_minutes) }}">
        @error('break_minutes') <span>{{ $message }}</span> @enderror
        <br><br>

        <label for="extra_hours">{{ __('tasks.label_extra') }}:</label><br>
        <input type="number" step="0.25" name="extra_hours" id="extra_hours" min="0" value="{{ old('extra_hours', $task->extra_hours) }}">
        @error('extra_hours') <span>{{ $message }}</span> @enderror
        <br><br>

        <button type="submit">{{ __('tasks.update_button') }}</button>
        <a href="{{ route('tasks.index') }}">{{ __('tasks.back_button') }}</a>
    </form>
@endsection
