// Importar funciones de alerta desde el archivo alertas.js
import { alertSuccess, alertError, alertWarning } from "./alertas.js";

// Seleccionar todos los botones de alternar contraseña
const toggleBtns = document.querySelectorAll("#pass-toggle-btn");

// Para cada botón, agregar un evento de clic
toggleBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    // Obtener el campo de contraseña asociado al botón
    const passwordInput = btn.previousElementSibling;

    // Alternar entre mostrar y ocultar la contraseña
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      btn.classList.remove("fa-eye");
      btn.classList.add("fa-eye-slash");
    } else {
      passwordInput.type = "password";
      btn.classList.remove("fa-eye-slash");
      btn.classList.add("fa-eye");
    }
  });
});

// Función para validar la fortaleza de la contraseña
const validPassword = (contrasena) => {
  const patron = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?!.*\s).{7,}$/;
  return patron.test(contrasena);
};

// Obtener el formulario de actualización de contraseña por su ID
const formUpdatePassword = document.getElementById("form-update-password");

// Agregar un evento de envío al formulario
formUpdatePassword.addEventListener("submit", async (event) => {
  event.preventDefault(); // Evitar el comportamiento predeterminado del formulario

  // Obtener los valores de los campos de contraseña del formulario
  const currentPassword = document.getElementById("currentPassword").value;
  const newPassword = document.getElementById("newPassword").value;
  const confirmNewPassword =
    document.getElementById("confirmNewPassword").value;

  // Verificar si alguno de los campos está vacío
  if (!currentPassword || !newPassword || !confirmNewPassword) {
    alertWarning("Por favor, completa todos los campos.");
    return;
  }

  // Validar la fortaleza de la nueva contraseña y su coincidencia
  if (!validPassword(newPassword)) {
    alertWarning(
      "La contraseña debe cumplir los siguientes requisitos: tener al menos una letra mayúscula, una letra minúscula, un carácter numérico, no contener espacios en blanco y tener al menos 7 caracteres. Asegúrate de que las contraseñas coincidan."
    );
    return;
  }

  if (newPassword !== confirmNewPassword) {
    alertError("las contaseñas no coinciden");
  }

  // Crear un objeto FormData para enviar los datos del formulario
  const datos = new FormData();
  datos.append("currentPassword", currentPassword);
  datos.append("newPassword", newPassword);

  try {
    // Enviar la solicitud de actualización de contraseña usando fetch
    const respuesta = await fetch("?controller=main&action=updatePassword", {
      method: "POST",
      body: datos,
    });

    // Obtener la respuesta del servidor en formato JSON
    const info = await respuesta.json();

    // Verificar el estado de la respuesta
    if (info.estado === 1) {
      // Mostrar una alerta de éxito y redirigir a una URL específica
      alertSuccess("Se ha editado correctamente").then(() => {
        window.location.href = info.url;
      });
    } else {
      // Mostrar una alerta de error en caso de problemas al editar
      alertError("Error al editar");
    }
  } catch (error) {
    // Mostrar una alerta si ocurre un error durante la solicitud
    alertError("Ha ocurrido un error en la solicitud");
  }
});
