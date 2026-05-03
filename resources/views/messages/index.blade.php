@extends('layout.layout')

@section('title', 'Trámites y Mensajes')

@section('content')
    <h2>Trámites y Mensajes</h2>

    <h3>Comunicaciones al Administrador</h3>

    <a href="{{ route('messages.create') }}">Enviar Nuevo Mensaje</a>
    <br><br>

    <table border="1">
        <thead>
            <tr>
                <th>Tipo</th>
                <th>Asunto</th>
                <th>Documento</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($messages as $message)
                <tr>
                    <td>{{ $message->type === 'justificante' ? 'Justificante de falta' : 'Aviso de imprevisto' }}</td>
                    <td>{{ $message->subject }}</td>
                    <td>{{ $message->document ? 'Sí' : 'No' }}</td>
                    <td>{{ $message->created_at }}</td>
                    <td>
                        <a href="{{ route('messages.show', $message->id_message) }}">Ver Detalle</a> |

                        <form action="{{ route('messages.destroy', $message->id_message) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Borrar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <hr>

    <h3>Notificaciones del Capataz</h3>

    <table border="1">
        <thead>
            <tr>
                <th>Título</th>
                <th>Mensaje</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notices as $notice)
                <tr>
                    <td>{{ $notice->subject }}</td>
                    <td>{{ $notice->body }}</td>
                    <td>{{ $notice->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
