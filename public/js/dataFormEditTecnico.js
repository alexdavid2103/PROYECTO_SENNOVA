const closeFormEditTecnico = document.querySelectorAll(".closeFormEditTecnico");
const openFormEditTecnico = document.querySelectorAll(".openFormEditTecnico");
const FormEditTecnico = document.getElementById("formEditTecnico");

// Array que contiene los IDs de los campos en el formulario
const fields = [
  "edit_tec_id",
  "edit_tec_nombre1",
  "edit_tec_nombre2",
  "edit_tec_apellido1",
  "edit_tec_apellido2",
  "edit_tec_correo",
  "edit_tec_telefono",
];

// Array que contiene los nombres de los atributos de datos de los botones de edición de Tecnico
const dataAttribute = [
  "data-id",
  "data-nombre1",
  "data-nombre2",
  "data-apellido1",
  "data-apellido2",
  "data-correo",
  "data-telefono",
];

// Iterar sobre cada botón de edición de Tecnico
openFormEditTecnico.forEach((tecnico) => {
  tecnico.addEventListener("click", () => {
    // Iterar sobre los atributos de datos y establecer los valores correspondientes en los campos del formulario
    dataAttribute.forEach((attribute, index) => {
      let value = tecnico.getAttribute(attribute); // Obtener el valor del atributo de datos
      let field = document.getElementById(fields[index]); // Obtener el campo del formulario por su ID

      if (field.tagName === "SELECT") {
        // Comprobar si el campo es un elemento de selección
        for (let option of field.options) {
          if (option.value === value) {
            option.selected = true; // Establecer la opción como seleccionada si coincide con el valor
            break;
          }
        }
      } else {
        field.value = value; // Para campos de entrada de texto, establecer el valor directamente
      }
    });
    FormEditTecnico.classList.toggle("activeForm");
  });
});

closeFormEditTecnico.forEach((button) => {
  button.addEventListener("click", () => {
    FormEditTecnico.classList.toggle("activeForm");
  });
});
