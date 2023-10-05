// =============================== VISTAS =============================== \\

const vistaDashboard = document.getElementById("viewDashboard");
const vistaEmpresas = document.getElementById("viewEmpresas");
const vistaTecnico = document.getElementById("viewTecnico");
const vistaMotores = document.getElementById("viewMotores");

// =============================== ENLACES =============================== \\

const linkDashboard = document.getElementById("dashboardLink");
const linkEmpresas = document.getElementById("empresasLink");
const linkTecnico = document.getElementById("tecnicoLink");
const linkMotores = document.getElementById("motoresLink");

// Buscamos el elemento con la clase "active"
const elemento = document.querySelector(".active");

const viewDashboard = () => {
  vistaDashboard.classList.add("d-block");
  //   vistaEmpresas.classList.add("d-none");
  vistaTecnico.classList.remove("d-block");
  vistaTecnico.classList.add("d-none");
  //   vistaMotores.classList.add("d-none");
  elemento.classList.remove("active");
  linkDashboard.classList.add("active");
};

const viewEmpresas = () => {
  vistaDashboard.classList.add("d-none");
  vistaEmpresas.classList.add("d-block");
  vistaTecnico.classList.add("d-none");
  vistaMotores.classList.add("d-none");
  elemento.classList.remove("active");
  linkEmpresas.classList.add("active");
};

const viewTecnicos = () => {
  vistaDashboard.classList.remove("d-block");
  vistaDashboard.classList.add("d-none");
  vistaTecnico.classList.add("d-block");
  //   vistaMotores.classList.add("d-none");
  elemento.classList.remove("active");
  linkTecnico.classList.add("active");
};

const viewMotores = () => {
  vistaDashboard.classList.add("d-none");
  vistaEmpresas.classList.add("d-none");
  vistaTecnico.classList.add("d-none");
  vistaMotores.classList.add("d-block");
  elemento.classList.remove("active");
  linkMotores.classList.add("active");
};
