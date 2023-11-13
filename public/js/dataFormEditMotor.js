// MOSTRAR Y OCULTAR EL FORMULARIO PARA EDITAR EL MOTOR <-------------------------------|

const closeFormEditMotor = document.querySelectorAll(".closeFormEditMotor");
const openFormEditMotor = document.querySelectorAll(".openFormEditMotor");
const FormEditMotor = document.querySelectorAll(".contForm");

const toggleActiveForm = (button) => {
  FormEditMotor.forEach((container) => {
    if (button.getAttribute("data-id") === container.getAttribute("data-id")) {
      container.classList.toggle("activeForm");
    }
  });
};

openFormEditMotor.forEach((button) => {
  button.addEventListener("click", () => {
    toggleActiveForm(button);
  });
});

closeFormEditMotor.forEach((button) => {
  button.addEventListener("click", () => {
    toggleActiveForm(button);
  });
});

// CARGAR DATOS DEL MOTOR EN EL FORMULARIO <--------------------------------------------|

const uploadData = async (serie) => {
  try {
    const respuesta = await fetch(
      `?controller=API&action=getDataMotores&serie=${serie}`
    );
    const data = await respuesta.json();
    console.log(data);
  } catch (error) {
    console.log(`Ha ocurrido un error: ${error}`);
  }
};

editMotorButton.forEach((button) => {
  button.addEventListener("click", () => {
    const serie = button.getAttribute("data-serie");
    uploadData(serie);
  });
});

// OPCIÓN 1 <----------------------------------------------|

const editMotorButton = document.querySelectorAll(".editMotorButton");

// Array que contiene los IDs de los campos en el formulario
const fields = [
  "edit_mot_empresaFK",
  "edit_mot_ubicacionFK",
  "edit_mot_serie",
  "edit_mot_normaFK",
  "edit_mot_polos",
  "edit_mot_potencia",
  "edit_mot_IpIn",
  "edit_mot_par_arranque",
  "edit_mot_par_maxima",
  "edit_mot_mom_inercia",
  "edit_mot_tiempo_rotor_bloq",
  "edit_mot_peso",
  "edit_mot_niv_ruido",
  "edit_mot_factor_servicio",
  "edit_mot_rotacion_nominal",
  "edit_mot_corriente_nominal",
  "edit_mot_altitud",
  "edit_mot_temp_ambiente",
  "edit_mot_proteccion",
  "edit_mot_carcasaNombre",
  "edit_mot_carcasaValor",
  "edit_mot_eficienciaPorcentaje",
  "edit_mot_eficienciaValor",
  "edit_mot_fac_potenciaPorcentaje",
  "edit_mot_fac_potenciaValor",
  "edit_mot_tecnicoFK",
  "edit_mot_tipoFK",
];

// Array que contiene los nombres de los atributos de datos de los botones de edición de motor
const dataAttribute = [
  "data-empresaFK",
  "data-ubicacionFK",
  "data-serie",
  "data-normaFK",
  "data-polos",
  "data-potencia",
  "data-IpIn",
  "data-par_arranque",
  "data-par_maxima",
  "data-mom_inercia",
  "data-tiempo_rotor_bloq",
  "data-peso",
  "data-niv_ruido",
  "data-factor_servicio",
  "data-rotacion_nominal",
  "data-corriente_nominal",
  "data-altitud",
  "data-temp_ambiente",
  "data-proteccion",
  "data-carcasaNombre",
  "data-carcasaValor",
  "data-eficienciaPorcentaje",
  "data-eficienciaValor",
  "data-fac_potenciaPorcentaje",
  "data-fac_potenciaValor",
  "data-tecnicoFK",
  "data-tipoFK",
];

// Iterar sobre cada botón de edición de motor
editMotorButton.forEach((motor) => {
  motor.addEventListener("click", () => {
    // Iterar sobre los atributos de datos y establecer los valores correspondientes en los campos del formulario
    dataAttribute.forEach((attribute, index) => {
      let value = motor.getAttribute(attribute); // Obtener el valor del atributo de datos
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
  });
});
