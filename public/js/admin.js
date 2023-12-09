import {
  alertError,
  alertInfo,
  alertSuccess,
  alertWarning,
} from "./alertas.js";

const form = document.getElementById("");
const controller = document.getElementById("");
const image = document.getElementById("");
const name = document.getElementById("");
const email = document.getElementById("");
const direccion = document.getElementById("");
const municipio = document.getElementById("");
form.addEventListener("submit", () => {
  updateImage();
});

const updateImage = async () => {
  let datos = new FormData();
  datos.append("imagen", $(image)[0].files[0]);

  let respuesta = await fetch("?controller=admin&action=updateImage", {
    method: "POST",
    body: datos,
  });

  let info = await respuesta.json();
  if (info.estado === 1) {
    alertSuccess("Se ha actualizado foto correctamente").then(() => {
      window.location.reload();
    });
  } else {
    alertError("Error al guardar foto").then(() => {
      window.location.reload();
    });
  }
};
