
    document.adEventListener("DOMContentLoaded", function() {
        const formContainer = document.querySelector('.form');
        const inputs = document.querySelectorAll('.form input, .form textarea, .form select');

        inputs.forEach(input => {
            input.addEventListener('input', () => {
                formContainer.classList.remove('animate'); // reset
                void formContainer.offsetWidth; // trigger ulang
                formContainer.classList.add('animate'); // animasi jalan
            });
        });
    });