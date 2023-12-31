import { alertWarning, alertError } from "./alertas.js";

// |==================================> LOGIN <==================================| \\
let form = document.querySelector(".form");

form.addEventListener("submit", async (event) => {
  const id = document.getElementById("id").value;
  const password = document.getElementById("password").value;

  if (id === "") {
    event.preventDefault();
    alertWarning("Ingrese su numero de documento");
    return false;
  }

  if (password === "") {
    event.preventDefault();
    alertWarning("Ingrese su contraseña");
    return false;
  }

  let datos = new FormData();
  datos.append("id", id);
  datos.append("password", password);

  let respuesta = await fetch("?controller=main&action=validar", {
    method: "POST",
    body: datos,
  });

  let info = await respuesta.json();

  if (info.estado === 1) {
    window.location.href = info.url;
  } else {
    alertError("Usuario o contraseña incorrecta");
  }
});
