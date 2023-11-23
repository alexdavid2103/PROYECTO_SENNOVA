window.addEventListener("DOMContentLoaded", () => {
  const empresaSelect = document.getElementById("add_mot_empresaFK");

  empresaSelect.addEventListener("change", () => {
    const empresaId = empresaSelect.value;
    if (empresaId !== "") {
      getTecnicos(empresaId);
    }
  });

  const empresaId = empresaSelect.value;
  if (empresaId !== "") {
    getTecnicos(empresaId);
  }
});

const getTecnicos = async (id) => {
  const tecnicos = document.getElementById("add_mot_tecnicoFK");

  try {
    let respuesta = await fetch(`?controller=API&action=getTecnicos&id=${id}`);
    let tecnicosRes = await respuesta.json();

    // QUITAR OPCIONES ACTUALES (excepto la primera) ------------------------
    for (let i = tecnicos.options.length - 1; i >= 1; i--) {
      tecnicos.remove(i);
    }

    // AGREGAR OPCIONES NUEVAS --------------------------------------------
    tecnicosRes.forEach((tecnico) => {
      let option = document.createElement("option");
      option.value = tecnico.tec_id;
      option.text = `${tecnico.tec_nombre1} ${tecnico.tec_apellido1}`; // Usa "text" en lugar de "textContent"
      tecnicos.appendChild(option);
    });
  } catch (error) {
    console.error("Hubo un error al obtener los técnicos:", error);
  }
};
