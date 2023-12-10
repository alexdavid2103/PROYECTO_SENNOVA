// UPDATE INFO <----------------------------------------------------------------|
import { updateInfo } from "./updateInfo.js";

const formEmpresa = document.getElementById("formUpdateInfo");

formEmpresa.addEventListener("submit", async (event) => {
  event.preventDefault();

  const controller = "empresa";
  const correo = "emp_correo";

  const campos = [
    "emp_nombre",
    "emp_correo",
    "emp_telefono",
    "emp_direccion",
    "emp_municipio",
  ];

  const camposLabels = {
    emp_nombre: "Nombre",
    emp_correo: "Correo",
    emp_telefono: "Telefono",
    emp_direccion: "Direccion",
    emp_municipio: "Municipio",
  };
  // Llama a la función
  updateInfo(campos, camposLabels, controller, correo);
});
