import { alertSuccess, alertError } from "./alertas.js";

// CAMBIAR CONTRASEÑA USUARIO -------------------------------------------------
const validarContrasenaAprendiz = (contrasena) => {
  const patron = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?!.*\s).{7,}$/;
  return patron.test(contrasena);
};

let UpdatePasswordApr = async (event) => {
  const password = document.getElementById("apr_update_password").value;
  const Npassword = document.getElementById("apr_update_Npassword").value;
  const NCpassword = document.getElementById("apr_update_NCpassword").value;

  if (!validarContrasenaAprendiz(Npassword) || Npassword !== NCpassword) {
    event.preventDefault();
    alertError(
      "La contraseña debe cumplir los siguientes requisitos: tener al menos una letra mayúscula, una letra minúscula, un carácter numérico, no contener espacios en blanco y tener al menos 7 dígitos. Asegúrate de que las contraseñas coincidan."
    );
  } else {
    let datos = new FormData();
    datos.append("password", password);
    datos.append("Npassword", Npassword);

    let respuesta = await fetch("?controller=usuario&action=cambiarPassword", {
      method: "POST",
      body: datos,
    });

    let info = await respuesta.json();

    if (info.estado === 1) {
      alertSuccess("Se ha editado correctamente").then(() => {
        window.location.href = info.url;
        info.logout;
      });
    } else {
      alertError("Error al editar");
    }
  }
};

// |================================== X ==================================| //
// AGREGAR <----------------------------------------------------------------------|
// EDITAR <-----------------------------------------------------------------------|
// ELIMINAR <---------------------------------------------------------------------|
