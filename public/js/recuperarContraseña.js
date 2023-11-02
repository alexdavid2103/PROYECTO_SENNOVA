// Importar las funciones de alerta desde el archivo "alertas"
import { alertWarning, alertSuccess, alertError } from "./alertas.js";
import { generarContrasena } from "./generadorContraseña.js";

// Obtener el elemento del formulario y los valores de ID y correo electrónico
const form = document.getElementById("form-recoverPassword");

// Definir los campos requeridos y sus descripciones legibles
const fields = ["id", "email"];
const fieldsRequired = {
  id: "numero de documento o NIT",
  email: "Correo electrónico",
};

// Agregar un evento de escucha para el envío del formulario
form.addEventListener("submit", async (event) => {
  event.preventDefault(); // Prevenir el comportamiento por defecto del formulario

  // Inicializar un arreglo para almacenar los nombres de los campos vacíos
  let emptyFields = [];
  const newPassword = generarContrasena();

  // Iterar sobre cada campo para verificar si está vacío, excluyendo el segundo nombre y el segundo apellido
  fields.forEach((field) => {
    if (document.getElementById(field).value.trim() === "") {
      emptyFields.push(fieldsRequired[field]); // Agregar el nombre legible del campo al arreglo
    }
  });
  
  // Comprobar si hay campos vacíos y mostrar una alerta si es así
  if (emptyFields.length > 0) {
    alertWarning(
      `Ingrese los siguientes datos: ${emptyFields.join(", ")}`
    );
    return false; // Detener el envío del formulario
  }

  // Validar el formato del correo electrónico
  const correoValido = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  const correo = document.getElementById("email").value;
  if (!correo.match(correoValido)) {
    alertWarning("Ingrese un correo electrónico válido");
    return false; // Detener el envío del formulario
  }

  try {
    // Realizar una solicitud fetch para recuperar los detalles del usuario
    let datos = new FormData();
    fields.forEach((field) => {
      datos.append(field, document.getElementById(field).value);
    });
    datos.append("password", newPassword);

    const respuesta = await fetch("?controller=main&action=recoverPassword", {
      method: "POST",
      body: datos,
    });

    const info = await respuesta.json();
    const { name, email } = info;

    // código para enviar la nueva contraseña con emailjs.
    const btn = document.getElementById("form-recoverPassword-btn");
    btn.value = "Enviando...";

    const serviceID = "default_service";
    const templateID = "template_winxwe9";

    // Crear un token de recuperación de contraseña aleatorio
    console.log(newPassword);

    const templateParams = {
      name: name,
      newPassword: newPassword,
      email: email,
    };

    // Enviar el correo electrónico utilizando emailjs
    emailjs.send(serviceID, templateID, templateParams).then(
      () => {
        btn.value = "Enviar";
        alertSuccess(
          `Se ha enviado un correo electrónico a ${email} para recuperar su contraseña`
        );
      },
      (err) => {
        btn.value = "Enviar";
        alertError(JSON.stringify(err));
      }
    );
  } catch (err) {
    // Capturar y manejar cualquier error que ocurra durante el proceso
    console.error(err);
  }
});
