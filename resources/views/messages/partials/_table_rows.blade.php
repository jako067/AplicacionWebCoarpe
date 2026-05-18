@forelse($messages as $message)
    <tr class="message-row" data-id="{{ $message->id }}">
        <td class="text-muted small ps-4">#{{ $message->id }}</td>

        <td>
            <div class="d-flex align-items-center gap-2">
                @if($type === 'inbox')
                    <span class="punto-lectura p-1 bg-primary border border-light rounded-circle d-inline-block" style="width: 8px; height: 8px;"></span>
                @endif
                <span class="text-dark small">
                    {{ $type === 'inbox' ? ($message->user->name ?? 'Sistema') : 'Yo (Enviado)' }}
                </span>
            </div>
        </td>

        <td class="text-dark small text-truncate" style="max-width: 220px;">
            {{ $message->subject }}
        </td>

        <td class="text-center">
            @if ($message->document)
                <a href="{{ asset('storage/' . $message->document) }}" target="_blank" class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 text-decoration-none px-2 py-1">
                    <i class="bi bi-paperclip"></i> Ver Archivo
                </a>
            @else
                <span class="text-muted small">-</span>
            @endif
        </td>

        <td class="text-muted small" style="font-size: 0.8rem;">
            {{ $message->created_at->format('d/m/Y') }}
        </td>

        <td class="text-end pe-4">
            <div class="d-flex justify-content-end gap-1">
                <a href="{{ route('messages.show', $message->id) }}" class="btn btn-sm btn-outline-secondary btn-view-message" data-id="{{ $message->id }}" title="Ver detalle">
                    <i class="bi bi-eye"></i>
                </a>
                @if($type === 'outbox')
                    <form action="{{ route('messages.destroy', $message->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que deseas eliminar este mensaje?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Borrar"><i class="bi bi-trash"></i></button>
                    </form>
                @endif
            </div>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="6" class="text-center py-5 text-muted">
            <i class="bi bi-inbox fs-2 d-block mb-2 opacity-50"></i>
            <p class="mb-0 small">No se encontraron registros en esta bandeja.</p>
        </td>
    </tr>
@endforelse
