// Importa las funciones de alerta desde el archivo "alertas.js"
import { alertSuccess, alertWarning, alertError } from "./alertas.js";

// Función para verificar si hay duplicados en un array
function hasDuplicates(array) {
  return new Set(array).size !== array.length;
}

// Función para limpiar y dividir el texto en un array
function cleanAndSplit(text) {
  return text.split(",").map((item) => item.trim());
}

// Obtén el formulario por su ID
const form = document.getElementById("form_add_ubimot");

// Agrega un listener al evento "submit" del formulario
form.addEventListener("submit", async (event) => {
  event.preventDefault(); // Evita el envío del formulario por defecto

  // Obtiene el valor del textarea y lo limpia de espacios en blanco
  const ubicacionMotor = document.getElementById("add_ubimot").value.trim();

  // Verifica si el campo está vacío
  if (ubicacionMotor === "") {
    alertWarning("Ingrese ubicaciones de motores válidas.");
    return;
  }

  // Expresión regular para validar el formato del texto ingresado
  const pattern = /^[a-zA-Z0-9, ]*$/;

  // Verifica si el texto cumple con el patrón establecido
  if (!pattern.test(ubicacionMotor)) {
    alertWarning("Ingrese solo texto y números sin caracteres especiales.");
    return;
  }

  // Limpia y divide el texto en un array
  let array_resultante = cleanAndSplit(ubicacionMotor);

  // Verifica si no se ingresaron ubicaciones
  if (array_resultante.length === 0) {
    alertWarning("No ha ingresado ninguna ubicación.");
    return;
  }

  // Verifica si hay ubicaciones duplicadas
  if (hasDuplicates(array_resultante)) {
    alertWarning("No pueden haber ubicaciones repetidas.");
    return;
  }

  const datos = new FormData();
  datos.append("array_resultante", JSON.stringify(array_resultante));

  try {
    // Enviar una solicitud POST al servidor para registrar al técnico
    const respuesta = await fetch("?controller=empresa&action=addUbicacionMotor", {
      method: "POST",
      body: datos,
    });

    // Obtener la respuesta del servidor en formato JSON
    const info = await respuesta.json();

    // Mostrar un mensaje de éxito o error según la respuesta del servidor
    if (info.estado === 1) {
      const plural = array_resultante.length > 1 ? "han registrado las ubicaciones" : "ha registrado la ubicación";
      const message = `Se ${plural} (${array_resultante.join(", ")}) correctamente.`;

      // Muestra la alerta de éxito con el mensaje correspondiente
      alertSuccess(message).then(() => {
        window.location.href = info.url;
      });
    } else {
      alertError("La ubicacion ya se encuentra registrada");
    }
  } catch (error) {
    console.error("Error al enviar la solicitud:", error);
    alertError("Ha ocurrido un error al enviar la solicitud al servidor.");
  }
});
