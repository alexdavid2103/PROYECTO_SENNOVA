// MOSTRAR Y OCULTAR EL FORMULARIO PARA EDITAR EL MOTOR <-------------------------------|

const closeFormEditMotor = document.querySelectorAll(".closeFormEditMotor");
const openFormEditMotor = document.querySelectorAll(".openFormEditMotor");
const FormEditMotor = document.getElementById("FormEditMotor");

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
  "edit_mot_carcasaId",
  "edit_mot_carcasaNombre",
  "edit_mot_carcasaValor",
  "edit_mot_eficienciaId",
  "edit_mot_eficienciaPorcentaje",
  "edit_mot_eficienciaValor",
  "edit_mot_fac_potenciaId",
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
  "data-carcasaId",
  "data-carcasaNombre",
  "data-carcasaValor",
  "data-eficienciaId",
  "data-eficienciaPorcentaje",
  "data-eficienciaValor",
  "data-fac_potenciaId",
  "data-fac_potenciaPorcentaje",
  "data-fac_potenciaValor",
  "data-tecnicoFK",
  "data-tipoFK",
];

// Iterar sobre cada botón de edición de motor
openFormEditMotor.forEach((motor) => {
  motor.addEventListener("click", () => {
    dataAttribute.forEach((attribute, index) => {
      let value = motor.getAttribute(attribute).trim();
      let field = document.getElementById(fields[index]);

      if (field.tagName === "SELECT") {
        for (let option of field.options) {
          if (option.value === value) {
            option.selected = true;
            if (
              index + 1 < fields.length &&
              fields[index] === fields[index + 1]
            ) {
              let nextField = document.getElementById(fields[index + 1]);
              if (nextField.tagName === "SELECT" && nextField.value === value) {
                nextField.selected = true;
              }
            }
            break;
          }
        }
      } else {
        field.value = value;
      }
    });
    FormEditMotor.classList.toggle("activeForm");
  });
});

closeFormEditMotor.forEach((button) => {
  button.addEventListener("click", () => {
    FormEditMotor.classList.toggle("activeForm");
  });
});
