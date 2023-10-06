// =============================== VISTAS =============================== \\

// Constantes para almacenar las referencias a las vistas
const vistas = {
  dashboard: document.getElementById("viewDashboard"),
  empresas: document.getElementById("viewEmpresas"),
  tecnico: document.getElementById("viewTecnico"),
  motores: document.getElementById("viewMotores")
};

// =============================== ENLACES =============================== \\

// Constantes para almacenar las referencias a los enlaces
const enlaces = {
  dashboard: document.getElementById("dashboardLink"),
  empresas: document.getElementById("empresasLink"),
  tecnico: document.getElementById("tecnicosLink"),
  motores: document.getElementById("motoresLink")
};

// =============================== FUNCIONES =============================== \\

// Función para mostrar una vista y activar un enlace utilizando toggle
function mostrarVistaYEnlace(vista, enlace) {
  for (const key in vistas) {
    if (vistas.hasOwnProperty(key)) {
      const v = vistas[key];
      const e = enlaces[key];
      const isSelected = v === vista && e === enlace;
      
      v.classList.toggle("d-none", !isSelected);
      e.classList.toggle("active", isSelected);
    }
  }
}

// Event listeners para los enlaces

enlaces.dashboard.addEventListener("click", () => {
  mostrarVistaYEnlace(vistas.dashboard, enlaces.dashboard);
});

enlaces.empresas.addEventListener("click", () => {
  mostrarVistaYEnlace(vistas.empresas, enlaces.empresas);
});

enlaces.tecnico.addEventListener("click", () => {
  mostrarVistaYEnlace(vistas.tecnico, enlaces.tecnico);
});

enlaces.motores.addEventListener("click", () => {
  mostrarVistaYEnlace(vistas.motores, enlaces.motores);
});
