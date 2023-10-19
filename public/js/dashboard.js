document.addEventListener("DOMContentLoaded", function () {
  const vistas = {
    dashboard: document.getElementById("viewDashboard"),
    empresas: document.getElementById("viewEmpresas"),
    tecnico: document.getElementById("viewTecnicos"),
    motores: document.getElementById("viewMotores"),
  };

  const enlaces = {
    dashboard: document.querySelectorAll(".dashboardLink"),
    empresas: document.querySelectorAll(".empresasLink"),
    tecnico: document.querySelectorAll(".tecnicosLink"),
    motores: document.querySelectorAll(".motoresLink"),
  };

  function mostrarVistaYEnlace(vista, enlaces) {
    for (const key in vistas) {
      if (vistas.hasOwnProperty(key)) {
        const v = vistas[key];
        const e = enlaces[key];
        const isSelected = v.id === vista.id;

        if (isSelected) {
          v.classList.remove("d-none");
          if (e && e.length) {
            e.forEach((enlace) => {
              enlace.classList.add("active");
            });
          } else {
            console.log("No se encontraron elementos para el enlace:", key);
          }
        } else {
          v.classList.add("d-none");
          if (e && e.length) {
            e.forEach((enlace) => {
              enlace.classList.remove("active");
            });
          } else {
            console.log("No se encontraron elementos para el enlace:", key);
          }
        }
      }
    }
  }

  enlaces.dashboard.forEach((element) => {
    element.addEventListener("click", () => {
      mostrarVistaYEnlace(vistas.dashboard, enlaces);
    });
  });

  enlaces.empresas.forEach((element) => {
    element.addEventListener("click", () => {
      mostrarVistaYEnlace(vistas.empresas, enlaces);
    });
  });

  enlaces.tecnico.forEach((element) => {
    element.addEventListener("click", () => {
      mostrarVistaYEnlace(vistas.tecnico, enlaces);
    });
  });

  enlaces.motores.forEach((element) => {
    element.addEventListener("click", () => {
      mostrarVistaYEnlace(vistas.motores, enlaces);
    });
  });
});
