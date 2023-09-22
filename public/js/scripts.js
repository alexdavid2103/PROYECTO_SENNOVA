const alertWarning = (text) => {
  swal({
    title: "Advertencia!!",
    text: text,
    icon: "warning",
    button: "Ok",
  });
};

const advanceAlertWarning = () => {
  swal({
    title: "¿Estás seguro?",
    text: "¡Una vez eliminado, no podrás recuperarlo!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  });
};

const alertSuccess = (text) => {
  swal({
    title: "Success",
    text: text,
    icon: "success",
    button: "Ok",
  });
};

const alertInfo = () => {};

const alertError = (text) => {
  swal({
    title: "Oh no",
    text: text,
    icon: "error",
    button: "Ok",
  });
};

// INICIAR SESIÓN -------------------------------------------------
let login = async (event) => {
  let id = document.getElementById("id").value;
  let password = document.getElementById("password").value;

  if (id <= "") {
    event.preventDefault();
    alertWarning((text = "Ingrese su numero de documento"));
    return false;
  }

  if (password == "") {
    event.preventDefault();
    alertWarning((text = "Ingrese su contraseña"));
    return false;
  }

  let datos = new FormData();
  datos.append("id", id);
  datos.append("password", password);

  let respuesta = await fetch("?controller=main&action=validar", {
    method: "POST",
    body: datos,
  });

  let info = await respuesta.json();

  if (info.estado === 1) {
    window.location.href = info.url;
  } else {
    alertError((text = "Usuario o contraseña incorrecta"));
  }
};

// FUNCIONES PARA LAS EMPRESAS ----------------------------------------------------------------

// Función para registrar una empresa
let addEmpresa = async (event) => {
  // Obtener los valores de los campos del formulario
  let id = document.getElementById("add_cli_id").value;
  let nombre1 = document.getElementById("add_cli_nombre1").value;
  let nombre2 = document.getElementById("add_cli_nombre2").value;
  let apellido1 = document.getElementById("add_cli_apellido1").value;
  let apellido2 = document.getElementById("add_cli_apellido2").value;
  let correo = document.getElementById("add_cli_correo").value;
  let telefono = document.getElementById("add_cli_telefono").value;
  let direccion = document.getElementById("add_cli_direccion").value;
  let municipioFK = document.getElementById("add_cli_municipioFK").value;

  // Obtener el formulario
  let form_reg_cliente = document.getElementById("reg_cliente");

  // Validar si los campos están vacíos
  if (
    id == "" ||
    nombre1 == "" ||
    apellido1 == "" ||
    correo == "" ||
    telefono == "" ||
    direccion == "" ||
    municipioFK == ""
  ) {
    event.preventDefault();
    swal({
      title: "Error",
      text: "Todos los campos son obligatorios, asegúrese de llenar los campos correctamente",
      icon: "error",
      button: "Ok",
    });
    return false;
  }

  // Validar formato de correo electrónico
  let correoValido = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if (!correo.match(correoValido)) {
    event.preventDefault();
    swal({
      title: "Error",
      text: "Ingrese un correo electrónico válido",
      icon: "error",
      button: "Ok",
    });
    return false;
  }

  // Crear objeto FormData para enviar los datos al servidor
  let datos = new FormData();
  datos.append("id", id);
  datos.append("nombre1", nombre1);
  datos.append("nombre2", nombre2);
  datos.append("apellido1", apellido1);
  datos.append("apellido2", apellido2);
  datos.append("correo", correo);
  datos.append("telefono", telefono);
  datos.append("direccion", direccion);
  datos.append("municipioFK", municipioFK);

  // Enviar la solicitud POST al servidor para registrar el cliente
  let respuesta = await fetch("?controller=cliente&action=add", {
    method: "POST",
    body: datos,
  });

  // Obtener la respuesta del servidor en formato JSON
  let info = await respuesta.json();

  // Mostrar mensaje de éxito o error según la respuesta del servidor
  if (info.estado == 1) {
    swal({
      title: "Felicidades",
      text: "Se ha registrado correctamente",
      icon: "success",
      button: "Ok",
    }).then(() => {
      form_reg_cliente.reset();
    });
  } else {
    swal({
      title: "Oh no",
      text: "El ID ya existe en la base de datos",
      icon: "error",
      button: "Ok",
    });
  }
};

// Función para editar una empresa
let editEmpresa = async (event) => {
  // Obtener los valores de los campos del formulario
  let id = document.getElementById("edit_cli_id").value;
  let nombre1 = document.getElementById("edit_cli_nombre1").value;
  let nombre2 = document.getElementById("edit_cli_nombre2").value;
  let apellido1 = document.getElementById("edit_cli_apellido1").value;
  let apellido2 = document.getElementById("edit_cli_apellido2").value;
  let correo = document.getElementById("edit_cli_correo").value;
  let telefono = document.getElementById("edit_cli_telefono").value;
  let direccion = document.getElementById("edit_cli_direccion").value;
  let municipioFK = document.getElementById("edit_cli_municipioFK").value;
  let estadoFK = document.getElementById("edit_cli_estadoFK").value;

  // Validar si los campos están vacíos
  if (
    id == "" ||
    nombre1 == "" ||
    nombre2 == "" ||
    apellido1 == "" ||
    apellido2 == "" ||
    correo == "" ||
    telefono == "" ||
    direccion == "" ||
    password == "" ||
    municipioFK == "" ||
    estadoFK == ""
  ) {
    event.preventDefault();
    swal({
      title: "Error",
      text: "Todos los campos son obligatorios",
      icon: "error",
      button: "Ok",
    });
    return false;
  }

  // Validar formato de correo electrónico
  let correoValido = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if (!correo.match(correoValido)) {
    event.preventDefault();
    swal({
      title: "Error",
      text: "Ingrese un correo electrónico válido",
      icon: "error",
      button: "Ok",
    });
    return false;
  }

  // Crear objeto FormData para enviar los datos al servidor
  let datos = new FormData();
  datos.append("id", id);
  datos.append("nombre1", nombre1);
  datos.append("nombre2", nombre2);
  datos.append("apellido1", apellido1);
  datos.append("apellido2", apellido2);
  datos.append("correo", correo);
  datos.append("telefono", telefono);
  datos.append("direccion", direccion);
  datos.append("municipioFK", municipioFK);
  datos.append("estadoFK", estadoFK);

  // Enviar la solicitud POST al servidor para editar el cliente
  let respuesta = await fetch("?controller=cliente&action=edit", {
    method: "POST",
    body: datos,
  });

  // Obtener la respuesta del servidor en formato JSON
  let info = await respuesta.json();

  // Mostrar mensaje de éxito o error según la respuesta del servidor
  if (info.estado == 1) {
    swal({
      title: "Felicidades",
      text: "Se ha editado correctamente",
      icon: "success",
      button: "Ok",
    }).then(() => {
      window.location.reload();
    });
  } else {
    swal({
      title: "Oh no",
      text: "Error al editar",
      icon: "error",
      button: "Ok",
    });
  }
};

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
        if (info.estado == 1) {
          swal({
            title: "Ha sido eliminado correctamente",
            icon: "success",
          }).then(() => {
            window.location.reload();
          });
        } else {
          alertError((text = "No se pudo eliminar"));
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

// ---------------------------------------------------------------- //

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
  if (info.estado == 1) {
    alertSuccess((text = "Se ha registrado correctamente")).then(() => {
      form_reg_motor.reset(); // Limpiar el formulario
    });
  } else {
    alertError((text = "Error al registrar"));
  }
});

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

    if (info.estado == 1) {
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
        if (info.estado == 1) {
          swal({
            title: "Ha sido eliminado correctamente",
            icon: "success",
          }).then(() => {
            window.location.reload();
          });
        } else {
          alertError((text = "No se pudo eliminar"));
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

// ----------------------------------------------------------------

// CAMBIAR CONTRASEÑA USUARIO -------------------------------------------------
const validarContrasenaAprendiz = (contrasena) => {
  const patron = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?!.*\s).{7,}$/;
  return patron.test(contrasena);
};

let UpdatePasswordApr = async (event) => {
  const password = document.getElementById("apr_update_password").value;
  const Npassword = document.getElementById("apr_update_Npassword").value;
  const NCpassword = document.getElementById("apr_update_NCpassword").value;

  if (!validarContrasenaAprendiz(Npassword) || Npassword !== NCpassword) {
    event.preventDefault();
    swal({
      title: "Error",
      text: "La contraseña debe cumplir los siguientes requisitos: tener al menos una letra mayúscula, una letra minúscula, un carácter numérico, no contener espacios en blanco y tener al menos 7 dígitos. Asegúrate de que las contraseñas coincidan.",
      icon: "error",
      button: "Ok",
    });
  } else {
    let datos = new FormData();
    datos.append("password", password);
    datos.append("Npassword", Npassword);

    let respuesta = await fetch("?controller=usuario&action=cambiarPassword", {
      method: "POST",
      body: datos,
    });

    let info = await respuesta.json();

    if (info.estado == 1) {
      swal({
        title: "Felicidades",
        text: "Se ha editado correctamente",
        icon: "success",
        button: "Ok",
      }).then(() => {
        window.location.href = info.url;
        info.logout;
      });
    } else {
      swal({
        title: "Oh no",
        text: "Error al editar",
        icon: "error",
        button: "Ok",
      });
    }
  }
};
