document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('contactForm');
    const errorMessage = document.getElementById('error-message');

    form.addEventListener('submit', function (e) {
        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const message = document.getElementById('message').value.trim();

        if (!name || !email || !message) {
            e.preventDefault(); // Stop form from submitting
            errorMessage.style.display = 'block';
        } else {
            errorMessage.style.display = 'none';
            alert('Message sent successfully!');
        }
    });
});
