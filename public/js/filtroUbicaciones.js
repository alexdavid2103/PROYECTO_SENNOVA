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

    // QUITAR OPCIONES ACTUALES (excepto la primera) ------------------------
    for (let i = ubicaciones.options.length - 1; i >= 1; i--) {
      ubicaciones.remove(i);
    }

    // AGREGAR OPCIONES NUEVAS --------------------------------------------
    ubicacionRes.forEach((ubicacion) => {
      let option = document.createElement("option");
      option.value = ubicacion.ubimot_id;
      option.text = ubicacion.ubimot_area; // Usa "text" en lugar de "textContent"
      ubicaciones.appendChild(option);
    });
  } catch (error) {
    console.error("Hubo un error al obtener las ubicaciones:", error);
  }
};
