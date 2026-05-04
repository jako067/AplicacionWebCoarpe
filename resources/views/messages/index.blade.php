@extends('layout.layout')

@section('title', __('messages.title_list'))

@section('content')
    <h2>{{ __('messages.heading') }}</h2>

    <h3>{{ __('messages.heading_outgoing') }}</h3>

    <a href="{{ route('messages.create') }}">{{ __('messages.send_new') }}</a>
    <br><br>

    <table border="1">
        <thead>
            <tr>
                <th>{{ __('messages.col_type') }}</th>
                <th>{{ __('messages.col_subject') }}</th>
                <th>{{ __('messages.col_document') }}</th>
                <th>{{ __('messages.col_date') }}</th>
                <th>{{ __('general.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($messages as $message)
                <tr>
                    <td>{{ $message->type === 'justificante' ? __('messages.type_justificante') : __('messages.type_aviso') }}</td>
                    <td>{{ $message->subject }}</td>
                    <td>{{ $message->document ? __('general.yes') : __('general.no') }}</td>
                    <td>{{ $message->created_at }}</td>
                    <td>
                        <a href="{{ route('messages.show', $message->id_message) }}">{{ __('messages.view_detail') }}</a> |

                        <form action="{{ route('messages.destroy', $message->id_message) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">{{ __('general.delete') }}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <hr>

    <h3>{{ __('messages.heading_notices') }}</h3>

    <table border="1">
        <thead>
            <tr>
                <th>{{ __('messages.col_title') }}</th>
                <th>{{ __('messages.col_message') }}</th>
                <th>{{ __('messages.col_date') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notices as $notice)
                <tr>
                    <td>{{ $notice->subject }}</td>
                    <td>{{ $notice->body }}</td>
                    <td>{{ $notice->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
