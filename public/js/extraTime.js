document.addEventListener('DOMContentLoaded', function() {
    const entryInput = document.getElementById('entry_time');
    const exitInput = document.getElementById('exit_time');
    const breakInput = document.getElementById('break_minutes');
    const extraInput = document.getElementById('extra_hours');
    const totalBadge = document.getElementById('liveTotalHours');

    function calculateLiveHours() {
        if (!entryInput || !exitInput || !entryInput.value || !exitInput.value) {
            if (totalBadge) totalBadge.textContent = "0.00 h";
            return;
        }

        const dateRef = "1970-01-01 ";
        const entryDate = new Date(dateRef + entryInput.value);
        const exitDate = new Date(dateRef + exitInput.value);

        let diffMs = exitDate - entryDate;

        // Ajuste aritmético para jornadas que cruzan la medianoche (cambio de día)
        if (diffMs < 0) {
            diffMs += 24 * 60 * 60 * 1000;
        }

        const workedMinutes = diffMs / 1000 / 60;
        const breakMinutes = parseInt(breakInput.value) || 0;
        const extraHours = parseFloat(extraInput.value) || 0;

        // Ecuación de horas totales: ordinarias netas más extraordinarias
        let finalHours = ((workedMinutes - breakMinutes) / 60) + extraHours;

        if (finalHours < 0) finalHours = 0;

        if (totalBadge) {
            totalBadge.textContent = finalHours.toFixed(2) + " h";
        }
    }

    // Vinculación del manejador de eventos a los inputs del formulario
    [entryInput, exitInput, breakInput, extraInput].forEach(input => {
        if (input) input.addEventListener('input', calculateLiveHours);
    });
});
