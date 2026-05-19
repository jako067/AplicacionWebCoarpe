@extends('layout.layout')

@section('title', __('Inicio'))

@section('content')

<div class="container mt-5">

    <div class="card shadow-sm p-4 mb-4">
        <h2 class="text-center mb-3">{{ __('Inicio') }}</h2>

        <p class="text-center text-muted">
            {{ __('Esto es el inicio de la aplicación.') }}
        </p>

        @auth
            <div class="text-center mb-4">
                <h5>{{ __('Bienvenido') }}, {{ Auth::user()->name }}</h5>
            </div>

            @if (auth()->user()->isAdmin())

                <div class="row g-3">

                    <div class="col-md-6">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ __('Materiales') }}</h5>
                                <a href="{{ route('materials.index') }}" class="btn btn-outline-primary btn-sm">
                                    {{ __('Ver listado') }}
                                </a>
                                <a href="{{ route('materials.create') }}" class="btn btn-primary btn-sm">
                                    {{ __('Crear material') }}
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ __('Presupuestos') }}</h5>
                                <a href="{{ route('budgets.index') }}" class="btn btn-outline-primary btn-sm">
                                    {{ __('Ver listado') }}
                                </a>
                                <a href="{{ route('budgets.create') }}" class="btn btn-primary btn-sm">
                                    {{ __('Crear presupuesto') }}
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

            @endif
        @endauth

    </div>

</div>

@endsection
