const closeFormEditEmpresa = document.querySelectorAll(".closeFormEditEmpresa");
const openFormEditEmpresa = document.querySelectorAll(".openFormEditEmpresa");
const FormEditEmpresa = document.getElementById("formEditEmpresa");

// Array que contiene los IDs de los campos en el formulario
const fields = [
  "edit_emp_id",
  "edit_emp_nombre",
  "edit_emp_correo",
  "edit_emp_telefono",
  "edit_emp_direccion",
  "edit_emp_municipio",
];

// Array que contiene los nombres de los atributos de datos de los botones de edición de Empresa
const dataAttribute = [
  "data-id",
  "data-nombre",
  "data-correo",
  "data-telefono",
  "data-direccion",
  "data-municipio",
];

// Iterar sobre cada botón de edición de Empresa
openFormEditEmpresa.forEach((empresa) => {
  empresa.addEventListener("click", () => {
    // Iterar sobre los atributos de datos y establecer los valores correspondientes en los campos del formulario
    dataAttribute.forEach((attribute, index) => {
      let value = empresa.getAttribute(attribute); // Obtener el valor del atributo de datos
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
    FormEditEmpresa.classList.toggle("activeForm");
  });
});

closeFormEditEmpresa.forEach((button) => {
  button.addEventListener("click", () => {
    FormEditEmpresa.classList.toggle("activeForm");
  });
});
