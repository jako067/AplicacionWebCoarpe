@foreach($users as $user)
    <p>{{ $user->name }}</p>

    <a href="{{ route('absences.index', $user->id) }}">
        Ver faltas
    </a>

    <a href="{{ route('absences.create', $user->id) }}">
        Añadir falta
    </a>
@endforeach
