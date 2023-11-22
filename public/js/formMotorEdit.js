// Espera a que se cargue el DOM antes de ejecutar el código
document.addEventListener("DOMContentLoaded", function () {
  // Obtener referencias a elementos del formulario y grupos de pasos
  const formEdit = document.getElementById("multi-step-form-edit");
  const stepGroupsEdit = [
    document.getElementById("step-group-1-edit"),
    document.getElementById("step-group-2-edit"),
    document.getElementById("step-group-3-edit"),
    document.getElementById("step-group-4-edit"),
  ];

  // Obtener botones de "siguiente" y "anterior" para cada paso
  const stepNextButtonsEdit = [
    document.getElementById("step-next-1-edit"),
    document.getElementById("step-next-2-edit"),
    document.getElementById("step-next-3-edit"),
  ];
  const stepPrevButtonsEdit = [
    document.getElementById("step-prev-1-edit"),
    document.getElementById("step-prev-2-edit"),
    document.getElementById("step-prev-3-edit"),
  ];

  // Variable para llevar el seguimiento del paso actual
  let currentStepEdit = 0;

  // Evitar que el formulario se envíe al presionar "submit"
  formEdit.addEventListener("submit", (e) => {
    e.preventDefault();
    // Aquí puedes agregar la lógica para procesar el formulario si es necesario
  });

  // Función para mostrar un paso específico y ocultar los demás
  function showStepEdit(step) {
    stepGroupsEdit.forEach((group, index) => {
      group.style.display = index === step ? "block" : "none";
    });
  }

  // Función para pasar al siguiente paso
  function nextStepEdit() {
    if (currentStepEdit < stepGroupsEdit.length - 1) {
      showStepEdit(++currentStepEdit);
    }
  }

  // Función para regresar al paso anterior
  function prevStepEdit() {
    if (currentStepEdit > 0) {
      showStepEdit(--currentStepEdit);
    }
  }

  // Mostrar el primer paso al cargar la página
  showStepEdit(0);

  // Agregar listeners a los botones de "siguiente" y "anterior"
  stepNextButtonsEdit.forEach((button, index) => {
    button.addEventListener("click", () => {
      nextStepEdit();
    });
  });

  stepPrevButtonsEdit.forEach((button, index) => {
    button.addEventListener("click", () => {
      prevStepEdit();
    });
  });
});
