<h2>Añadir falta a {{ $user->name }}</h2>

<form method="POST" action="{{ route('absences.store', $user) }}">
    @csrf

    <div>
        <label>Fecha</label>
        <input type="date" name="fecha" required>
    </div>

    <div>
        <label>Tipo</label>
        <input type="text" name="tipo" placeholder="Ej: ausencia, retraso">
    </div>

    <div>
        <label>Descripción</label>
        <textarea name="descripcion"></textarea>
    </div>

    <button type="submit">Guardar falta</button>
</form>
