@extends('layout.layout')

@section('title', 'Trámites y Mensajes')

@section('content')
    <h2>Trámites y Mensajes</h2>

    {{-- APARTADO 1: Mensajes enviados al administrador --}}
    <h3>Mis Mensajes al Administrador</h3>

    <a href="{{ route('messages.create') }}">Enviar Nuevo Mensaje</a>
    <br><br>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Asunto</th>
                <th>Documento</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($messages as $message)
                <tr>
                    <td>{{ $message->id_message }}</td>
                    <td>{{ $message->subject }}</td>
                    <td>{{ $message->document ? 'Sí' : 'No' }}</td>
                    <td>{{ $message->created_at }}</td>
                    <td>
                        <a href="{{ route('messages.show', $message->id_message) }}">Ver Detalle</a> |
                        <a href="{{ route('messages.edit', $message->id_message) }}">Editar</a> |

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
@endsection
