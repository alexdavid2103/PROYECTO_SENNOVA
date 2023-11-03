// Importar las funciones de alerta desde el archivo "alertas"
import { alertWarning, alertSuccess, alertError } from "./alertas.js";
import { generarContrasena } from "./generadorContraseña.js";

// Obtener el elemento del formulario y los valores de ID y correo electrónico
const form = document.getElementById("form-recoverPassword");

// Agregar un evento de escucha para el envío del formulario
form.addEventListener("submit", async (event) => {
  event.preventDefault(); // Prevenir el comportamiento por defecto del formulario

  const newPassword = generarContrasena();

  // Validar el formato del correo electrónico
  const correoValido = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  const correo = document.getElementById("validEmail").value;
  if (!correo.match(correoValido)) {
    alertWarning("Ingrese un correo electrónico válido");
    return false; // Detener el envío del formulario
  }

  // Validar el ID de usuario
  const id = document.getElementById("validId").value;
  if (id === "") {
    alertWarning("Ingrese un ID de usuario válido");
    return false; // Detener el envío del formulario
  }

  try {
    // Realizar una solicitud fetch para recuperar los detalles del usuario
    let datos = new FormData();
    datos.append("id", id);
    datos.append("email", correo);
    datos.append("password", newPassword);
    // datos.append("password", newPassword);

    const respuesta = await fetch("?controller=main&action=rPassword", {
      method: "POST",
      body: datos,
    });

    const info = await respuesta.json();
    console.log(info);

    if (info.estado === 1) {
      const nombreUsuario = info.resultados.tec.tec_nombre1; // Reemplaza "tec" con el nombre de la clave correspondiente si es diferente
      const correoUsuario = info.resultados.tec.tec_correo; // Reemplaza "tec" con el nombre de la clave correspondiente si es diferente

      const btn = document.getElementById("form-recoverPassword-btn");
      btn.value = "Enviando...";

      const serviceID = "default_service";
      const templateID = "template_winxwe9";

      console.log(newPassword);

      const templateParams = {
        name: nombreUsuario,
        newPassword: newPassword,
        email: correoUsuario,
      };

      emailjs.send(serviceID, templateID, templateParams).then(
        () => {
          btn.value = "Enviar";
          alertSuccess(
            `Se ha enviado un correo electrónico a ${correoUsuario} con tu nueva contraseña`
          ).then(() => {
            window.location.href = info.url;
          });
        },
        (err) => {
          btn.value = "Enviar";
          alertError(JSON.stringify(err));
        }
      );
    } else {
      alertError(info.mensaje);
    }
  } catch (err) {
    // Capturar y manejar cualquier error que ocurra durante el proceso
    console.error(err);
  }
});
