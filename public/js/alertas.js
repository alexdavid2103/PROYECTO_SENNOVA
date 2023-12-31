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
        resolve(true);
      } else {
        reject(false);
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

export function alertInfo(text) {
  return new Promise((resolve, reject) => {
    swal({
      title: "Información",
      text: text,
      icon: "info",
      button: "Ok",
    }).then(() => {
      resolve();
    });
  });
}

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
