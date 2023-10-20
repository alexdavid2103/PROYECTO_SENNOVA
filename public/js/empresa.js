import {
  alertSuccess,
  alertWarning,
  alertError,
  advanceAlertWarning,
} from "./alertas.js";
// |================================== EMPRESAS ==================================| //

// AGREGAR <----------------------------------------------------------------------|

// Obtén el formulario por su ID
const form_add_empresa = document.getElementById("form_add_empresa");

// Asigna la función addEmpresa al evento submit del formulario
form_add_empresa.addEventListener("submit", async (event) => {
  event.preventDefault();

  // Obtener los valores de los campos del formulario
  const id = document.getElementById("add_emp_id").value;
  const nombre = document.getElementById("add_emp_nombre").value;
  const correo = document.getElementById("add_emp_correo").value;
  const telefono = document.getElementById("add_emp_telefono").value;
  const direccion = document.getElementById("add_emp_direccion").value;
  const municipio = document.getElementById("add_emp_municipio").value;

  // Validar si algún campo está vacío
  if (
    [id, nombre, correo, telefono, direccion, municipio].some(
      (campo) => campo === ""
    )
  ) {
    alertWarning("Todos los campos son obligatorios");
    return false;
  }

  // Validar el formato de correo electrónico
  const correoValido = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if (!correo.match(correoValido)) {
    alertWarning("Ingrese un correo electrónico válido");
    return false;
  }

  // Crear objeto FormData para enviar los datos al servidor
  const datos = new FormData();
  datos.append("id", id);
  datos.append("nombre", nombre);
  datos.append("correo", correo);
  datos.append("telefono", telefono);
  datos.append("direccion", direccion);
  datos.append("municipio", municipio);

  // Enviar la solicitud POST al servidor para registrar el cliente
  const respuesta = await fetch("?controller=empresa&action=add", {
    method: "POST",
    body: datos,
  });

  // Obtener la respuesta del servidor en formato JSON
  const info = await respuesta.json();

  // Mostrar mensaje de éxito o error según la respuesta del servidor
  if (info.estado === 1) {
    alertSuccess("Se ha registrado correctamente").then(() => {
      window.location.href = info.url;
    });
  } else {
    alertError("La empresa ya se encuentra registrada");
  }
});

// EDITAR <-----------------------------------------------------------------------|

// Obtén el formulario por su ID
const form_edit_empresa = document.getElementById("form_edit_empresa");

// Asigna la función addEmpresa al evento submit del formulario
form_edit_empresa.addEventListener("submit", async (event) => {
  event.preventDefault();

  // Obtener los valores de los campos del formulario
  const id = document.getElementById("edit_emp_id").value;
  const nombre = document.getElementById("edit_emp_nombre").value;
  const correo = document.getElementById("edit_emp_correo").value;
  const telefono = document.getElementById("edit_emp_telefono").value;
  const direccion = document.getElementById("edit_emp_direccion").value;
  const municipio = document.getElementById("edit_emp_municipio").value;

  // Validar si algún campo está vacío
  if (
    [id, nombre, correo, telefono, direccion, municipio].some(
      (campo) => campo === ""
    )
  ) {
    alertWarning("Todos los campos son obligatorios");
    return false;
  }

  // Validar el formato de correo electrónico
  const correoValido = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if (!correo.match(correoValido)) {
    alertWarning("Ingrese un correo electrónico válido");
    return false;
  }

  // Crear objeto FormData para enviar los datos al servidor
  const datos = new FormData();
  datos.append("id", id);
  datos.append("nombre", nombre);
  datos.append("correo", correo);
  datos.append("telefono", telefono);
  datos.append("direccion", direccion);
  datos.append("municipio", municipio);

  // Enviar la solicitud POST al servidor para registrar el cliente
  const respuesta = await fetch("?controller=empresa&action=add", {
    method: "POST",
    body: datos,
  });

  // Obtener la respuesta del servidor en formato JSON
  const info = await respuesta.json();

  // Mostrar mensaje de éxito o error según la respuesta del servidor
  if (info.estado === 1) {
    alertSuccess("Se ha editado correctamente").then(() => {
      window.location.reload();
    });
  } else {
    alertError("La empresa ya se encuentra registrada");
  }
});

// ELIMINAR <---------------------------------------------------------------------|

// Función para eliminar una empresa
function deleteEmpresa(id) {
  try {
    advanceAlertWarning().then(async (willDelete) => {
      if (willDelete) {
        let datos = new FormData();
        datos.append("id", id);

        // Enviar la solicitud POST al servidor para eliminar el cliente
        let respuesta = await fetch("?controller=empresa&action=delete", {
          method: "POST",
          body: datos,
        });

        // Obtener la respuesta del servidor en formato JSON
        let info = await respuesta.json();

        // Mostrar mensaje de éxito o error según la respuesta del servidor
        if (info.estado === 1) {
          alertSuccess("Ha sido eliminado correctamente").then(() => {
            window.location.reload();
          });
        } else {
          alertError("No se pudo eliminar");
        }
      } else {
        swal("No ha sido eliminado");
      }
    });
  } catch (error) {
    console.log(error);
    // Manejar el error de la solicitud
  }
}
