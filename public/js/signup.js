document.addEventListener('DOMContentLoaded', function() {
    const usernameInput = document.getElementById('username');
    const emailInput = document.getElementById('email');

    //  Seleccionar el botón de registro de tu formulario para no dejar que la gente se loge si hay campos
    // que están mal en la BD porq  no puedn existir dos iguales
    const submitButton = document.querySelector('button[type="submit"]');

    // Capturamos el token de seguridad oculto
    const csrfToken = document.querySelector('input[name="_token"]').value;

    // Función que bloquea o desbloquea el botón según los
    function toggleSubmitButton() {
        // Buscamos cuántas casillas tienen la clase de error de Bootstrap
        const errorsCount = document.querySelectorAll('.is-invalid').length;

        // Si hay 1 o más errores, lo desactivamos. Si no, lo activamos.
        if (errorsCount > 0) {
            submitButton.disabled = true;
            submitButton.style.opacity = '0.75'; // Lo hacemos un poco transparente para que se note
            submitButton.style.cursor = 'not-allowed';
        } else {
            submitButton.disabled = false;
            submitButton.style.opacity = '1';
            submitButton.style.cursor = 'pointer';
        }
    }

    function checkExists(inputElement, fieldName) {
        const value = inputElement.value.trim();

        if (value === '') {
            inputElement.classList.remove('is-invalid');
            removeCustomError(inputElement);
            toggleSubmitButton(); // Comprobamos el botón si borran el texto
            return;
        }

        fetch('/check-user-data', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({
                field: fieldName,
                value: value
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.exists) {
                inputElement.classList.add('is-invalid');
                let mensaje = fieldName === 'username'
                    ? '❌ Este nombre de usuario ya está en uso.'
                    : '❌ Este correo electrónico ya está registrado.';
                showCustomError(inputElement, mensaje);
            } else {
                inputElement.classList.remove('is-invalid');
                removeCustomError(inputElement);
            }

            //  Después de poner o quitar el error, comprobamos el estado del botón
            toggleSubmitButton();
        })
        .catch(error => console.error('Error AJAX:', error));
    }

    function showCustomError(inputElement, message) {
        removeCustomError(inputElement);
        const errorDiv = document.createElement('div');
        errorDiv.className = 'invalid-feedback d-block js-error-message';
        errorDiv.innerText = message;
        inputElement.parentNode.insertBefore(errorDiv, inputElement.nextSibling);
    }

    function removeCustomError(inputElement) {
        const existingError = inputElement.parentNode.querySelector('.js-error-message');
        if (existingError) existingError.remove();
    }

    if(usernameInput) usernameInput.addEventListener('blur', function() { checkExists(this, 'username'); });
    if(emailInput) emailInput.addEventListener('blur', function() { checkExists(this, 'email'); });
});
