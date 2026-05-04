@extends('layout.layout')

@section('title', __('tasks.title_list'))

@section('content')
    <h2>{{ __('tasks.heading') }}</h2>

    <fieldset style="margin-bottom: 20px;">
        <legend>{{ __('tasks.legend_total_hours') }}</legend>
        <strong>{{ $totalHours }} h</strong> {{ __('tasks.total_hours_text') }}.
    </fieldset>

    <a href="{{ route('tasks.create') }}">{{ __('tasks.register_new') }}</a>
    <br><br>

    <table border="1">
        <thead>
            <tr>
                <th>{{ __('general.id') }}</th>
                <th>{{ __('tasks.col_date') }}</th>
                <th>{{ __('tasks.col_entry') }}</th>
                <th>{{ __('tasks.col_exit') }}</th>
                <th>{{ __('tasks.col_break') }}</th>
                <th>{{ __('tasks.col_extra') }}</th>
                <th>{{ __('tasks.col_total') }}</th>
                <th>{{ __('general.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->id_task }}</td>
                    <td>{{ $task->task_date }}</td>
                    <td>{{ $task->entry_time }}</td>
                    <td>{{ $task->exit_time }}</td>
                    <td>{{ $task->break_minutes }} min</td>
                    <td>{{ $task->extra_hours }} h</td>
                    <td><strong>{{ $task->total_hours }} h</strong></td>
                    <td>
                        <a href="{{ route('tasks.show', $task->id_task) }}">{{ __('tasks.view_detail') }}</a> |
                        <a href="{{ route('tasks.edit', $task->id_task) }}">{{ __('general.edit') }}</a> |

                        <form action="{{ route('tasks.destroy', $task->id_task) }}" method="POST" style="display:inline;">
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
