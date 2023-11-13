// Evento al cargar la página
window.addEventListener("load", () => {
  // Obtener referencias a los elementos select de empresas y ubicaciones para agregar
  const empresaSelectAdd = document.getElementById("add_mot_empresaFK");
  const ubicacionesAdd = document.getElementById("add_mot_ubicacionFK");
  const tecnicosAdd = document.getElementById("add_mot_tecnicoFK");

  // Obtener referencias a los elementos select de empresas y ubicaciones para editar
  const empresaSelectEdit = document.getElementById("edit_mot_empresaFK");
  const ubicacionesEdit = document.getElementById("edit_mot_ubicacionFK");
  const tecnicosEdit = document.getElementById("edit_mot_tecnicoFK");

  // Configurar eventos y datos para agregar
  setupFormEvents(empresaSelectAdd, ubicacionesAdd, tecnicosAdd);

  // Configurar eventos y datos para editar
  setupFormEvents(empresaSelectEdit, ubicacionesEdit, tecnicosEdit);
});

// Función principal que configura los eventos y carga datos
const setupFormEvents = (empresaSelect, ubicacionesSelect, tecnicosSelect) => {
  // Agregar escuchadores de eventos para el cambio en el select de empresas
  empresaSelect.addEventListener("change", () => {
    handleSelectChange(empresaSelect, ubicacionesSelect, getUbicaciones);
    handleSelectChange(empresaSelect, tecnicosSelect, getTecnicos);
  });

  // Obtener el ID de la empresa actualmente seleccionada al cargar la página
  const empresaId = empresaSelect.value;

  // Si hay una empresa seleccionada al cargar la página, llamar a las funciones para obtener datos
  if (empresaId !== "") {
    getUbicaciones(empresaId, ubicacionesSelect);
    getTecnicos(empresaId, tecnicosSelect);
  }
};

// Función que maneja el cambio en el select
const handleSelectChange = (
  selectElement,
  dependentSelect,
  getDataFunction
) => {
  const selectedId = selectElement.value;

  // Si se selecciona algo, llamar a la función correspondiente para obtener datos dependientes
  if (selectedId !== "") {
    getDataFunction(selectedId, dependentSelect);
  }
};

// Función para obtener técnicos o ubicaciones
const getData = async (id, selectElement, apiEndpoint, dataFormatter) => {
  try {
    let response = await fetch(
      `?controller=API&action=${apiEndpoint}&id=${id}`
    );
    let data = await response.json();

    // Limpiar opciones actuales (excepto la primera)
    for (let i = selectElement.options.length - 1; i >= 1; i--) {
      selectElement.remove(i);
    }

    // Agregar nuevas opciones
    data.forEach((item) => {
      let option = document.createElement("option");
      option.value = item.id; // Asegúrate de reemplazar 'id' con la propiedad correcta
      option.text = dataFormatter(item);
      selectElement.appendChild(option);
    });
  } catch (error) {
    console.error(
      `Hubo un error al obtener los datos de ${apiEndpoint}:`,
      error
    );
  }
};

// Función para formatear datos de técnicos
const formatTecnico = (tecnico) => {
  return `${tecnico.tec_nombre1} ${tecnico.tec_apellido1}`;
};

// Función para formatear datos de ubicaciones
const formatUbicacion = (ubicacion) => {
  return ubicacion.ubimot_area;
};

// Funciones específicas para agregar y editar técnicos y ubicaciones
const getTecnicos = async (id, tecnicosSelect) => {
  getData(id, tecnicosSelect, "getTecnicos", formatTecnico);
};

const getUbicaciones = async (id, ubicacionesSelect) => {
  getData(id, ubicacionesSelect, "getUbicaciones", formatUbicacion);
};
