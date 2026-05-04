<h2>{{ __('absences.heading_create', ['name' => $user->name]) }}</h2>

<form method="POST" action="{{ route('absences.store', $user) }}">
    @csrf

    <div>
        <label>{{ __('absences.label_date') }}</label>
        <input type="date" name="fecha" required>
    </div>

    <div>
        <label>{{ __('absences.label_type') }}</label>
        <input type="text" name="tipo" placeholder="{{ __('absences.placeholder_type') }}">
    </div>

    <div>
        <label>{{ __('absences.label_desc') }}</label>
        <textarea name="descripcion"></textarea>
    </div>

    <button type="submit">{{ __('absences.save_button') }}</button>
</form>
