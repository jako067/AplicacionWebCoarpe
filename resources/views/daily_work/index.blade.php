@extends('layout.layout')

@section('title', __('Trabajo Diario'))

@section('content')
    <div class="container mt-5">
        <div class="card shadow-sm p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">{{ __('Lista de Daily Work') }}</h2>
                <a href="{{ route('daily_work.create') }}" class="btn btn-primary">{{ __('Agregar Registro') }}</a>
            </div>
            <form method="GET" action="{{ route('daily_work.index') }}" class="mb-4">

                <div class="row g-2">

                    <div class="col-md-4">
                        <select name="group_id" class="form-control">
                            <option value="">{{ __('Todos los grupos') }}</option>
                            @foreach ($groups as $group)
                                <option value="{{ $group->id }}"
                                    {{ request('group_id') == $group->id ? 'selected' : '' }}>
                                    {{ $group->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <input type="date" name="date" class="form-control" value="{{ request('date') }}">
                    </div>

                    <div class="col-md-4 d-flex gap-2">
                        <button class="btn btn-primary w-100">{{ __('Filtrar') }}</button>

                        <a href="{{ route('daily_work.index') }}" class="btn btn-outline-secondary w-100">
                            Reset
                        </a>
                    </div>

                </div>

            </form>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>{{ __('Grupo') }}</th>
                            <th>{{ __('Reporte') }}</th>
                            <th>{{ __('Fecha') }}</th>
                            <th>{{ __('Evaluación') }}</th>
                            <th>{{ __('Incidencias') }}</th>
                            <th>{{ __('Acciones') }}</th>
                        </tr>
                    </thead>

                    <tbody id="daily-work-table">
                        @forelse($dailyWorks as $dailyWork)
                            <tr onclick="window.location='{{ route('daily_work.show', $dailyWork->id) }}'"
                                style="cursor:pointer;">
                                <td>{{ $dailyWork->group->name ?? __('Sin grupo') }}</td>
                                <td>
                                    {{ \Illuminate\Support\Str::limit($dailyWork->reporte, 40) }}
                                </td>
                                <td>{{ \Carbon\Carbon::parse($dailyWork->date)->format('d/m/Y') }}</td>
                                <td>{{ $dailyWork->evaluation }}</td>
                                <td>
                                    {{ \Illuminate\Support\Str::limit($dailyWork->incidences, 40) }}
                                </td>

                                <td class="d-flex gap-2">
                                    <a href="{{ route('daily_work.edit', $dailyWork->id) }}"
                                        class="btn btn-sm btn-warning">
                                        {{ __('Editar') }}
                                    </a>

                                    <form action="{{ route('daily_work.destroy', $dailyWork->id) }}" method="POST"
                                        onsubmit="return confirm('{{ __('¿Seguro que quieres eliminar este registro?') }}')">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-sm btn-danger">
                                            {{ __('Borrar') }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">
                                    {{ __('No hay registros aún') }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
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
                    table.innerHTML += `
<tr>
    <td>${item.group ? item.group.name : '{{ __('Sin grupo') }}'}</td>
    <td>${item.reporte.substring(0, 40)}</td>
    <td>${item.date}</td>
    <td>${item.evaluation}</td>
    <td>${item.incidences.substring(0, 40)}</td>

    <td class="d-flex gap-2">
        <a href="/daily_work/${item.id}/edit" class="btn btn-sm btn-warning">
            {{ __('Editar') }}
        </a>

        <form method="POST"
              action="/daily_work/${item.id}"
              onsubmit="return confirm('{{ __('¿Seguro que quieres eliminar este registro?') }}')">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="DELETE">

            <button class="btn btn-sm btn-danger">
                {{ __('Borrar') }}
            </button>
        </form>
    </td>
</tr>
`;
                });

                loading = false;
            }
        });
    </script>

@endsection
