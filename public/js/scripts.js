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
  })
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

  if (id == "") {
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

// FUNCIONES PARA LOS CLIENTES ----------------------------------------------------------------

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

// ----------------------------------------------------------------

// Función para registrar un motor
let RegMotor = async (event) => {
  // Obtener los valores de los campos del formulario
  let serie = document.getElementById("add_mot_serie").value;
  let norma = document.getElementById("add_mot_norma").value;
  let polos = document.getElementById("add_mot_polos").value;
  let potencia = document.getElementById("add_mot_potencia").value;
  let IpIn = document.getElementById("add_mot_IpIn").value;
  let par_arranque = document.getElementById("add_mot_par_arranque").value;
  let par_maxima = document.getElementById("add_mot_par_maxima").value;
  let mom_inercia = document.getElementById("add_mot_mom_inercia").value;
  let tiempo_rotor_bloq = document.getElementById(
    "add_mot_tiempo_rotor_bloq"
  ).value;
  let peso = document.getElementById("add_mot_peso").value;
  let niv_ruido = document.getElementById("add_mot_niv_ruido").value;
  let factor_servicio = document.getElementById(
    "add_mot_factor_servicio"
  ).value;
  let rotacion_nominal = document.getElementById(
    "add_mot_rotacion_nominal"
  ).value;
  let corriente_nominal = document.getElementById(
    "add_mot_corriente_nominal"
  ).value;
  let altitud = document.getElementById("add_mot_altitud").value;
  let regimen = document.getElementById("add_mot_regimen").value;
  let temp_ambiente = document.getElementById("add_mot_temp_ambiente").value;
  let proteccion = document.getElementById("add_mot_proteccion").value;
  let carcasaFK = document.getElementById("add_mot_carcasaFK").value;
  let eficienciaFK = document.getElementById("add_mot_eficienciaFK").value;
  let fac_potenciaFK = document.getElementById("add_mot_fac_potenciaFK").value;
  let clienteFK = document.getElementById("add_mot_clienteFK").value;
  let tecnicoFK = document.getElementById("add_mot_tecnicoFK").value;

  // Obtener el formulario
  let form_reg_motor = document.getElementById("reg_motor");

  // Validar si los campos están vacíos
  if (
    serie == "" ||
    norma == "" ||
    polos == "" ||
    potencia == "" ||
    IpIn == "" ||
    par_arranque == "" ||
    par_maxima == "" ||
    mom_inercia == "" ||
    tiempo_rotor_bloq == "" ||
    peso == "" ||
    niv_ruido == "" ||
    factor_servicio == "" ||
    rotacion_nominal == "" ||
    corriente_nominal == "" ||
    altitud == "" ||
    regimen == "" ||
    temp_ambiente == "" ||
    proteccion == "" ||
    carcasaFK == "" ||
    eficienciaFK == "" ||
    fac_potenciaFK == "" ||
    clienteFK == "" ||
    tecnicoFK == "" ||
    estadoFK == ""
  ) {
    event.preventDefault();
    alertWarning(
      (text =
        "Todos los campos son obligatorios, asegúrese de llenar los campos correctamente")
    );
    return false;
  }

  // Crear objeto FormData para enviar los datos al servidor
  let datos = new FormData();
  datos.append("serie", serie);
  datos.append("norma", norma);
  datos.append("polos", polos);
  datos.append("potencia", potencia);
  datos.append("IpIn", IpIn);
  datos.append("par_arranque", par_arranque);
  datos.append("par_maxima", par_maxima);
  datos.append("mom_inercia", mom_inercia);
  datos.append("tiempo_rotor_bloq", tiempo_rotor_bloq);
  datos.append("peso", peso);
  datos.append("niv_ruido", niv_ruido);
  datos.append("factor_servicio", factor_servicio);
  datos.append("rotacion_nominal", rotacion_nominal);
  datos.append("corriente_nominal", corriente_nominal);
  datos.append("altitud", altitud);
  datos.append("regimen", regimen);
  datos.append("temp_ambiente", temp_ambiente);
  datos.append("proteccion", proteccion);
  datos.append("carcasaFK", carcasaFK);
  datos.append("eficienciaFK", eficienciaFK);
  datos.append("fac_potenciaFK", fac_potenciaFK);
  datos.append("clienteFK", clienteFK);
  datos.append("tecnicoFK", tecnicoFK);

  // Enviar la solicitud POST al servidor para registrar el motor
  let respuesta = await fetch("?controller=motor&action=add", {
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
      form_reg_motor.reset();
    });
  } else {
    swal({
      title: "Oh no",
      text: "Error al registrar",
      icon: "error",
      button: "Ok",
    });
  }
};

// Función para editar un motor
let editMotor = async (event) => {
  // Obtener los valores de los campos del formulario
  let serie = document.getElementById("edit_mot_serie").value;
  let norma = document.getElementById("edit_mot_norma").value;
  let polos = document.getElementById("edit_mot_polos").value;
  let potencia = document.getElementById("edit_mot_potencia").value;
  let IpIn = document.getElementById("edit_mot_IpIn").value;
  let par_arranque = document.getElementById("edit_mot_par_arranque").value;
  let par_maxima = document.getElementById("edit_mot_par_maxima").value;
  let mom_inercia = document.getElementById("edit_mot_mom_inercia").value;
  let tiempo_rotor_bloq = document.getElementById(
    "edit_mot_tiempo_rotor_bloq"
  ).value;
  let peso = document.getElementById("edit_mot_peso").value;
  let niv_ruido = document.getElementById("edit_mot_niv_ruido").value;
  let factor_servicio = document.getElementById(
    "edit_mot_factor_servicio"
  ).value;
  let rotacion_nominal = document.getElementById(
    "edit_mot_rotacion_nominal"
  ).value;
  let corriente_nominal = document.getElementById(
    "edit_mot_corriente_nominal"
  ).value;
  let altitud = document.getElementById("edit_mot_altitud").value;
  let regimen = document.getElementById("edit_mot_regimen").value;
  let temp_ambiente = document.getElementById("edit_mot_temp_ambiente").value;
  let proteccion = document.getElementById("edit_mot_proteccion").value;
  let carcasaFK = document.getElementById("edit_mot_carcasaFK").value;
  let eficienciaFK = document.getElementById("edit_mot_eficienciaFK").value;
  let fac_potenciaFK = document.getElementById("edit_mot_fac_potenciaFK").value;
  let clienteFK = document.getElementById("edit_mot_clienteFK").value;
  let tecnicoFK = document.getElementById("edit_mot_tecnicoFK").value;
  let estadoFK = document.getElementById("edit_mot_estadoFK").value;

  // Validar si los campos están vacíos
  if (
    serie == "" ||
    norma == "" ||
    polos == "" ||
    potencia == "" ||
    IpIn == "" ||
    par_arranque == "" ||
    par_maxima == "" ||
    mom_inercia == "" ||
    tiempo_rotor_bloq == "" ||
    peso == "" ||
    niv_ruido == "" ||
    factor_servicio == "" ||
    rotacion_nominal == "" ||
    corriente_nominal == "" ||
    altitud == "" ||
    regimen == "" ||
    temp_ambiente == "" ||
    proteccion == "" ||
    carcasaFK == "" ||
    eficienciaFK == "" ||
    fac_potenciaFK == "" ||
    clienteFK == "" ||
    tecnicoFK == "" ||
    estadoFK == ""
  ) {
    event.preventDefault();
    alertWarning((text = "Todos los campos son obligatorios"));
    return false;
  }

  // Crear objeto FormData para enviar los datos al servidor
  let datos = new FormData();
  datos.append("serie", serie);
  datos.append("norma", norma);
  datos.append("polos", polos);
  datos.append("potencia", potencia);
  datos.append("IpIn", IpIn);
  datos.append("par_arranque", par_arranque);
  datos.append("par_maxima", par_maxima);
  datos.append("mom_inercia", mom_inercia);
  datos.append("tiempo_rotor_bloq", tiempo_rotor_bloq);
  datos.append("peso", peso);
  datos.append("niv_ruido", niv_ruido);
  datos.append("factor_servicio", factor_servicio);
  datos.append("rotacion_nominal", rotacion_nominal);
  datos.append("corriente_nominal", corriente_nominal);
  datos.append("altitud", altitud);
  datos.append("regimen", regimen);
  datos.append("temp_ambiente", temp_ambiente);
  datos.append("proteccion", proteccion);
  datos.append("carcasaFK", carcasaFK);
  datos.append("eficienciaFK", eficienciaFK);
  datos.append("fac_potenciaFK", fac_potenciaFK);
  datos.append("clienteFK", clienteFK);
  datos.append("tecnicoFK", tecnicoFK);
  datos.append("estadoFK", estadoFK);

  // Enviar la solicitud POST al servidor para editar el motor
  let respuesta = await fetch("?controller=motor&action=edit", {
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
