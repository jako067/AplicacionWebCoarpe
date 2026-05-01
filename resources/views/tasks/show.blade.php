@extends('layout.layout')

@section('title', 'Detalle de Jornada')

@section('content')
<div class="container-fluid max-w-4xl">

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div class="d-flex align-items-center">
            <a href="{{ route('tasks.index') }}" class="btn btn-sm btn-outline-secondary me-3 shadow-sm" title="Volver al historial">
                <i class="bi bi-arrow-left"></i> Volver
            </a>
            <h2 class="fw-bold mb-0 text-dark">
                Jornada <span class="text-verde-oscuro">#{{ $task->id_task }}</span>
            </h2>
        </div>

        <a href="{{ route('tasks.edit', $task->id_task) }}" class="btn btn-sm btn-outline-primary shadow-sm">
            <i class="bi bi-pencil me-1"></i> Editar Jornada
        </a>
    </div>

    <div class="row g-4">

        <div class="col-lg-7">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-bottom p-4">
                    <h5 class="fw-bold text-dark mb-0">
                        <i class="bi bi-calendar-check fs-5 me-2 text-primary"></i> Horario Registrado
                    </h5>
                </div>

                <div class="card-body p-4 bg-light bg-opacity-50">
                    <div class="row g-4">

                        <div class="col-12">
                            <div class="bg-white p-3 border rounded-3 shadow-sm d-flex align-items-center">
                                <div class="icon-circle-sm bg-light text-secondary rounded me-3 flex-shrink-0" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                    <i class="bi bi-calendar-event fs-5"></i>
                                </div>
                                <div>
                                    <p class="text-muted fw-semibold small mb-0 text-uppercase">Fecha de la jornada</p>
                                    <h5 class="fw-bold text-dark mb-0">{{ $task->task_date }}</h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="bg-white p-3 border rounded-3 shadow-sm h-100">
                                <p class="text-muted fw-semibold small mb-1 text-uppercase">Hora de Entrada</p>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-box-arrow-in-right text-success fs-4 me-2"></i>
                                    <h4 class="fw-bold text-dark mb-0">{{ $task->entry_time }}</h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="bg-white p-3 border rounded-3 shadow-sm h-100">
                                <p class="text-muted fw-semibold small mb-1 text-uppercase">Hora de Salida</p>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-box-arrow-right text-danger fs-4 me-2"></i>
                                    <h4 class="fw-bold text-dark mb-0">{{ $task->exit_time }}</h4>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card border-0 shadow-sm h-100 bg-verde-oscuro text-white">
                <div class="card-header border-bottom border-white border-opacity-25 p-4">
                    <h5 class="fw-bold mb-0 text-white">
                        <i class="bi bi-calculator fs-5 me-2 opacity-75"></i> Resumen de Horas
                    </h5>
                </div>

                <div class="card-body p-4 d-flex flex-column">

                    <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom border-white border-opacity-25">
                        <span class="opacity-75 d-flex align-items-center">
                            <i class="bi bi-cup-hot me-2"></i> Descanso
                        </span>
                        <span class="fw-medium fs-5">{{ $task->break_minutes }} min</span>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <span class="opacity-75 d-flex align-items-center">
                            <i class="bi bi-plus-circle me-2"></i> Horas Extra
                        </span>
                        @if($task->extra_hours > 0)
                            <span class="badge bg-warning text-dark fs-6 px-2 py-1">+{{ $task->extra_hours }} h</span>
                        @else
                            <span class="fw-medium fs-5 text-white opacity-50">-</span>
                        @endif
                    </div>

                    <div class="mt-auto pt-3 bg-white bg-opacity-10 rounded-3 p-3 text-center border border-white border-opacity-25 shadow-sm">
                        <p class="small mb-1 text-white text-opacity-75 text-uppercase tracking-wider fw-semibold">Total Horas Trabajadas</p>
                        <h1 class="fw-bold mb-0 display-4">
                            {{ $task->total_hours }} <span class="fs-4 fw-normal opacity-75">h</span>
                        </h1>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
