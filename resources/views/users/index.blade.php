@foreach($users as $user)
    <p>{{ $user->name }}</p>

    <a href="{{ route('absences.index', $user->id) }}">
        {{ __('absences.see_absences') }}
    </a>

    <a href="{{ route('absences.create', $user->id) }}">
        {{ __('absences.add_absence') }}
    </a>
@endforeach
