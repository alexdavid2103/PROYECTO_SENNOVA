import {
  alertWarning,
  advanceAlertWarning,
  alertSuccess,
  alertInfo,
  alertError,
} from "alertas.js";

// |================================== MOTORES ==================================| //

// AGREGAR <----------------------------------------------------------------------|

// Función para obtener el valor de un campo
const getField = (fieldName) =>
  document.getElementById(`add_mot_${fieldName}`).value;
// Objeto FormData para almacenar los datos del formulario
const formData = new FormData();

// Lista de campos obligatorios
const requiredFields = [
  "serie",
  "norma",
  "polos",
  "potencia",
  "IpIn",
  "par_arranque",
  "par_maxima",
  "mom_inercia",
  "tiempo_rotor_bloq",
  "peso",
  "niv_ruido",
  "factor_servicio",
  "rotacion_nominal",
  "corriente_nominal",
  "altitud",
  "regimen",
  "temp_ambiente",
  "proteccion",
  "carcasaFK",
  "eficienciaFK",
  "fac_potenciaFK",
  "clienteFK",
  "tecnicoFK",
];

// Variable para verificar si todos los campos están llenos
let areAllFieldsFilled = true;

// Validar si todos los campos obligatorios están llenos
for (const field of requiredFields) {
  const fieldValue = getField(field);
  if (fieldValue === "") {
    areAllFieldsFilled = false;
    break; // Detener el bucle si se encuentra un campo vacío
  }
  formData.append(field, fieldValue); // Agregar campo y valor al FormData
}

// Manejar el evento de envío del formulario
const form_reg_motor = document.getElementById("reg_motor");
form_reg_motor.addEventListener("submit", async (event) => {
  event.preventDefault(); // Evitar el envío del formulario por defecto

  if (!areAllFieldsFilled) {
    // Mostrar una alerta si no se llenaron todos los campos
    alertWarning(
      (text =
        "Todos los campos son obligatorios, asegúrese de llenar los campos correctamente")
    );
    return false; // Evitar que se envíe el formulario
  }

  // Realizar la solicitud POST para registrar el motor
  let respuesta = await fetch("?controller=motor&action=add", {
    method: "POST",
    body: formData, // Enviar los datos del formulario
  });

  // Obtener la respuesta del servidor en formato JSON
  let info = await respuesta.json();

  // Mostrar un mensaje de éxito o error según la respuesta del servidor
  if (info.estado === 1) {
    alertSuccess((text = "Se ha registrado correctamente")).then(() => {
      form_reg_motor.reset(); // Limpiar el formulario
    });
  } else {
    alertError((text = "Error al registrar"));
  }
});

// EDITAR <-----------------------------------------------------------------------|

// Función para editar un motor
let editMotor = async () => {
  // Función para obtener el valor de un campo del formulario
  const getField = (fieldName) =>
    document.getElementById(`edit_mot_${fieldName}`).value;

  // Objeto FormData para almacenar los datos del formulario
  const formData = new FormData();

  // Lista de campos obligatorios que deben estar llenos
  const requiredFields = [
    "serie",
    "norma",
    "polos",
    "potencia",
    "IpIn",
    "par_arranque",
    "par_maxima",
    "mom_inercia",
    "tiempo_rotor_bloq",
    "peso",
    "niv_ruido",
    "factor_servicio",
    "rotacion_nominal",
    "corriente_nominal",
    "altitud",
    "regimen",
    "temp_ambiente",
    "proteccion",
    "carcasaFK",
    "eficienciaFK",
    "fac_potenciaFK",
    "clienteFK",
    "tecnicoFK",
    "estadoFK",
  ];

  // Variable para verificar si todos los campos obligatorios están llenos
  let areAllFieldsFilled = true;

  // Validar si todos los campos obligatorios están llenos
  for (const field of requiredFields) {
    const fieldValue = getField(field);
    if (fieldValue === "") {
      areAllFieldsFilled = false;
      break; // Si se encuentra un campo vacío, se detiene la validación
    }
    formData.append(field, fieldValue); // Agregar campo y valor al FormData
  }

  // Obtener el formulario de edición por su ID
  const form_edit_motor = document.getElementById("edit_motor");

  // Manejar el evento de envío del formulario
  form_edit_motor.addEventListener("submit", async (event) => {
    event.preventDefault(); // Evitar el envío del formulario por defecto

    if (!areAllFieldsFilled) {
      // Mostrar una alerta si no se llenaron todos los campos
      alertWarning((text = "Todos los campos son obligatorios"));
      return false; // Evitar que se envíe el formulario
    }

    // Realizar una solicitud POST al servidor para editar el motor
    let respuesta = await fetch("?controller=motor&action=edit", {
      method: "POST",
      body: formData, // Enviar los datos del formulario
    });

    // Obtener la respuesta del servidor en formato JSON
    let info = await respuesta.json();

    if (info.estado === 1) {
      // Mostrar mensaje de éxito si la edición fue exitosa
      alertSuccess((text = "Se ha editado correctamente")).then(() => {
        window.location.reload(); // Recargar la página después de la edición
      });
    } else {
      // Mostrar mensaje de error si hubo un problema durante la edición
      alertError((text = "Error al editar"));
    }
  });
};

// ELIMINAR <---------------------------------------------------------------------|

// Función para eliminar un motor
function deleteMotor(id) {
  try {
    advanceAlertWarning().then(async (willDelete) => {
      if (willDelete) {
        let datos = new FormData();
        datos.append("id", id);

        // Enviar la solicitud POST al servidor para eliminar el motor
        let respuesta = await fetch("?controller=motor&action=delete", {
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
