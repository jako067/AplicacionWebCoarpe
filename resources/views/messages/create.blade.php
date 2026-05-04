@extends('layout.layout')

@section('title', __('messages.title_create'))

@section('content')
    <h2>{{ __('messages.heading_create') }}</h2>

    <form action="{{ route('messages.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="type">{{ __('messages.label_type') }}:</label><br>
        <select name="type" id="type">
            <option value="aviso" {{ old('type') == 'aviso' ? 'selected' : '' }}>{{ __('messages.type_aviso') }}</option>
            <option value="justificante" {{ old('type') == 'justificante' ? 'selected' : '' }}>{{ __('messages.type_justificante') }}</option>
        </select>
        @error('type') <span>{{ $message }}</span> @enderror
        <br><br>

        <label for="subject">{{ __('messages.label_subject') }}:</label><br>
        <input type="text" name="subject" id="subject" value="{{ old('subject') }}">
        @error('subject') <span>{{ $message }}</span> @enderror
        <br><br>

        <label for="body">{{ __('messages.label_body') }}:</label><br>
        <textarea name="body" id="body">{{ old('body') }}</textarea>
        @error('body') <span>{{ $message }}</span> @enderror
        <br><br>

        <label for="document">{{ __('messages.label_document') }}:</label><br>
        <input type="file" name="document" id="document">
        @error('document') <span>{{ $message }}</span> @enderror
        <br><br>

        <button type="submit">{{ __('messages.send_button') }}</button>
        <a href="{{ route('messages.index') }}">{{ __('general.cancel') }}</a>
    </form>
@endsection
