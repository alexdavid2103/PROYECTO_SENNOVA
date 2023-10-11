// |================================== ALERTAS ==================================|//

export function alertWarning(text) {
  swal({
    title: "Advertencia!!",
    text: text,
    icon: "warning",
    button: "Ok",
  });
}

export function advanceAlertWarning() {
  swal({
    title: "¿Estás seguro?",
    text: "¡Una vez eliminado, no podrás recuperarlo!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  });
}

export function alertSuccess(text) {
  swal({
    title: "Success",
    text: text,
    icon: "success",
    button: "Ok",
  });
}

export function alertInfo() {}

export function alertError(text) {
  swal({
    title: "Oh no",
    text: text,
    icon: "error",
    button: "Ok",
  });
}
