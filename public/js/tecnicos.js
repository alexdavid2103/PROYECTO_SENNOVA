import { alertWarning, alertSuccess, alertError } from "./alertas.js";

// |================================== TECNICOS ==================================| //

// AGREGAR <----------------------------------------------------------------------|

// Obtener el formulario por su ID
const form_add_tecnico = document.getElementById("form_add_tecnico");

// Agregar un evento 'submit' al formulario
form_add_tecnico.addEventListener("submit", async (event) => {
  event.preventDefault(); // Prevenir el comportamiento predeterminado del formulario al enviar

  // Definir los identificadores de los campos y sus etiquetas legibles por humanos
  const campos = [
    "add_tec_id",
    "add_tec_nombre1",
    "add_tec_nombre2",
    "add_tec_apellido1",
    "add_tec_apellido2",
    "add_tec_correo",
    "add_tec_telefono",
    "add_tec_direccion",
    "add_tec_empresa",
  ];

  const camposLabels = {
    add_tec_id: "numero de documento",
    add_tec_nombre1: "Primer nombre",
    add_tec_nombre2: "Segundo nombre",
    add_tec_apellido1: "Primer apellido",
    add_tec_apellido2: "Segundo apellido",
    add_tec_correo: "Correo",
    add_tec_telefono: "Teléfono",
    add_tec_direccion: "Dirección",
    add_tec_empresa: "Empresa",
  };

  // Inicializar un arreglo para almacenar los nombres de los campos vacíos
  let emptyFields = [];

  // Iterar sobre cada campo para verificar si está vacío, excluyendo el segundo nombre y el segundo apellido
  campos.forEach((campo) => {
    if (
      campo !== "add_tec_nombre2" &&
      campo !== "add_tec_apellido2" &&
      document.getElementById(campo).value.trim() === ""
    ) {
      emptyFields.push(camposLabels[campo]); // Agregar el nombre legible del campo al arreglo
    }
  });

  // Comprobar si hay campos vacíos y mostrar una alerta si es así
  if (emptyFields.length > 0) { 
    alertWarning(
      `Los siguientes campos son obligatorios: ${emptyFields.join(", ")}`
    );
    return false; // Detener el envío del formulario
  }

  // Validar el formato del correo electrónico
  const correoValido = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  const correo = document.getElementById("add_tec_correo").value;
  if (!correo.match(correoValido)) {
    alertWarning("Ingrese un correo electrónico válido");
    return false; // Detener el envío del formulario
  }

  // Crear un objeto FormData y agregar los valores de los campos
  const datos = new FormData();
  campos.forEach((campo) => {
    datos.append(campo, document.getElementById(campo).value);
  });

  // Enviar una solicitud POST al servidor para registrar al técnico
  const respuesta = await fetch("?controller=tecnico&action=add", {
    method: "POST",
    body: datos,
  });

  // Obtener la respuesta del servidor en formato JSON
  const info = await respuesta.json();

  // Mostrar un mensaje de éxito o error según la respuesta del servidor
  if (info.estado === 1) {
    alertSuccess("Se ha registrado correctamente").then(() => {
      window.location.reload(); // Recargar la página
    });
  } else {
    alertError("El técnico ya se encuentra registrado");
  }
});
