// |================================== ALERTAS ==================================|//

export function alertWarning(text) {
  return new Promise((resolve, reject) => {
    swal({
      title: "Advertencia!!",
      text: text,
      icon: "warning",
      button: "Ok",
    }).then(() => {
      resolve();
    });
  });
}

export function advanceAlertWarning() {
  return new Promise((resolve, reject) => {
    swal({
      title: "¿Estás seguro?",
      text: "¡Una vez eliminado, no podrás recuperarlo!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        resolve();
      } else {
        reject();
      }
    });
  });
}

export function alertSuccess(text) {
  return new Promise((resolve, reject) => {
    swal({
      title: "Success",
      text: text,
      icon: "success",
      button: "Ok",
    }).then(() => {
      resolve();
    });
  });
}

export function alertInfo() {}

export function alertError(text) {
  return new Promise((resolve, reject) => {
    swal({
      title: "Oh no",
      text: text,
      icon: "error",
      button: "Ok",
    }).then(() => {
      resolve();
    });
  });
}
