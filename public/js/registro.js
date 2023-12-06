import {
  alertSuccess,
  alertWarning,
  alertError,
  advanceAlertWarning,
} from "./alertas.js";
// |================================== EMPRESAS ==================================| //
import { addEmpresa } from "./empresa.js";
// AGREGAR <----------------------------------------------------------------------|

// Asigna la función addEmpresa al evento submit del formulario
const form_add_empresa = document.getElementById("form_add_empresa"); // Obtiene el formulario de agregar empresa por su ID
form_add_empresa.addEventListener("submit", async (event) => {
  // Escucha el evento de envío del formulario
  event.preventDefault();
  addEmpresa();
});
