@extends('layout.layout')

@section('title', __('messages.title_show'))

@section('content')
    <h2>{{ __('messages.heading_show', ['number' => $message->id_message]) }}</h2>

    <ul>
        <li><strong>{{ __('messages.detail_type') }}:</strong> {{ $message->type === 'justificante' ? __('messages.type_justificante') : __('messages.type_aviso') }}</li>
        <li><strong>{{ __('messages.detail_subject') }}:</strong> {{ $message->subject }}</li>
        <li><strong>{{ __('messages.detail_body') }}:</strong> {{ $message->body }}</li>
        <li><strong>{{ __('messages.detail_document') }}:</strong>
            @if($message->document)
                <a href="{{ asset('storage/' . $message->document) }}" target="_blank">{{ __('messages.view_document') }}</a>
            @else
                {{ __('messages.no_document') }}
            @endif
        </li>
        <li><strong>{{ __('messages.detail_sent') }}:</strong> {{ $message->created_at }}</li>
    </ul>

    <br>
    <a href="{{ route('messages.index') }}">{{ __('messages.back_button') }}</a>
@endsection

