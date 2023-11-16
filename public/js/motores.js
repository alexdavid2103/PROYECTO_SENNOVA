import {
  alertWarning,
  advanceAlertWarning,
  alertSuccess,
  alertError,
  alertInfo,
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
    "add_mot_tipoFK",
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
    add_mot_tipoFK: "tipo de motor",
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
// Obtener el formulario por su ID
const form_edit_motor = document.querySelector(".form_edit_motor");

// Agregar un evento 'submit' al formulario
form_edit_motor.addEventListener("submit", async (event) => {
  event.preventDefault(); // Prevenir el comportamiento predeterminado del formulario al enviar

  // Definir los identificadores de los campos y sus etiquetas legibles por humanos

  const campos = [
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

  const camposLabels = {
    edit_mot_empresaFK: "Empresa",
    edit_mot_ubicacionFK: "Ubicación",
    edit_mot_serie: "Serie",
    edit_mot_normaFK: "Norma",
    edit_mot_polos: "Polos",
    edit_mot_potencia: "Potencia",
    edit_mot_IpIn: "Ip/In",
    edit_mot_par_arranque: "Par de arranque",
    edit_mot_par_maxima: "Par máxima",
    edit_mot_mom_inercia: "Momento de inercia",
    edit_mot_tiempo_rotor_bloq: "Tiempo de rotor bloqueado",
    edit_mot_peso: "Peso",
    edit_mot_niv_ruido: "Nivel de ruido",
    edit_mot_factor_servicio: "Factor de servicio",
    edit_mot_rotacion_nominal: "Rotación nominal",
    edit_mot_corriente_nominal: "Corriente nominal",
    edit_mot_altitud: "Altitud",
    edit_mot_temp_ambiente: "Temperatura ambiente",
    edit_mot_proteccion: "Protección",
    edit_mot_carcasaId: "Id de la carcasa",
    edit_mot_carcasaNombre: "Nombre de la carcasa",
    edit_mot_carcasaValor: "Valor de la carcasa",
    edit_mot_eficienciaId: "Id de eficiencia",
    edit_mot_eficienciaPorcentaje: "Porcentaje de eficiencia",
    edit_mot_eficienciaValor: "Valor de eficiencia",
    edit_mot_fac_potenciaId: "Id de factor de potencia",
    edit_mot_fac_potenciaPorcentaje: "Porcentaje de factor de potencia",
    edit_mot_fac_potenciaValor: "Valor de factor de potencia",
    edit_mot_tecnicoFK: "Técnico",
    edit_mot_tipoFK: "Tipo de motor",
  };

  // Inicializar un arreglo para almacenar los nombres de los campos vacíos
  let emptyFields = [];

  // Iterar sobre cada campo para verificar si está vacío
  campos.forEach((campo) => {
    if (
      document.getElementById(campo).value.trim() === "" &&
      campo !== "edit_mot_empresaFK"
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
    const respuesta = await fetch("?controller=motor&action=edit", {
      method: "POST",
      body: datos,
    });

    // Obtener la respuesta del servidor en formato JSON
    const info = await respuesta.json();

    // Mostrar un mensaje de éxito o error según la respuesta del servidor
    if (info.estado === 1) {
      alertSuccess("Se ha editado correctamente").then(() => {
        window.location.reload(); // Recargar la página
      });
    } else {
      alertError("No se pudo editar el motor");
    }
  } catch (error) {
    console.error("Error al realizar la solicitud:", error);
    alertError("Error al realizar la solicitud");
  }
});

// ELIMINAR <---------------------------------------------------------------------|
const deleteMotorButton = document.querySelectorAll(
  ".deleteMotorButton[data-id]"
);

deleteMotorButton.forEach((button) => {
  button.addEventListener("click", () => {
    const id = button.getAttribute("data-id").trim();
    deleteMotor(id);
  });
});

const deleteMotor = async (id) => {
  try {
    const willDelete = await advanceAlertWarning();

    if (willDelete) {
      const datos = new FormData();
      datos.append("id", id);
      console.log(id);
      const respuesta = await fetch(`?controller=motor&action=delete`, {
        method: "POST",
        body: datos,
      });

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
