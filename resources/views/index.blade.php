@extends('layout.layout')
@section('title', 'Inicio')

@section('content')
<div class="container py-4">

    @auth
        <div class="welcome-header p-4 mb-4 text-white rounded-3 shadow-sm">
            <h2 class="fw-bold mb-1">Buenas tardes, {{ Auth::user()->name }}</h2>
            <p class="mb-0 text-white-50">Bienvenido al sistema de gestión de COARPE</p>
        </div>

        <div class="row g-3 mb-5">
            <div class="col-xl-3 col-md-6">
                <div class="card stat-card border-0 shadow-sm h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted small fw-semibold mb-1">Horas Este Mes</p>
                            <h3 class="fw-bold mb-0 text-dark">168</h3>
                        </div>
                        <div class="stat-icon-box bg-azul-oscuro text-white shadow-sm">
                            <i class="bi bi-clock"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card stat-card border-0 shadow-sm h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted small fw-semibold mb-1">Días Trabajados</p>
                            <h3 class="fw-bold mb-0 text-dark">21</h3>
                        </div>
                        <div class="stat-icon-box bg-verde-oscuro text-white shadow-sm">
                            <i class="bi bi-calendar-check"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card stat-card border-0 shadow-sm h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted small fw-semibold mb-1">Mensajes Nuevos</p>
                            <h3 class="fw-bold mb-0 text-dark">3</h3>
                        </div>
                        <div class="stat-icon-box bg-verde-oscuro text-white shadow-sm">
                            <i class="bi bi-chat-left-text"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card stat-card border-0 shadow-sm h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted small fw-semibold mb-1">Rendimiento</p>
                            <h3 class="fw-bold mb-0 text-dark">95%</h3>
                        </div>
                        <div class="stat-icon-box bg-primary text-white shadow-sm" style="background-color: #6f42c1 !important;">
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h4 class="fw-bold mb-3 text-dark">Acceso Rápido</h4>
        <div class="row g-3">

            <div class="col-md-4 col-sm-6">
                <div class="card quick-access-card border-0 shadow-sm h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="quick-icon-box bg-verde-claro text-verde-oscuro me-3">
                            <i class="bi bi-clock-history"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Horario</h6>
                            <p class="text-muted small mb-0">Ver mi horario semanal</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="card quick-access-card border-0 shadow-sm h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="quick-icon-box bg-verde-claro text-verde-oscuro me-3">
                            <i class="bi bi-file-earmark-text"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Nóminas</h6>
                            <p class="text-muted small mb-0">Consultar nóminas</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="card quick-access-card border-0 shadow-sm h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="quick-icon-box bg-verde-claro text-verde-oscuro me-3">
                            <i class="bi bi-chat-dots"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Mensajes</h6>
                            <p class="text-muted small mb-0">Ver mensajes y avisos</p>
                        </div>
                    </div>
                </div>
            </div>

            @if (auth()->user()->isAdmin())

                <div class="col-md-4 col-sm-6">
                    <div class="card quick-access-card border-0 shadow-sm h-100">
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex align-items-center mb-3">
                                <div class="quick-icon-box bg-verde-claro text-verde-oscuro me-3">
                                    <i class="bi bi-box-seam"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-0">Materiales</h6>
                                    <p class="text-muted small mb-0">Gestión de inventario</p>
                                </div>
                            </div>
                            <div class="d-flex gap-2 mt-auto">
                                <a href="{{ route('materials.index') }}" class="btn btn-sm btn-outline-custom flex-grow-1">Ir al Listado</a>
                                <a href="{{ route('materials.create') }}" class="btn btn-sm btn-login flex-grow-1">Crear Material</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="card quick-access-card border-0 shadow-sm h-100">
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex align-items-center mb-3">
                                <div class="quick-icon-box bg-verde-claro text-verde-oscuro me-3">
                                    <i class="bi bi-calculator"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-0">Presupuestos</h6>
                                    <p class="text-muted small mb-0">Crear presupuestos</p>
                                </div>
                            </div>
                            <div class="d-flex gap-2 mt-auto">
                                <a href="{{ route('budgets.index') }}" class="btn btn-sm btn-outline-custom flex-grow-1">Ir al Listado</a>
                                <a href="{{ route('budgets.create') }}" class="btn btn-sm btn-login flex-grow-1">Crear</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="card quick-access-card border-0 shadow-sm h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="quick-icon-box bg-verde-claro text-verde-oscuro me-3">
                                <i class="bi bi-people"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Usuarios</h6>
                                <p class="text-muted small mb-0">Gestionar plantilla</p>
                            </div>
                        </div>
                    </div>
                </div>

            @endif
            </div>
    @endauth

</div>
@endsection
