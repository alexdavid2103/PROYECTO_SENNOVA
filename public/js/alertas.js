// |================================== ALERTAS ==================================|//

function alertWarning(text) {
  swal({
    title: "Advertencia!!",
    text: text,
    icon: "warning",
    button: "Ok",
  });
}

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
