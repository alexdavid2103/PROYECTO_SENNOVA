document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("multi-step-form");
  const stepGroups = [
    document.getElementById("step-group-1"),
    document.getElementById("step-group-2"),
    document.getElementById("step-group-3"),
    document.getElementById("step-group-4"),
  ];
  const stepNextButtons = [
    document.getElementById("step-next-1"),
    document.getElementById("step-next-2"),
    document.getElementById("step-next-3"),
  ];
  const stepPrevButtons = [
    document.getElementById("step-prev-1"),
    document.getElementById("step-prev-2"),
    document.getElementById("step-prev-3"),
  ];

  let currentStep = 0;

  form.addEventListener("submit", (e) => {
    e.preventDefault();
  });

  function showStep(step) {
    stepGroups.forEach((group, index) => {
      group.style.display = index === step ? "block" : "none";
    });
  }

  function nextStep() {
    if (currentStep < stepGroups.length - 1) {
      showStep(++currentStep);
    }
  }

  function prevStep() {
    if (currentStep > 0) {
      showStep(--currentStep);
    }
  }

  stepNextButtons.forEach((button, index) => {
    button.addEventListener("click", () => {
      nextStep();
    });
  });

  stepPrevButtons.forEach((button, index) => {
    button.addEventListener("click", () => {
      prevStep();
    });
  });
});
