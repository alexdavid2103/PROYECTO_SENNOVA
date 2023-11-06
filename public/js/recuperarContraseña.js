// Importar las funciones de alerta desde el archivo "alertas"
import { alertWarning, alertSuccess, alertError } from "./alertas.js";
import { generarContrasena } from "./generadorContraseña.js";

// Obtener el elemento del formulario y los valores de ID y correo electrónico
const form = document.getElementById("form-recoverPassword");

// Agregar un evento de escucha para el envío del formulario
form.addEventListener("submit", async (event) => {
  event.preventDefault(); // Prevenir el comportamiento por defecto del formulario

  // Generar una nueva contraseña
  const newPassword = generarContrasena();

  // Validar el formato del correo electrónico
  const correoValido = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  const correo = document.getElementById("validEmail").value;
  if (!correo.match(correoValido)) {
    // Mostrar una alerta de advertencia si el correo electrónico no tiene un formato válido
    alertWarning("Ingrese un correo electrónico válido");
    return false; // Detener el envío del formulario
  }

  // Validar el ID de usuario
  const id = document.getElementById("validId").value;
  if (id === "") {
    // Mostrar una alerta de advertencia si el ID de usuario está vacío
    alertWarning("Ingrese un ID de usuario válido");
    return false; // Detener el envío del formulario
  }

  try {
    // Realizar una solicitud fetch para recuperar los detalles del usuario
    let datos = new FormData();
    datos.append("id", id);
    datos.append("email", correo);

    const respuesta = await fetch("?controller=main&action=rPassword", {
      method: "POST",
      body: datos,
    });

    // Obtener la respuesta en formato JSON
    const info = await respuesta.json();
    console.log(info);

    if (info.estado === 1) {
      // Obtener el primer rol disponible dinámicamente
      const primerRol = Object.keys(info.resultados)[0];
      const userName = primerRol === "emp" ? `${primerRol}_nombre` : `${primerRol}_nombre1` ;
      // Obtener el nombre de usuario y el correo electrónico utilizando el primer rol
      const nombreUsuario = info.resultados[primerRol][userName];
      const correoUsuario = info.resultados[primerRol][`${primerRol}_correo`];

      const btn = document.getElementById("form-recoverPassword-btn");
      btn.value = "Enviando...";

      // Configurar los parámetros del servicio de correo
      const serviceID = "default_service";
      const templateID = "template_winxwe9";

      // Mostrar información relevante en la consola
      console.log(`Rol: ${primerRol}`);
      console.log(`Nombre: ${nombreUsuario}, correo: ${correoUsuario}`);
      console.log(newPassword);

      // Configurar los parámetros del correo electrónico
      const templateParams = {
        name: nombreUsuario,
        newPassword: newPassword,
        email: correoUsuario,
      };

      // Enviar el correo electrónico utilizando la API de emailjs
      emailjs.send(serviceID, templateID, templateParams).then(
        () => {
          // Restaurar el valor del botón y mostrar una alerta de éxito
          btn.value = "Enviar";
          alertSuccess(
            `Se ha enviado un correo electrónico a ${correoUsuario} con tu nueva contraseña`
          ).then(() => {
            // Redirigir al usuario a la URL especificada en la respuesta
            window.location.href = info.url;
          });
        },
        (err) => {
          // Restaurar el valor del botón y mostrar un mensaje de error en caso de fallo en el envío del correo
          btn.value = "Enviar";
          alertError(JSON.stringify(err));
        }
      );
    } else {
      // Mostrar un mensaje de error si el estado no es 1
      alertError(info.mensaje);
    }
  } catch (err) {
    // Capturar y manejar cualquier error que ocurra durante el proceso
    console.error(err);
  }
});
