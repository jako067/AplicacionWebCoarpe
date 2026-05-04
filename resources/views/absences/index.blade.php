<h2>{{ __('absences.heading', ['name' => $user->name]) }}</h2>

@foreach($absences as $absence)
    <p>{{ $absence->fecha }} - {{ $absence->tipo }}</p>
@endforeach
