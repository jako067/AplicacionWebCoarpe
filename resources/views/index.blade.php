@extends('layout.layout')

@section('title','Inicio')

@section('content')

<div class="container mt-5">

    <div class="card shadow-sm p-4 mb-4">
        <h2 class="text-center mb-3">Inicio</h2>

        <p class="text-center text-muted">
            Esto es el inicio de la aplicación.
        </p>

        @auth
            <div class="text-center mb-4">
                <h5>Bienvenido, {{ Auth::user()->name }}</h5>
            </div>

            @if (auth()->user()->isAdmin())

                <div class="row g-3">

                    <div class="col-md-6">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body text-center">
                                <h5 class="card-title">Materiales</h5>

                                <a href="{{ route('materials.index') }}" class="btn btn-outline-primary btn-sm">
                                    Ver listado
                                </a>

                                <a href="{{ route('materials.create') }}" class="btn btn-primary btn-sm">
                                    Crear material
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body text-center">
                                <h5 class="card-title">Presupuestos</h5>

                                <a href="{{ route('budgets.index') }}" class="btn btn-outline-primary btn-sm ">
                                    Ver listado
                                </a>

                                <a href="{{ route('budgets.create') }}" class="btn btn-primary btn-sm">
                                    Crear presupuesto
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
