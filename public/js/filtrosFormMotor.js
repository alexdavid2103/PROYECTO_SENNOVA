// Evento al cargar la página
window.addEventListener("load", () => {
  // Obtener referencia al elemento select de empresas
  const empresaSelect = document.getElementById("add_mot_empresaFK");

  // Agregar un escuchador de eventos para el cambio en el select de empresas
  empresaSelect.addEventListener("change", () => {
    // Obtener el ID de la empresa seleccionada
    const empresaId = empresaSelect.value;

    // Si se selecciona una empresa, llamar a la función para obtener técnicos
    if (empresaId !== "") {
      getTecnicos(empresaId);
    }
  });

  // Obtener el ID de la empresa actualmente seleccionada al cargar la página
  const empresaId = empresaSelect.value;

  // Si hay una empresa seleccionada al cargar la página, llamar a la función para obtener técnicos
  if (empresaId !== "") {
    getTecnicos(empresaId);
  }
});

// Función para obtener técnicos
const getTecnicos = async (id) => {
  // Obtener referencia al elemento select de técnicos
  const tecnicos = document.getElementById("add_mot_tecnicoFK");

  try {
    // Realizar solicitud para obtener datos de técnicos desde la API
    let respuesta = await fetch(`?controller=API&action=getTecnicos&id=${id}`);
    let tecnicosRes = await respuesta.json();

    // QUITAR OPCIONES ACTUALES (excepto la primera)
    for (let i = tecnicos.options.length - 1; i >= 1; i--) {
      tecnicos.remove(i);
    }

    // AGREGAR OPCIONES NUEVAS
    tecnicosRes.forEach((tecnico) => {
      let option = document.createElement("option");
      option.value = tecnico.tec_id;
      option.text = `${tecnico.tec_nombre1} ${tecnico.tec_apellido1}`;
      tecnicos.appendChild(option);
    });
  } catch (error) {
    console.error("Hubo un error al obtener los técnicos:", error);
  }
};

// // Obtener referencia al elemento select de departamentos
// let departamentosSelect = document.getElementById("add_emp_departamento");

// // Agregar un escuchador de eventos onchange al elemento select de departamentos
// departamentosSelect.addEventListener("change", async () => {
//   let departamentos = departamentosSelect.value;
//   let municipios = document.getElementById("add_emp_municipio");

//   // Realizar solicitud para obtener municipios desde la API
//   let respuesta = await fetch(
//     `?controller=empresa&action=APImunicipios&id=${departamentos}`
//   );
//   let municipios_res = await respuesta.json();

//   // QUITAR OPCIONES ACTUALES
//   municipios.innerHTML = "";

//   // AGREGAR OPCIONES NUEVAS
//   municipios_res.forEach((municipio) => {
//     let option = document.createElement("option");
//     option.value = municipio.mun_id;
//     option.text = municipio.mun_nombre;
//     municipios.appendChild(option);
//   });
// });

// Segundo bloque similar al primero, pero para ubicaciones
window.addEventListener("load", () => {
  const empresaSelect = document.getElementById("add_mot_empresaFK");

  empresaSelect.addEventListener("change", () => {
    const empresaId = empresaSelect.value;
    if (empresaId !== "") {
      getUbicaciones(empresaId);
    }
  });

  const empresaId = empresaSelect.value;
  if (empresaId !== "") {
    getUbicaciones(empresaId);
  }
});

const getUbicaciones = async (id) => {
  const ubicaciones = document.getElementById("add_mot_ubicacionFK");

  try {
    let respuesta = await fetch(
      `?controller=API&action=getUbicaciones&id=${id}`
    );
    let ubicacionRes = await respuesta.json();

    // QUITAR OPCIONES ACTUALES (excepto la primera)
    for (let i = ubicaciones.options.length - 1; i >= 1; i--) {
      ubicaciones.remove(i);
    }

    // AGREGAR OPCIONES NUEVAS
    ubicacionRes.forEach((ubicacion) => {
      let option = document.createElement("option");
      option.value = ubicacion.ubimot_id;
      option.text = ubicacion.ubimot_area;
      ubicaciones.appendChild(option);
    });
  } catch (error) {
    console.error("Hubo un error al obtener las ubicaciones:", error);
  }
};
