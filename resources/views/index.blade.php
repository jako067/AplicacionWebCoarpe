@extends('layout.layout')

@section('title', __('coarpe.home'))

@section('content')
<div class="container-fluid max-w-4xl">

    {{-- ====================================================================== --}}
    {{-- VISTA PARA USUARIOS LOGEADOS (CENTRO DE OPERACIONES Y PROTOCOLO)       --}}
    {{-- ====================================================================== --}}
    @auth
    <div class="card border-0 shadow-sm p-4 mb-4 bg-white rounded-3">
        <div class="d-flex flex-column flex-md-row align-items-center gap-3 text-center text-md-start">
            <div class="icon-circle-md bg-icon-green-soft rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 text-verde-oscuro" style="width: 60px; height: 60px;">
                <i class="bi bi-person-badge fs-3"></i>
            </div>
            <div>
                <h2 class="fw-bold text-dark mb-1">{{ __('coarpe.operational_panel') }}</h2>
                <p class="text-muted mb-0">
                    {{ __('coarpe.user_label') }} <strong class="text-dark">{{ Auth::user()->name }}</strong> &bull;
                    {{ __('coarpe.role_label') }} <span class="text-verde-oscuro fw-bold">{{ Auth::user()->isAdmin() ? __('coarpe.admin') : (Auth::user()->rol === 'foreman' ? __('coarpe.foreman') : __('coarpe.worker')) }}</span>
                </p>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm p-4 mb-4 rounded-3">
        <h5 class="fw-bold text-dark mb-3">
            <i class="bi bi-clipboard-check text-verde-oscuro me-2"></i>{{ __('coarpe.mandatory_protocol') }}
        </h5>
        <p class="text-secondary small mb-3" style="line-height: 1.6;">
            {{ __('coarpe.protocol_intro') }}
        </p>
        <ul class="list-group list-group-flush small mb-0">
            <li class="list-group-item px-0 py-2 bg-transparent text-secondary">
                <i class="bi bi-1-circle-fill text-verde-oscuro me-2"></i><strong>{{ __('coarpe.shift_opening') }}</strong> {{ __('coarpe.shift_opening_desc') }}
            </li>
            <li class="list-group-item px-0 py-2 bg-transparent text-secondary">
                <i class="bi bi-2-circle-fill text-verde-oscuro me-2"></i><strong>{{ __('coarpe.production_record') }}</strong> {{ __('coarpe.production_record_desc') }}
            </li>
            <li class="list-group-item px-0 py-2 bg-transparent text-secondary">
                <i class="bi bi-3-circle-fill text-verde-oscuro me-2"></i><strong>{{ __('coarpe.cost_control') }}</strong> {{ __('coarpe.cost_control_desc') }}
            </li>
        </ul>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-7">
            <div class="card border-0 shadow-sm p-4 rounded-3 h-100">
                <h5 class="fw-bold text-dark mb-2" style="font-size: 1rem;"><i class="bi bi-arrow-left-right text-primary me-2"></i>{{ __('coarpe.system_data_integration') }}</h5>
                <p class="text-muted small mb-0" style="line-height: 1.6;">
                    {{ __('coarpe.erp_connection_desc') }}
                </p>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card border-0 shadow-sm p-4 rounded-3 h-100 bg-warning bg-opacity-10 border border-warning border-opacity-25">
                <h5 class="fw-bold text-warning-emphasis mb-2" style="font-size: 1rem;"><i class="bi bi-shield-fill-exclamation me-2"></i>{{ __('coarpe.health_and_safety') }}</h5>
                <p class="text-warning-emphasis small mb-0" style="line-height: 1.6;">
                    {{ __('coarpe.safety_desc') }}
                </p>
            </div>
        </div>
    </div>

    <h5 class="fw-bold text-secondary text-uppercase tracking-wider small mb-3"><i class="bi bi-wrench-adjustable me-2"></i>{{ __('coarpe.available_management_tools') }}</h5>

    <div class="row g-3 mb-4">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm p-3 hover-bg-light transition-all cursor-pointer rounded-3" onclick="window.location='{{ route('daily_work.index') }}'">
                <div class="d-flex align-items-center gap-3">
                    <div class="p-2 bg-primary bg-opacity-10 text-primary rounded-3">
                        <i class="bi bi-journal-check fs-4"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold text-dark mb-0" style="font-size: 0.9rem;">{{ __('coarpe.go_to_daily_work') }}</h6>
                        <small class="text-muted">{{ __('coarpe.daily_work_tool_desc') }}</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card border-0 shadow-sm p-3 hover-bg-light transition-all cursor-pointer rounded-3" onclick="window.location='{{ route('budgets.index') }}'">
                <div class="d-flex align-items-center gap-3">
                    <div class="p-2 bg-success bg-opacity-10 text-success rounded-3">
                        <i class="bi bi-calculator fs-4"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold text-dark mb-0" style="font-size: 0.9rem;">{{ __('coarpe.go_to_budgets') }}</h6>
                        <small class="text-muted">{{ __('coarpe.budgets_tool_desc') }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endauth


    {{-- ====================================================================== --}}
    {{-- VISTA PARA USUARIOS INVITADOS / NO LOGEADOS (LANDING CORPORATIVA)      --}}
    {{-- ====================================================================== --}}
    @guest
    <div class="card border-0 shadow-sm p-5 text-center bg-white rounded-3 mb-4 border-bottom border-4 border-success" style="border-bottom-color: var(--color-verde-oscuro) !important;">
        <div class="mb-3">
            <i class="bi bi-cone-striped text-verde-oscuro" style="font-size: 3.5rem;"></i>
        </div>
        <h1 class="fw-extrabold text-dark display-6 mb-2">COARPE S.A.</h1>
        <p class="text-muted mx-auto max-w-xl lead fs-6">
            {{ __('coarpe.portal_description') }}
        </p>
        <div class="d-flex justify-content-center gap-3 mt-4">
            <a href="/login" class="btn btn-verde-oscuro px-4 py-2 fw-semibold shadow-sm rounded-3">
                <i class="bi bi-box-arrow-in-right me-2"></i>{{ __('coarpe.access_portal') }}
            </a>
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm p-4 rounded-3">
                <h5 class="fw-bold text-dark mb-3"><i class="bi bi-building-fill text-verde-oscuro me-2"></i>{{ __('coarpe.about_our_company') }}</h5>
                <p class="text-secondary small mb-0" style="line-height: 1.7;">
                    {{ __('coarpe.company_description') }}
                </p>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card border-0 shadow-sm p-3 text-center rounded-3 bg-light bg-opacity-50">
                <h3 class="fw-bold text-verde-oscuro mb-0">+150</h3>
                <small class="text-muted fw-semibold text-uppercase tracking-wider" style="font-size: 0.7rem;">{{ __('coarpe.completed_projects') }}</small>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card border-0 shadow-sm p-3 text-center rounded-3 bg-light bg-opacity-50">
                <h3 class="fw-bold text-verde-oscuro mb-0">100%</h3>
                <small class="text-muted fw-semibold text-uppercase tracking-wider" style="font-size: 0.7rem;">{{ __('coarpe.road_and_labor_safety') }}</small>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card border-0 shadow-sm p-3 text-center rounded-3 bg-light bg-opacity-50">
                <h3 class="fw-bold text-verde-oscuro mb-0">25+</h3>
                <small class="text-muted fw-semibold text-uppercase tracking-wider" style="font-size: 0.7rem;">{{ __('coarpe.heavy_machinery') }}</small>
            </div>
        </div>
    </div>
    @endguest

</div>
@endsection
