const form = document.getElementById('registerForm');

if (form) {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  const phoneRegex = /^[0-9+\-\s]{7,15}$/;

  form.addEventListener('submit', function (e) {
    let valid = true;

    form.querySelectorAll('.error-msg').forEach(function (s) { s.textContent = ''; });

    function showError(fieldName, message) {
      const field = form.elements[fieldName];
      field.nextElementSibling.textContent = message;
      valid = false;
    }

    if (form.elements['full_name'].value.trim() === '') showError('full_name', 'Name is required');
    if (!emailRegex.test(form.elements['email'].value)) showError('email', 'Enter a valid email');
    if (form.elements['password'].value.length < 6) showError('password', 'At least 6 characters');
    if (form.elements['country'].value === '') showError('country', 'Choose a country');
    if (form.elements['city'].value.trim() === '') showError('city', 'City is required');
    if (!phoneRegex.test(form.elements['contact'].value)) showError('contact', 'Enter a valid phone number');

    if (!valid) {
      e.preventDefault();
      return;
    }

    const btn = form.querySelector('button[type="submit"]');
    btn.disabled = true;
    btn.textContent = 'Registering...';
  });
}