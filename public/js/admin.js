import { updateInfo } from "./updateInfo.js";

const formAdmin = document.getElementById("formUpdateInfo");

formAdmin.addEventListener("submit", async (event) => {
  event.preventDefault();

  const controller = "admin";
  const correo = "adm_correo";

  const campos = [
    "adm_nombre1",
    "adm_nombre2",
    "adm_apellido1",
    "adm_apellido2",
    "adm_correo",
    "adm_telefono",
  ];
  const camposLabels = {
    adm_nombre1: "Primer nombre",
    adm_nombre2: "Segundo nombre",
    adm_apellido1: "Primer apellido",
    adm_apellido2: "Segundo apellido",
    adm_correo: "Correo",
    adm_telefono: "Teléfono",
  };
  // Llama a la función
  updateInfo(campos, camposLabels, controller, correo);
});
