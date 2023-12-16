document.getElementById('myForm').addEventListener('submit', function(event) {
    // Obtén el valor de la contraseña
    var password = document.getElementById('inputPassword').value;
    // Verifica si la contraseña cumple con la longitud mínima (8 caracteres)
    if (password.length < 8) {
      // Si no cumple, evita que el formulario se envíe y muestra un mensaje de alerta
      event.preventDefault();
      alert('La contraseña debe tener al menos 8 caracteres.');
    }
    // Si cumple con la longitud mínima, el formulario se enviará normalmente
});

document.getElementById('myForm').addEventListener('submit', function(event) {
    // Obtén el valor de las contraseñas
    var password = document.getElementById('inputPassword').value;
    var confirmPassword = document.getElementById('inputPasswordConfirm').value;

    // Verifica si las contraseñas son iguales
    if (password !== confirmPassword) {
      // Si no son iguales, evita que el formulario se envíe y muestra un mensaje de alerta
      event.preventDefault();
      alert('Las contraseñas no coinciden. Por favor, inténtelo de nuevo.');
    }
    // Si las contraseñas son iguales, el formulario se enviará normalmente
});

document.getElementById('myForm').addEventListener('submit', function(event) {
    // Obtén el valor del correo electrónico
    var email = document.getElementById('inputEmail').value;

    // Verifica si el formato del correo electrónico es válido
    if (!isValidEmail(email)) {
      // Si no es válido, evita que el formulario se envíe y muestra un mensaje de alerta
      event.preventDefault();
      alert('Por favor, ingrese un correo electrónico válido.');
    }
    // Si el formato del correo electrónico es válido, el formulario se enviará normalmente
  });

  // Función para verificar el formato del correo electrónico
  function isValidEmail(email) {
    // Utiliza una expresión regular para verificar el formato del correo electrónico
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
  }