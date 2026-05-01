<h2>Faltas de {{ $user->name }}</h2>

@foreach($absences as $absence)
    <p>{{ $absence->fecha }} - {{ $absence->tipo }}</p>
@endforeach
