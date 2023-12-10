import {
  alertError,
  alertInfo,
  alertSuccess,
  alertWarning,
} from "./alertas.js";

const updateInfo = async (campos, camposLabels, controller, email) => {
  console.log(campos, camposLabels, controller, email)
  // Inicializar un arreglo para almacenar los nombres de los campos vacíos
  let emptyFields = [];

  // Iterar sobre cada campo para verificar si está vacío, excluyendo el segundo nombre y el segundo apellido
  if (
    (campos.adm_nombre2 && campos.adm_apellido2) ||
    (campos.tec_nombre2 && campos.tec_apellido2)
  ) {
    campos.forEach((campo) => {
      if (
        campo !== "adm_nombre2" || campo !== "tec_nombre2" &&
        campo !== "adm_apellido2" || campo !== "tec_apellido2" &&
        document.getElementById(campo).value.trim() === ""
      ) {
        emptyFields.push(camposLabels[campo]); // Agregar el nombre legible del campo al arreglo
      }
    });
  }

  // Comprobar si hay campos vacíos y mostrar una alerta si es así
  if (emptyFields.length > 0) {
    alertWarning(
      `Los siguientes campos son obligatorios: ${emptyFields.join(", ")}`
    );
    return false; // Detener el envío del formulario
  }

  // Validar el formato del correo electrónico
  const correo = document.getElementById(email).value;
  console.log(correo);
  const correoValido = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if (!correo.match(correoValido)) {
    alertWarning("Ingrese un correo electrónico válido");
    return false; // Detener el envío del formulario
  }

  // Crear un objeto FormData y agregar los valores de los campos
  const datos = new FormData();
  campos.forEach((campo) => {
    datos.append(campo, document.getElementById(campo).value.trim());
  });
  datos.append("imagen", document.getElementById("UpdateImage").files[0]);

  // Enviar una solicitud POST al servidor para registrar al técnico
  const respuesta = await fetch(`?controller=${controller}&action=updateInfo`, {
    method: "POST",
    body: datos,
  });

  // Obtener la respuesta del servidor en formato JSON
  const info = await respuesta.json();

  // Mostrar un mensaje de éxito o error según la respuesta del servidor
  if (info.estado === 1) {
    alertSuccess("Se ha editado correctamente").then(() => {
      window.location.href = info.url; // Recargar la página
    });
  } else {
    alertError("No se pudo editar su información");
  }
};

export { updateInfo };
