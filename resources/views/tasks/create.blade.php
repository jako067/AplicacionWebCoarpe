@extends('layout.layout')

@section('title', __('tasks.title_create'))

@section('content')
    <h2>{{ __('tasks.heading_create') }}</h2>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <fieldset>
            <legend>{{ __('tasks.legend_shift_data') }}</legend>

            <label for="task_date">{{ __('tasks.label_date') }}:</label><br>
            <input type="date" name="task_date" id="task_date" value="{{ old('task_date', now()->format('Y-m-d')) }}">
            @error('task_date') <span style="color: red;">{{ $message }}</span> @enderror
            <br><br>

            <label for="entry_time">{{ __('tasks.label_entry') }}:</label><br>
            <input type="time" name="entry_time" id="entry_time" value="{{ old('entry_time') }}">
            @error('entry_time') <span style="color: red;">{{ $message }}</span> @enderror
            <br><br>

            <label for="exit_time">{{ __('tasks.label_exit') }}:</label><br>
            <input type="time" name="exit_time" id="exit_time" value="{{ old('exit_time') }}">
            @error('exit_time') <span style="color: red;">{{ $message }}</span> @enderror
        </fieldset>

        <fieldset style="margin-top: 15px;">
            <legend>{{ __('tasks.legend_breaks') }}</legend>

            <label for="break_minutes">{{ __('tasks.label_break') }}:</label><br>
            <input type="number" name="break_minutes" id="break_minutes" min="0" value="{{ old('break_minutes', 0) }}">
            @error('break_minutes') <span style="color: red;">{{ $message }}</span> @enderror
            <br><br>

            <label for="extra_hours">{{ __('tasks.label_extra') }}:</label><br>
            <input type="number" step="0.25" name="extra_hours" id="extra_hours" min="0" value="{{ old('extra_hours', 0) }}">
            @error('extra_hours') <span style="color: red;">{{ $message }}</span> @enderror
        </fieldset>

        <br>
        <button type="submit">{{ __('tasks.save_button') }}</button>
        <a href="{{ route('tasks.index') }}" style="margin-left: 10px;">{{ __('general.cancel') }}</a>
    </form>
@endsection
