var fechaInput = document.getElementById("fecha");

// Crea un objeto de fecha actual
var fechaActual = new Date();

// Formatea la fecha actual en un formato que el campo de entrada pueda entender
var fechaFormateada = fechaActual.toISOString().slice(0, 16); // Recorta los segundos y la zona horaria

// Establece la fecha formateada como el valor predeterminado del campo de entrada
fechaInput.value = fechaFormateada;