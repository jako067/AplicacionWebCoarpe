@extends('layout.layout')

@section('title', __('tasks.title_show'))

@section('content')
    <h2>{{ __('tasks.heading_show', ['number' => $task->id_task]) }}</h2>

    <h3>{{ __('tasks.shift_data') }}:</h3>
    <ul>
        <li><strong>{{ __('tasks.detail_date') }}:</strong> {{ $task->task_date }}</li>
        <li><strong>{{ __('tasks.detail_entry') }}:</strong> {{ $task->entry_time }}</li>
        <li><strong>{{ __('tasks.detail_exit') }}:</strong> {{ $task->exit_time }}</li>
        <li><strong>{{ __('tasks.detail_break') }}:</strong> {{ $task->break_minutes }} {{ __('tasks.detail_minutes') }}</li>
        <li><strong>{{ __('tasks.detail_extra') }}:</strong> {{ $task->extra_hours }} h</li>
        <li><strong>{{ __('tasks.detail_total') }}: {{ $task->total_hours }} h</strong></li>
    </ul>

    <br>
    <a href="{{ route('tasks.edit', $task->id_task) }}">
        <button>{{ __('tasks.edit_button') }}</button>
    </a>

    <a href="{{ route('tasks.index') }}">
        <button>{{ __('tasks.back_button') }}</button>
    </a>
@endsection
