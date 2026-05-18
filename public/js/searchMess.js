document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const userSearchInput = document.getElementById('userSearchInput');
    const sortSelect = document.getElementById('sortSelect');
    const tableBody = document.getElementById('table-body');
    const typeToggle = document.getElementById('typeToggle');
    const toggleLabel = document.getElementById('toggleLabel');

    // Comprueba el localStorage y aplica los estilos de leído/no leído
    function aplicarEstilosLectura() {
        const currentType = (typeToggle && typeToggle.checked) ? 'outbox' : 'inbox';

        document.querySelectorAll('.message-row').forEach(row => {
            const messageId = row.getAttribute('data-id');

            // Los mensajes enviados por uno mismo nunca se marcan como "no leídos"
            if (currentType === 'outbox') {
                row.classList.remove('bg-primary', 'bg-opacity-10', 'fw-bold');
                return;
            }

            // Si ya existe en el navegador, quitamos el resaltado. Si no, lo añadimos.
            if (localStorage.getItem('msg_leido_' + messageId)) {
                row.classList.remove('bg-primary', 'bg-opacity-10', 'fw-bold');
                const punto = row.querySelector('.punto-lectura');
                if (punto) punto.remove();
            } else {
                row.classList.add('bg-primary', 'bg-opacity-10', 'fw-bold');
            }
        });
    }

    function fetchFilteredMessages() {
        const search = searchInput ? searchInput.value : '';
        const userSearch = userSearchInput ? userSearchInput.value : '';
        const sort = sortSelect ? sortSelect.value : 'desc';
        const currentType = (typeToggle && typeToggle.checked) ? 'outbox' : 'inbox';

        const url = `/messages-filter?type=${currentType}&search=${encodeURIComponent(search)}&user_search=${encodeURIComponent(userSearch)}&sort=${sort}`;

        fetch(url)
            .then(response => response.text())
            .then(html => {
                tableBody.innerHTML = html;
                aplicarEstilosLectura(); // Reaplicamos estilos tras la carga AJAX
            })
            .catch(error => console.error('Error AJAX:', error));
    }

    // Captura el clic en el botón "Ver" para marcarlo como leído al instante
    document.addEventListener('click', function(e) {
        const viewBtn = e.target.closest('.btn-view-message');
        if (viewBtn) {
            const messageId = viewBtn.getAttribute('data-id');
            localStorage.setItem('msg_leido_' + messageId, 'true');
        }
    });

    if(typeToggle) {
        typeToggle.addEventListener('change', function() {
            if (this.checked) {
                toggleLabel.innerHTML = '<i class="bi bi-box-arrow-up text-success"></i> Mensajes Enviados';
            } else {
                toggleLabel.innerHTML = '<i class="bi bi-box-arrow-in-down text-primary"></i> Bandeja de Entrada';
            }
            fetchFilteredMessages();
        });
    }

    if(searchInput) searchInput.addEventListener('input', fetchFilteredMessages);
    if(userSearchInput) userSearchInput.addEventListener('input', fetchFilteredMessages);
    if(sortSelect) sortSelect.addEventListener('change', fetchFilteredMessages);

    // Ejecución inicial al cargar la página
    aplicarEstilosLectura();
});
