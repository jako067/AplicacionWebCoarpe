@extends('layout.layout')
@section('title', __('general.home'))
@section('content')
    {{ __('general.home_intro') }}

    @auth
        {{ __('general.home_welcome') }} {{Auth::user()->name}}
        @if (auth()->user()->isAdmin())
         <ul>
        <li style="margin-bottom: 15px;">
            <strong>{{ __('general.materials') }}:</strong>
            <a href="{{ route('materials.index') }}" style="margin-left: 10px;">{{ __('general.go_to_list') }}</a> |
            <a href="{{ route('materials.create') }}"> {{ __('general.create_material') }}</a>
        </li>

        <li>
            <strong>{{ __('general.budgets') }}:</strong>
            <a href="{{ route('budgets.index') }}" style="margin-left: 10px;"> {{ __('general.go_to_list') }}</a> |
            <a href="{{ route('budgets.create') }}"> {{ __('general.create_budget') }}</a>
        </li>
    </ul>
    @endif


    @endauth








@endsection
