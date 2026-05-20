@extends('layout.layout')

@section('title', __('Trabajo Diario'))

@section('content')
<div class="container-fluid max-w-4xl">

    <div class="card border-0 shadow-sm p-4 mb-4">
        <h2 class="fw-bold mb-1 text-dark">{{ __('Trabajo Diario') }}</h2>
        <p class="text-muted mb-4">{{ __('Historial de producción diaria, evaluaciones de rendimiento y gestión de incidencias.') }}</p>

        <div class="d-flex justify-content-end mb-4">
            <a href="{{ route('daily_work.create') }}" class="btn btn-verde-oscuro fw-semibold shadow-sm rounded-3 px-4 py-2">
                <i class="bi bi-plus-lg me-2"></i> {{ __('Agregar Registro') }}
            </a>
        </div>

        <form method="GET" action="{{ route('daily_work.index') }}" class="mb-4 bg-light p-3 border rounded-3 shadow-sm">
            <div class="row g-3 align-items-end">

                <div class="col-md-4">
                    <label class="form-label text-muted fw-semibold small mb-1">{{ __('Filtrar por Cuadrilla') }}</label>
                    <select name="group_id" class="form-select border-secondary border-opacity-25 shadow-sm">
                        <option value="">{{ __('Todos los grupos') }}</option>
                        @foreach ($groups as $group)
                            <option value="{{ $group->id }}" {{ request('group_id') == $group->id ? 'selected' : '' }}>
                                {{ $group->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label text-muted fw-semibold small mb-1">{{ __('Filtrar por Fecha') }}</label>
                    <input type="date" name="date" class="form-select border-secondary border-opacity-25 shadow-sm" value="{{ request('date') }}">
                </div>

                <div class="col-md-4 d-flex gap-2">
                    <button class="btn btn-verde-oscuro w-100 shadow-sm">
                        <i class="bi bi-filter me-1"></i> {{ __('Filtrar') }}
                    </button>
                    <a href="{{ route('daily_work.index') }}" class="btn btn-outline-secondary w-100 shadow-sm">
                        <i class="bi bi-arrow-counterclockwise me-1"></i> Reset
                    </a>
                </div>

            </div>
        </form>

        <div class="border rounded-3 overflow-hidden shadow-sm bg-white">
            <div class="bg-light border-bottom p-3 d-flex justify-content-between align-items-center">
                <span class="text-dark fw-medium"><i class="bi bi-journal-text me-2 text-verde-oscuro"></i> {{ __('Registros de Producción') }}</span>
                <span class="badge bg-secondary rounded-pill">{{ $dailyWorks->count() }} {{ __('visibles') }}</span>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="text-muted small fw-semibold ps-3">{{ __('Grupo') }}</th>
                            <th class="text-muted small fw-semibold">{{ __('Reporte') }}</th>
                            <th class="text-muted small fw-semibold">{{ __('Fecha') }}</th>
                            <th class="text-muted small fw-semibold text-center">{{ __('Evaluación') }}</th>
                            <th class="text-muted small fw-semibold">{{ __('Incidencias') }}</th>
                            <th class="text-muted small fw-semibold text-end pe-3">{{ __('Acciones') }}</th>
                        </tr>
                    </thead>

                    <tbody id="daily-work-table">
                        @forelse($dailyWorks as $dailyWork)
                            <tr onclick="window.location='{{ route('daily_work.show', $dailyWork->id) }}'" style="cursor:pointer;" class="transition-all hover-bg-light">
                                <td class="ps-3 fw-bold text-dark">
                                    <i class="bi bi-building me-1 text-secondary"></i> {{ $dailyWork->group->name ?? __('Sin grupo') }}
                                </td>
                                <td class="text-muted">
                                    {{ \Illuminate\Support\Str::limit($dailyWork->reporte, 40) }}
                                </td>
                                <td class="text-secondary small">
                                    <i class="bi bi-calendar3 me-1"></i> {{ \Carbon\Carbon::parse($dailyWork->date)->format('d/m/Y') }}
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-10 px-2 py-1">
                                        {{ $dailyWork->evaluation ?? '-' }}
                                    </span>
                                </td>
                                <td class="text-danger small">
                                    {{ \Illuminate\Support\Str::limit($dailyWork->incidences, 40) ?: __('Ninguna') }}
                                </td>
                                <td class="text-end pe-3" onclick="event.stopPropagation();">
                                    <div class="d-flex gap-2 justify-content-end">
                                        <a href="{{ route('daily_work.edit', $dailyWork->id) }}" class="btn btn-sm btn-outline-primary" title="{{ __('Editar') }}">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('daily_work.destroy', $dailyWork->id) }}" method="POST" class="d-inline" onsubmit="return confirm('{{ __('¿Seguro que quieres eliminar este registro?') }}')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger" title="{{ __('Borrar') }}">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">
                                    <i class="bi bi-folder2-open fs-1 d-block mb-2 opacity-50"></i>
                                    {{ __('No hay registros aún') }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<script>
    let page = 1;
    let loading = false;

    window.addEventListener('scroll', async () => {
        if (loading) return;

        if (window.innerHeight + window.scrollY >= document.body.offsetHeight - 200) {
            loading = true;
            page++;

            const res = await fetch(`/daily-work/fetch?page=${page}`);
            const data = await res.json();

            if (data.data.length === 0) return;

            const table = document.getElementById('daily-work-table');

            data.data.forEach(item => {
                const groupName = item.group ? item.group.name : '{{ __('Sin grupo') }}';
                const shortReporte = item.reporte ? (item.reporte.length > 40 ? item.reporte.substring(0, 40) + '...' : item.reporte) : '';
                const shortIncidences = item.incidences ? (item.incidences.length > 40 ? item.incidences.substring(0, 40) + '...' : item.incidences) : '{{ __('Ninguna') }}';
                const evaluation = item.evaluation ? item.evaluation : '-';

                table.innerHTML += `
<tr onclick="window.location='/daily_work/${item.id}'" style="cursor:pointer;" class="transition-all hover-bg-light">
    <td class="ps-3 fw-bold text-dark">
        <i class="bi bi-building me-1 text-secondary"></i> ${groupName}
    </td>
    <td class="text-muted">${shortReporte}</td>
    <td class="text-secondary small">
        <i class="bi bi-calendar3 me-1"></i> ${item.date}
    </td>
    <td class="text-center">
        <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-10 px-2 py-1">
            ${evaluation}
        </span>
    </td>
    <td class="text-danger small">${shortIncidences}</td>
    <td class="text-end pe-3" onclick="event.stopPropagation();">
        <div class="d-flex gap-2 justify-content-end">
            <a href="/daily_work/${item.id}/edit" class="btn btn-sm btn-outline-primary" title="{{ __('Editar') }}">
                <i class="bi bi-pencil"></i>
            </a>
            <form method="POST" action="/daily_work/${item.id}" class="d-inline" onsubmit="return confirm('{{ __('¿Seguro que quieres eliminar este registro?') }}')">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="DELETE">
                <button class="btn btn-sm btn-outline-danger" title="{{ __('Borrar') }}">
                    <i class="bi bi-trash"></i>
                </button>
            </form>
        </div>
    </td>
</tr>
`;
            });

            loading = false;
        }
    });
</script>
@endsection
