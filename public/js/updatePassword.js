import { alertSuccess, alertError, alertWarning } from "./alertas.js";
const toggleBtns = document.querySelectorAll("#pass-toggle-btn");

toggleBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    const passwordInput = btn.previousElementSibling;

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


const validPassword = (contrasena) => {
  const patron = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?!.*\s).{7,}$/;
  return patron.test(contrasena);
};
const formUpdatePassword = document.getElementById("form-update-password");
formUpdatePassword.addEventListener("submit", () => {
  UpdatePasswordApr();
});

const UpdatePasswordApr = async (event) => {
  event.preventDefault();

  const currentPassword = document.getElementById("currentPassword").value;
  const newPassword = document.getElementById("newPassword").value;
  const confirmNewPassword = document.getElementById("confirmNewPassword").value;

  if (!validPassword(newPassword) || newPassword !== confirmNewPassword) {
    alertError(
      "La contraseña debe cumplir los siguientes requisitos: tener al menos una letra mayúscula, una letra minúscula, un carácter numérico, no contener espacios en blanco y tener al menos 7 caracteres. Asegúrate de que las contraseñas coincidan."
    );
    return;
  }

  const datos = new FormData();
  datos.append("currentPassword", currentPassword);
  datos.append("newPassword", newPassword);

  try {
    const respuesta = await fetch(
      "?controller=main&action=updatePassword",
      {
        method: "POST",
        body: datos,
      }
    );

    const info = await respuesta.json();

    if (info.estado === 1) {
      await alertSuccess("Se ha editado correctamente");
      window.location.href = info.url;
      info.logout;
    } else {
      alertError("Error al editar");
    }
  } catch (error) {
    alertError("Ha ocurrido un error en la solicitud");
  }
};
