// Importa las funciones de alerta desde el módulo alertas.js
import {
  alertSuccess,
  alertWarning,
  alertError,
  advanceAlertWarning,
  alertInfo,
} from "./alertas.js";

// Funcionalidad de Agregar Empresa

const form_add_empresa = document.getElementById("form_add_empresa"); // Obtiene el formulario de agregar empresa por su ID
form_add_empresa.addEventListener("submit", async (event) => {
  // Escucha el evento de envío del formulario
  event.preventDefault();
  addEmpresa();
});

const addEmpresa = async () => {
  // Define los campos y sus etiquetas correspondientes
  const campos = [
    "add_emp_id",
    "add_emp_nombre",
    "add_emp_correo",
    "add_emp_telefono",
    "add_emp_direccion",
    "add_emp_municipio",
  ];

  const camposLabels = {
    add_emp_id: "NIT",
    add_emp_nombre: "Nombre",
    add_emp_correo: "Correo",
    add_emp_telefono: "Telefono",
    add_emp_direccion: "Direccion",
    add_emp_municipio: "Municipio",
  };

  let emptyFields = [];

  // Verifica si hay campos obligatorios vacíos y agrega sus etiquetas a emptyFields
  campos.forEach((campo) => {
    if (document.getElementById(campo).value.trim() === "") {
      emptyFields.push(camposLabels[campo]);
    }
  });

  // Muestra una alerta si hay campos obligatorios vacíos
  if (emptyFields.length > 0) {
    alertWarning(
      `Los siguientes campos son obligatorios: ${emptyFields.join(", ")}`
    );
    return false; // Detiene el envío del formulario
  }

  // Valida el formato del correo electrónico
  const correoValido = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  const correo = document.getElementById("add_emp_correo").value;
  if (!correo.match(correoValido)) {
    alertWarning("Ingrese un correo electrónico válido");
    return false; // Detiene el envío del formulario
  }

  // Crea un objeto FormData con los datos del formulario
  const datos = new FormData();
  campos.forEach((campo) => {
    datos.append(campo, document.getElementById(campo).value);
  });

  // Envía una solicitud POST al servidor para registrar la empresa
  const respuesta = await fetch("?controller=empresa&action=add", {
    method: "POST",
    body: datos,
  });

  // Obtiene la respuesta del servidor en formato JSON
  const info = await respuesta.json();

  // Muestra un mensaje de éxito y redirige si la operación fue exitosa, de lo contrario muestra un mensaje de error
  if (info.estado === 1) {
    alertSuccess("Se ha registrado correctamente").then(() => {
      window.location.href = info.url;
    });
  } else {
    alertError("La empresa ya se encuentra registrada");
  }
};

// Funcionalidad de Editar Empresa
const form_edit_empresa = document.getElementById("form_edit_empresa");
// Obtiene el formulario de editar empresa por su ID
form_edit_empresa.addEventListener("submit", async (event) => {
  // Escucha el evento de envío del formulario
  event.preventDefault(); // Evita el comportamiento predeterminado del evento de envío

  // Define los campos y sus etiquetas correspondientes
  const campos = [
    "edit_emp_id",
    "edit_emp_nombre",
    "edit_emp_correo",
    "edit_emp_telefono",
    "edit_emp_direccion",
    "edit_emp_municipio",
  ];
  const camposLabels = {
    edit_emp_id: "NIT",
    edit_emp_nombre: "Nombre",
    edit_emp_correo: "Correo",
    edit_emp_telefono: "Telefono",
    edit_emp_direccion: "Direccion",
    edit_emp_municipio: "Municipio",
  };

  let emptyFields = [];

  // Verifica si hay campos obligatorios vacíos y agrega sus etiquetas a emptyFields
  campos.forEach((campo) => {
    if (document.getElementById(campo).value.trim() === "") {
      emptyFields.push(camposLabels[campo]);
    }
  });

  // Muestra una alerta si hay campos obligatorios vacíos
  if (emptyFields.length > 0) {
    alertWarning(
      `Los siguientes campos son obligatorios: ${emptyFields.join(", ")}`
    );
    return false; // Detiene el envío del formulario
  }

  // Valida el formato del correo electrónico
  const correoValido = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  const correo = document.getElementById("edit_emp_correo").value;
  if (!correo.match(correoValido)) {
    alertWarning("Ingrese un correo electrónico válido");
    return false; // Detiene el envío del formulario
  }

  // Crea un objeto FormData con los datos del formulario
  const datos = new FormData();
  campos.forEach((campo) => {
    datos.append(campo, document.getElementById(campo).value);
  });

  // Envía una solicitud POST al servidor para editar la empresa
  const respuesta = await fetch("?controller=empresa&action=edit", {
    method: "POST",
    body: datos,
  });

  // Obtiene la respuesta del servidor en formato JSON
  const info = await respuesta.json();

  // Muestra un mensaje de éxito y recarga la página si la operación fue exitosa, de lo contrario muestra un mensaje de error
  if (info.estado === 1) {
    alertSuccess("Se ha editado correctamente").then(() => {
      window.location.reload();
    });
  } else {
    alertError("No se pudo editar");
  }
});

// ELIMINAR <---------------------------------------------------------------------|
const deleteEmpresaButton = document.querySelectorAll(
  ".deleteEmpresaButton[data-id]"
);

deleteEmpresaButton.forEach((button) => {
  button.addEventListener("click", () => {
    const id = button.getAttribute("data-id");
    deleteEmpresa(id);
  });
});

const deleteEmpresa = async (id) => {
  try {
    const willDelete = await advanceAlertWarning();

    if (willDelete) {
      const respuesta = await fetch(
        `?controller=empresa&action=delete&id=${id}`
      );

      const info = await respuesta.json();

      if (info.estado === 1) {
        alertSuccess("Ha sido eliminado correctamente").then(() => {
          window.location.reload();
        });
      } else {
        alertError("No se pudo eliminar");
      }
    }
  } catch (error) {
    alertInfo("No ha sido eliminado");
  }
};

export { addEmpresa };
// OTROS <----------------------------------------------------------------|

const openButtonEmpresa = document.querySelector(".btnAddEmpresa");
const formAddEmpresa = document.getElementById("formAddEmpresa");
const closeFormAddEmpresa = document.querySelector(".closeFormAddEmpresa");

openButtonEmpresa.addEventListener("click", () => {
  formAddEmpresa.classList.toggle("activeForm");
  openButtonEmpresa.classList.toggle("d-none");
});

closeFormAddEmpresa.addEventListener("click", () => {
  formAddEmpresa.classList.toggle("activeForm");
  openButtonEmpresa.classList.toggle("d-none");
});

// DELETE UBICACIONES MOTOR <---------------------------------------------|

const deleteUbicacionButton = document.querySelectorAll(
  ".deleteUbicacionButton[data-id]"
);

deleteUbicacionButton.forEach((button) => {
  button.addEventListener("click", () => {
    const id = button.getAttribute("data-id");
    deleteUbicacionMotor(id);
  });
});

const deleteUbicacionMotor = async (id) => {
  try {
    const willDelete = await advanceAlertWarning();

    if (willDelete) {
      const respuesta = await fetch(
        `?controller=empresa&action=deleteUbicacionMotor&id=${id}`
      );

      const info = await respuesta.json();

      if (info.estado === 1) {
        alertSuccess("Ha sido eliminado correctamente").then(() => {
          window.location.reload();
        });
      } else {
        alertError("No se pudo eliminar");
      }
    }
  } catch (error) {
    alertInfo("No ha sido eliminado");
  }
};

const editarUbicacion = async (id, name) => {
  if (!name) {
    alertWarning(`Ingrese un nombre válido`);
    return false;
  }

  const datos = new FormData();
  datos.append("nombre", name);
  datos.append("id", id);

  const respuesta = await fetch("?controller=empresa&action=editUbicacionMotor", {
    method: "POST",
    body: datos,
  });

  const info = await respuesta.json();

  if (info.estado === 1) {
    alertSuccess("Se ha editado correctamente").then(() => {
      window.location.reload();
    });
  } else {
    alertError("No se pudo editar");
  }
};
const editUbicacionForms = document.querySelectorAll(".editUbicacionForm");
const ubicacionesFields = document.querySelectorAll(".ubimot_nombre");

editUbicacionForms.forEach((form, index) => {
  form.addEventListener("submit", (event) => {
    event.preventDefault();

    const id = ubicacionesFields[index].getAttribute("data-id");
    const name = ubicacionesFields[index].value;
    console.log(`id: ${id}, name: ${name}`);
    editarUbicacion(id, name);
  });
});

// OTROS <----------------------------------------------------------------|
const editUbicacionButtons = document.querySelectorAll(".editUbicacionButton");
const ubicacionNames = document.querySelectorAll(".ubimot_nombre");
const saveEditUbicacionButtons = document.querySelectorAll(
  ".saveEditUbicacionButton"
);

editUbicacionButtons.forEach((button, index) => {
  button.addEventListener("click", () => {
    const idButton = button.getAttribute("data-id");
    mostrarYocular(idButton, index);
  });
});

const mostrarYocular = (idButton, index) => {
  const idName = ubicacionNames[index].getAttribute("data-id");

  if (idName === idButton) {
    const inputField = ubicacionNames[index];
    inputField.classList.toggle("border-bottom");
    saveEditUbicacionButtons[index].classList.toggle("d-none");

    // Cambiar el atributo readOnly
    inputField.readOnly = !inputField.readOnly;

    const button = editUbicacionButtons[index];
    button.innerHTML = button.innerHTML === "Editar" ? "Cancelar" : "Editar";

    // Si se presiona "Editar", guarda el valor actual
    if (button.innerHTML === "Cancelar") {
      inputField.dataset.previousValue = inputField.value;
    } else {
      // Si se presiona "Cancelar", restaura el valor guardado
      inputField.value = inputField.dataset.previousValue || "";
    }

    button.classList.toggle("basicDeleteButton");
    button.classList.toggle("basicEditButton");

    const name = inputField.value;

    return { idButton, name };
  }
};
