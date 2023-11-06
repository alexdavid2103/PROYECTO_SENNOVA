import {
  alertWarning,
  advanceAlertWarning,
  alertSuccess,
  alertError,
} from "./alertas.js";

// |================================== MOTORES ==================================| //

// AGREGAR <----------------------------------------------------------------------|

// Obtener el formulario por su ID
const form_add_motor = document.querySelector(".form_add_motor");

// Agregar un evento 'submit' al formulario
form_add_motor.addEventListener("submit", async (event) => {
  event.preventDefault(); // Prevenir el comportamiento predeterminado del formulario al enviar

  // Definir los identificadores de los campos y sus etiquetas legibles por humanos
  const campos = [
    "add_mot_empresaFK",
    "add_mot_ubicacionFK",
    "add_mot_serie",
    "add_mot_normaFK",
    "add_mot_polos",
    "add_mot_potencia",
    "add_mot_IpIn",
    "add_mot_par_arranque",
    "add_mot_par_maxima",
    "add_mot_mom_inercia",
    "add_mot_tiempo_rotor_bloq",
    "add_mot_peso",
    "add_mot_niv_ruido",
    "add_mot_factor_servicio",
    "add_mot_rotacion_nominal",
    "add_mot_corriente_nominal",
    "add_mot_altitud",
    "add_mot_temp_ambiente",
    "add_mot_proteccion",
    "add_mot_carcasaNombre",
    "add_mot_carcasaValor",
    "add_mot_eficienciaPorcentaje",
    "add_mot_eficienciaValor",
    "add_mot_fac_potenciaPorcentaje",
    "add_mot_fac_potenciaValor",
    "add_mot_tecnicoFK",
  ];

  const camposLabels = {
    add_mot_empresaFK: "Empresa",
    add_mot_ubicacionFK: "Ubicación",
    add_mot_serie: "Serie",
    add_mot_normaFK: "Norma",
    add_mot_polos: "Polos",
    add_mot_potencia: "Potencia",
    add_mot_IpIn: "Ip/In",
    add_mot_par_arranque: "Par de arranque",
    add_mot_par_maxima: "Par máxima",
    add_mot_mom_inercia: "Momento de inercia",
    add_mot_tiempo_rotor_bloq: "Tiempo de rotor bloqueado",
    add_mot_peso: "Peso",
    add_mot_niv_ruido: "Nivel de ruido",
    add_mot_factor_servicio: "Factor de servicio",
    add_mot_rotacion_nominal: "Rotación nominal",
    add_mot_corriente_nominal: "Corriente nominal",
    add_mot_altitud: "Altitud",
    add_mot_temp_ambiente: "Temperatura ambiente",
    add_mot_proteccion: "Protección",
    add_mot_carcasaNombre: "Nombre de la carcasa",
    add_mot_carcasaValor: "Valor de la carcasa",
    add_mot_eficienciaPorcentaje: "Porcentaje de eficiencia",
    add_mot_eficienciaValor: "Valor de eficiencia",
    add_mot_fac_potenciaPorcentaje: "Porcentaje de factor de potencia",
    add_mot_fac_potenciaValor: "Valor de factor de potencia",
    add_mot_tecnicoFK: "Técnico",
  };

  // Inicializar un arreglo para almacenar los nombres de los campos vacíos
  let emptyFields = [];

  // Iterar sobre cada campo para verificar si está vacío
  campos.forEach((campo) => {
    if (
      document.getElementById(campo).value.trim() === "" &&
      campo !== "add_mot_empresaFK"
    ) {
      emptyFields.push(camposLabels[campo]); // Agregar el nombre legible del campo al arreglo
    }
  });

  // Comprobar si hay campos vacíos y mostrar una alerta si es así
  if (emptyFields.length > 0) {
    alertWarning(
      `Los siguientes campos son obligatorios: ${emptyFields.join(", ")}`
    );
    return false; // Detener el envío del formulario
  }

  // Crear un objeto FormData y agregar los valores de los campos
  const datos = new FormData();
  campos.forEach((campo) => {
    datos.append(campo, document.getElementById(campo).value);
  });

  // Enviar una solicitud POST al servidor para agregar el motor
  try {
    const respuesta = await fetch("?controller=motor&action=add", {
      method: "POST",
      body: datos,
    });

    // Obtener la respuesta del servidor en formato JSON
    const info = await respuesta.json();

    // Mostrar un mensaje de éxito o error según la respuesta del servidor
    if (info.estado === 1) {
      alertSuccess("Se ha registrado correctamente").then(() => {
        window.location.reload(); // Recargar la página
      });
    } else {
      alertError("Error al registrar el motor");
    }
  } catch (error) {
    console.error("Error al realizar la solicitud:", error);
    alertError("Error al realizar la solicitud");
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

// /*=============== SHOW SCROLL UP ===============*/ 
const scrollUp = () =>{
	const scrollUp = document.getElementById('scroll-up')
    // When the scroll is higher than 350 viewport height, add the show-scroll class to the a tag with the scrollup class
	this.scrollY >= 350 ? scrollUp.classList.add('show-scroll')
						: scrollUp.classList.remove('show-scroll')
}
window.addEventListener('scroll', scrollUp)


