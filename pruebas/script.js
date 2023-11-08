const closeFormEditMotor = document.querySelectorAll(".close");
const openFormEditMotor = document.querySelectorAll(".editMotorBtn");
const FormEditMotor = document.querySelectorAll(".contForm");

const toggleActiveForm = (button) => {
  FormEditMotor.forEach((container) => {
    if (button.getAttribute("data-id") === container.getAttribute("data-id")) {
      container.classList.toggle("activeForm");
    }
  });
};

openFormEditMotor.forEach((button) => {
  button.addEventListener("click", () => {
    toggleActiveForm(button);
  });
});

closeFormEditMotor.forEach((button) => {
  button.addEventListener("click", () => {
    toggleActiveForm(button);
  });
});
