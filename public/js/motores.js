import {
  alertWarning,
  advanceAlertWarning,
  alertSuccess,
  alertError,
} from "./alertas.js";

// |================================== MOTORES ==================================| //

// AGREGAR <----------------------------------------------------------------------|

// Función para obtener el valor de un campo
const getField = (fieldName) =>
  document.getElementById(`add_mot_${fieldName}`).value;
// Objeto FormData para almacenar los datos del formulario
const formData = new FormData();

// Lista de campos obligatorios
const requiredFields = [
  "empresaFK",
  "ubicacionFK",
  "serie",
  "normaFK",
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
  "temp_ambiente",
  "proteccion",
  "carcasaNombre",
  "carcasaValor",
  "eficienciaPorcentaje",
  "eficienciaValor",
  "fac_potenciaPorcentaje",
  "fac_potenciaValor",
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
const form_add_motor = document.querySelector(".form_add_motor");

form_add_motor.addEventListener("submit", async (event) => {
  event.preventDefault(); // Evitar el envío del formulario por defecto

  if (!areAllFieldsFilled) {
    // Mostrar una alerta si no se llenaron todos los campos
    alertWarning(
      "Todos los campos son obligatorios, asegúrese de llenar los campos correctamente"
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
    alertSuccess("Se ha registrado correctamente").then(() => {
      window.location.reload(); // Limpiar el formulario
    });
  } else {
    alertError("Error al registrar");
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
    "empresaFK",
    "ubicacionFK",
    "serie",
    "normaFK",
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
    "temp_ambiente",
    "proteccion",
    "carcasaNombre",
    "carcasaValor",
    "eficienciaPorcentaje",
    "eficienciaValor",
    "fac_potenciaPorcentaje",
    "fac_potenciaValor",
    "empresaFK",
    "tecnicoFK",
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
      alertError("Error al editar");
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

//

let motors = document.querySelector(".motors");

let cont_form_add_motor = document.querySelector(".cont_form_add_motor");
let btn_back_add_motor = document.querySelector(".btn_back_add_motor");

let cont_form_edit_motor = document.querySelector(".cont_form_edit_motor");
let edit_motor = document.querySelectorAll(".edit_motor");
let btn_back_edit_motor = document.querySelector(".btn_back_edit_motor");

edit_motor.forEach((motor) => {
  motor.addEventListener("click", () => {
    motors.style.display = "none";
    cont_form_edit_motor.style.display = "grid";

    let serie = motor.getAttribute("data-serie");
    let modelo = motor.getAttribute("data-modelo");
    let año = motor.getAttribute("data-año");
    let marca = motor.getAttribute("data-marca");
    let voltaje = motor.getAttribute("data-voltaje");
    let posicion = motor.getAttribute("data-posicion");
    let humedad = motor.getAttribute("data-humedad");
    let descripcion = motor.getAttribute("data-descripcion");
    let tipo_base = motor.getAttribute("data-tipo_base");
    let temperatura = motor.getAttribute("data-temperatura");
    let ventilacion = motor.getAttribute("data-ventilacion");
    let cliente_id = motor.getAttribute("data-cliente-id");
    let cliente_nom = motor.getAttribute("data-cliente-nom");
    let tecnico_id = motor.getAttribute("data-tecnico-id");
    let tecnico_nom = motor.getAttribute("data-tecnico-nom");

    document.getElementById("edit_motor_cliente").options[0].value = cliente_id;
    document.getElementById("edit_motor_cliente").options[0].innerHTML =
      cliente_nom;
    document.getElementById("edit_motor_serie").value = serie;
    document.getElementById("edit_motor_modelo").value = modelo;
    document.getElementById("edit_motor_año").value = año;
    document.getElementById("edit_motor_marca").value = marca;
    document.getElementById("edit_motor_voltaje").value = voltaje;
    document.getElementById("edit_motor_temperatura").value = temperatura;
    document.getElementById("edit_motor_posicion").options[0].value = posicion;
    document.getElementById("edit_motor_posicion").options[0].innerHTML =
      posicion;
    document.getElementById("edit_motor_humedad").options[0].value = humedad;
    document.getElementById("edit_motor_humedad").options[0].innerHTML =
      humedad;
    document.getElementById("edit_motor_tipo_base").options[0].value =
      tipo_base;
    document.getElementById("edit_motor_tipo_base").options[0].innerHTML =
      tipo_base;
    document.getElementById("edit_motor_ventilacion").options[0].value =
      ventilacion;
    document.getElementById("edit_motor_ventilacion").options[0].innerHTML =
      ventilacion;
  });
});

// btn_back_edit_motor.addEventListener("click", () => {
//   motors.style.display = "grid";
//   cont_form_edit_motor.style.display = "none";
// });
