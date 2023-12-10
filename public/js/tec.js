import { updateInfo } from "./updateInfo.js";
// UPDATE INFO <----------------------------------------------------------------|

const formTecnico = document.getElementById("formUpdateInfo");

formTecnico.addEventListener("submit", async (event) => {
  event.preventDefault();

  const controller = "tecnico";
  const correo = "tec_correo";

  const campos = [
    "tec_nombre1",
    "tec_nombre2",
    "tec_apellido1",
    "tec_apellido2",
    "tec_correo",
    "tec_telefono",
  ];

  const camposLabels = {
    tec_nombre1: "Primer nombre",
    tec_nombre2: "Segundo nombre",
    tec_apellido1: "Primer apellido",
    tec_apellido2: "Segundo apellido",
    tec_correo: "Correo",
    tec_telefono: "Teléfono",
  };
  // Llama a la función
  updateInfo(campos, camposLabels, controller, correo);
});
