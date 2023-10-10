// Obtén una referencia al elemento departamentos
let departamentosSelect = document.getElementById("emp_departamento");

// Agrega un manejador de eventos onchange al elemento departamentos
departamentosSelect.addEventListener("change", async () => {
  let departamentos = departamentosSelect.value;
  let municipios = document.getElementById("emp_municipio");

  let respuesta = await fetch(
    `?controller=empresa&action=APImunicipios&id=${departamentos}`
  );
  let municipios_res = await respuesta.json();

  // QUITAR OPCIONES ACTUALES -------------------------------------------
  municipios.innerHTML = "";

  // AGREGAR OPCIONES NUEVAS --------------------------------------------
  municipios_res.forEach((municipio) => {
    let option = document.createElement("option");
    option.value = municipio.mun_id;
    option.text = municipio.mun_nombre; // Usa "text" en lugar de "textContent"
    municipios.appendChild(option);
  });
});
