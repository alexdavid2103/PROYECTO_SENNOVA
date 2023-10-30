import { alertSuccess, alertWarning, alertError, alertInfo } from "./alertas.js";
// Función que se activa al enviar el formulario
document.getElementById("form_add_ubimot").onsubmit = () => {
  // Obtiene el valor del textarea con el ID "add_ubimot"
  const ubicacionMotor = document.getElementById("add_ubimot").value;

  // Verifica si el valor está en blanco o contiene solo espacios en blanco
  if (ubicacionMotor.trim() === "") {
    alertWarning("Ingrese ubicaciones de motores válidas.");
    return false; // Evita el envío del formulario
  }

  // Expresión regular para validar si el valor contiene solo letras, números, comas y espacios
  const pattern = /^[a-zA-Z0-9, ]*$/;

  // Comprueba si el valor no cumple con la expresión regular definida
  if (!pattern.test(ubicacionMotor)) {
    alertWarning("Ingrese solo texto y números sin caracteres especiales.");
    return false; // Evita el envío del formulario
  }

  // Divide la cadena en un array, elimina espacios en blanco y elimina elementos vacíos
  let array_resultante = ubicacionMotor
    .split(",")
    .map((item) => item.trim())
    .filter((item) => item !== "");

  // Verifica si el array resultante está vacío
  if (array_resultante.length === 0) {
    alertWarning("No ha ingresado ninguna ubicación.");
    return false; // Evita el envío del formulario
  }

  // Imprime el array resultante en la consola para fines de depuración
  alertInfo(array_resultante);
  // alertSuccess("Se han registrado correctamente")

  // Aquí puedes realizar operaciones adicionales con el array resultante si es necesario

  return false; // Evita el envío del formulario
};
