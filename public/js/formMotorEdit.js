document.addEventListener("DOMContentLoaded", function () {
  const formEdit = document.getElementById("multi-step-form-edit");
  const stepGroupsEdit = [
    document.getElementById("step-group-1-edit"),
    document.getElementById("step-group-2-edit"),
    document.getElementById("step-group-3-edit"),
    document.getElementById("step-group-4-edit"),
  ];
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

  let currentStepEdit = 0;

  formEdit.addEventListener("submit", (e) => {
    e.preventDefault();
    // Aquí puedes agregar la lógica para procesar el formulario si es necesario
  });

  function showStepEdit(step) {
    stepGroupsEdit.forEach((group, index) => {
      group.style.display = index === step ? "block" : "none";
    });
  }

  function nextStepEdit() {
    if (currentStepEdit < stepGroupsEdit.length - 1) {
      showStepEdit(++currentStepEdit);
    }
  }

  function prevStepEdit() {
    if (currentStepEdit > 0) {
      showStepEdit(--currentStepEdit);
    }
  }

  showStepEdit(0);

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
